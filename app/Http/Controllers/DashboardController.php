<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\TipeJam;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Middleware untuk verifikasi admin
        $this->middleware(function ($request, $next) {
            if ($request->user() && $request->user()->role === 'admin') {
                return $next($request);
            }
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        });
    }

    public function index()
    {
        $visitorCount = User::where('role', 'user')->count();

        // Calculate total sales dari order total field
        $totalSales = Order::sum('total');

        // Get total orders count
        $totalOrders = Order::count();

        return view('dashboard.index', compact('visitorCount', 'totalSales', 'totalOrders'));
    }

    public function forms(Request $request)
    {
        $tipeJams = TipeJam::all();
        $tipeJam = null;

        if ($request->has('edit') && $request->edit) {
            $tipeJam = TipeJam::find($request->edit);
        }

        return view('dashboard.forms', compact('tipeJams', 'tipeJam'));
    }

    public function products(Request $request)
    {
        $products = Product::all();
        $tipeJams = TipeJam::all();
        $product = null;

        if ($request->has('edit_product') && $request->edit_product) {
            $product = Product::find($request->edit_product);
        }

        return view('dashboard.products', compact('products', 'tipeJams', 'product'));
    }

    public function datatables()
    {
        $users = User::where('role', 'user')->get();
        return view('dashboard.datatables', compact('users'));
    }

    public function orders()
    {
        $orders = Order::with('user', 'items')->orderBy('created_at', 'desc')->get();
        return view('dashboard.orders', compact('orders'));
    }

    public function orderDetail($orderId)
    {
        $order = Order::with('user', 'items')->findOrFail($orderId);
        return view('dashboard.order-detail', compact('order'));
    }

    public function verifyPayment(Request $request, $orderId)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,completed,failed',
            'notes' => 'nullable|string',
        ]);

        $order = Order::findOrFail($orderId);
        $order->payment_status = $request->payment_status;

        if ($request->payment_status === 'completed') {
            $order->status = 'processing';
        } elseif ($request->payment_status === 'failed') {
            $order->status = 'cancelled';
        }

        $order->save();

        return redirect()->route('dashboard.order-detail', $order->id)->with('success', 'Status pembayaran berhasil diperbarui!');
    }

    public function updateOrderStatus(Request $request, $orderId)
    {
        $request->validate([
            'status' => 'required|in:processing,shipped,delivered,cancelled',
        ]);

        $order = Order::findOrFail($orderId);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('dashboard.order-detail', $order->id)->with('success', 'Status pesanan berhasil diperbarui!');
    }
}
