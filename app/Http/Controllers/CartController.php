<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->harga_produk;
        });

        $shipping = 0;
        $total = $subtotal + $shipping;

        return view('cart.shoping-cart', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $user = Auth::user();
        $quantity = max(1, (int)$request->input('quantity', 1));

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', $product->nama_produk . ' ditambahkan ke keranjang!');
    }

    public function update(Request $request, $cartId)
    {
        $cartItem = Cart::findOrFail($cartId);
        $quantity = (int)$request->input('quantity', 1);

        if ($quantity <= 0) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Item dihapus dari keranjang!');
        }

        $cartItem->quantity = $quantity;
        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function clear()
    {
        $user = Auth::user();
        Cart::where('user_id', $user->id)->delete();
        return redirect()->route('cart.index')->with('success', 'Keranjang dikosongkan!');
    }

    public function showCheckout()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong!');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->harga_produk;
        });

        return view('cart.checkout', compact('cartItems', 'subtotal', 'user'));
    }

    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'address' => 'required|string',
            'address2' => 'nullable|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'postcode' => 'required|string',
            'payment_method' => 'required|in:cash,non-cash',
            'shipping_cost' => 'required|numeric|min:0',
            'bank_method' => 'nullable|string',
            'cc_name' => 'nullable|string',
            'cc_number' => 'nullable|string',
            'cc_expiration' => 'nullable|string',
            'cc_cvv' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'bank_account' => 'nullable|string',
            'bank_account_name' => 'nullable|string',
            'ewallet_type' => 'nullable|string',
            'ewallet_id' => 'nullable|string',
        ]);

        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong!');
        }

        $shippingCost = (int) $validated['shipping_cost'];
        $handlingFee = $validated['payment_method'] === 'cash' ? 2500 : 0;

        DB::beginTransaction();
        try {
            $subtotal = $cartItems->sum(function ($item) {
                return $item->quantity * $item->product->harga_produk;
            });
            $total = $subtotal + $shippingCost + $handlingFee;

            $paymentDetails = $this->buildPaymentDetails($validated);

            $order = Order::create([
                'user_id' => $user->id,
                'customer_name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'address' => $validated['address'],
                'address2' => $validated['address2'] ?? null,
                'country' => $validated['country'],
                'state' => $validated['state'],
                'city' => $validated['city'],
                'postcode' => $validated['postcode'],
                'shipping_cost' => $shippingCost,
                'subtotal' => $subtotal,
                'total' => $total,
                'payment_method' => $validated['payment_method'],
                'payment_details' => $paymentDetails,
                'payment_status' => 'pending',
                'status' => 'processing',
            ]);

            foreach ($cartItems as $item) {
                $product = $item->product;
                if ($product->stock_produk < $item->quantity) {
                    DB::rollBack();
                    return redirect()->route('cart.showCheckout')->with('error', 'Stok ' . $product->nama_produk . ' tidak mencukupi!');
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $item->quantity,
                    'price' => $product->harga_produk,
                    'product_name' => $product->nama_produk,
                    'subtotal' => $item->quantity * $product->harga_produk,
                ]);

                $product->stock_produk -= $item->quantity;
                $product->save();
            }

            Cart::where('user_id', $user->id)->delete();

            DB::commit();

            return redirect()->route('order.show', $order->id)->with('success', 'Checkout berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.showCheckout')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    private function buildPaymentDetails($validated)
    {
        $method = $validated['payment_method'];

        if ($method === 'cash') {
            return 'COD - Bayar saat barang tiba';
        }

        $bankMethod = $validated['bank_method'] ?? null;

        if ($bankMethod === 'kartu_kredit') {
            $ccNumber = $validated['cc_number'] ?? '';
            $maskedCard = '****' . substr(str_replace(' ', '', $ccNumber), -4);
            return 'Kartu Kredit - ' . $maskedCard;
        } else if ($bankMethod === 'kartu_debit') {
            $ccNumber = $validated['cc_number'] ?? '';
            $maskedCard = '****' . substr(str_replace(' ', '', $ccNumber), -4);
            return 'Kartu Debit - ' . $maskedCard;
        } else if ($bankMethod === 'transfer_bank') {
            $bank = $validated['bank_name'] ?? '';
            $account = $validated['bank_account'] ?? '';
            return "Transfer Bank - $bank ($account)";
        } else if ($bankMethod === 'e_wallet') {
            $type = $validated['ewallet_type'] ?? '';
            $id = $validated['ewallet_id'] ?? '';
            return "E-Wallet $type - $id";
        } else if ($bankMethod === 'paypal') {
            return 'PayPal';
        }

        return 'Non-Tunai - Metode Tidak Diketahui';
    }

    public function showOrder($orderId)
    {
        $user = Auth::user();
        $order = Order::with('items')->where('id', $orderId)->where('user_id', $user->id)->firstOrFail();
        return view('cart.order-success', compact('order'));
    }

    public function getCartCount()
    {
        $user = Auth::user();
        $count = Cart::where('user_id', $user->id)->sum('quantity');
        return response()->json(['count' => $count ?? 0]);
    }
}
