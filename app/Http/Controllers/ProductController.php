<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TipeJam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('tipeJam')->get();
        $tipeJams = TipeJam::all();
        $product = null;

        if ($request->has('edit_product')) {
            $product = Product::findOrFail($request->edit_product);
        }

        return view('dashboard.products', compact('products', 'product', 'tipeJams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric|min:0',
            'stock_produk' => 'required|integer|min:0',
            'deskripsi_singkat_produk' => 'nullable|string',
            'tipe_jam_id' => 'nullable|exists:tipe_jams,id',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stock_produk' => $request->stock_produk,
            'deskripsi_singkat_produk' => $request->deskripsi_singkat_produk,
            'tipe_jam_id' => $request->tipe_jam_id,
        ];

        if ($request->hasFile('foto_produk')) {
            $data['foto_produk'] = $request->file('foto_produk')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('dashboard.products')->with('success', 'Product berhasil ditambahkan');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_produk' => 'required|numeric|min:0',
            'stock_produk' => 'required|integer|min:0',
            'deskripsi_singkat_produk' => 'nullable|string',
            'tipe_jam_id' => 'nullable|exists:tipe_jams,id',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stock_produk' => $request->stock_produk,
            'deskripsi_singkat_produk' => $request->deskripsi_singkat_produk,
            'tipe_jam_id' => $request->tipe_jam_id,
        ];

        if ($request->hasFile('foto_produk')) {
            $data['foto_produk'] = $request->file('foto_produk')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('dashboard.products')->with('success', 'Product berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard.products')->with('success', 'Product berhasil dihapus');
    }
}
