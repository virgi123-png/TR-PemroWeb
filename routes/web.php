<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipeJamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;

Route::get('/', [ShopController::class, 'home'])->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])
->name('login')
->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register'])
->name('register')
->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
->name('logout')
->middleware('auth');

Route::get('/help', function () {
    return view('help.help');
});

Route::get('/about', function () {
    return view('about.about');
});

Route::get('/blog-detail', function () {
    return view('blog.blog-detail');
});

Route::get('/blog', function () {
    return view('blog.blog');
});

Route::get('/contact', function () {
    return view('contact.contact');
});

Route::get('/product', [ShopController::class, 'index']);
Route::get('/product-detail/{id}', [ShopController::class, 'show'])->name('product.detail');

Route::get('/product-detail/{id}', [ShopController::class, 'show'])->name('product.detail');

Route::get('/product', [ShopController::class, 'index']);

Route::get('/shoping-cart', function () {
    return view('cart.shoping-cart');
});

// Dashboard - hanya untuk admin
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/datatables', [DashboardController::class, 'datatables'])->name('dashboard.datatables');
    Route::get('/dashboard/forms', [TipeJamController::class, 'index'])->name('dashboard.forms');
    Route::get('/dashboard/products', [ProductController::class, 'index'])->name('dashboard.products');
    Route::post('/dashboard/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/dashboard/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/dashboard/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/account/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/account/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
});

Route::middleware('auth')->group(function () {
    Route::resource('tipe-jams', TipeJamController::class)->middleware('auth');
});
