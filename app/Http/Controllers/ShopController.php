<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TipeJam;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home()
    {
        $products = Product::all();
        $tipeJams = TipeJam::all();
        return view('welcome', compact('products', 'tipeJams'));
    }

    public function index()
    {
        $products = Product::all();
        $tipeJams = TipeJam::all();
        return view('product.product', compact('products', 'tipeJams'));
    }

    public function show($id)
    {
        $product = Product::with('tipeJam')->findOrFail($id);
        $relatedProducts = Product::where('tipe_jam_id', $product->tipe_jam_id)
            ->where('id', '!=', $id)
            ->limit(8)
            ->get();
        return view('product.product-detail', compact('product', 'relatedProducts'));
    }
}
