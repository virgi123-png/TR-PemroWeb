<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipeJamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

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

Route::redirect('/product-detail', '/product');

Route::get('/product-detail/{id}', [ShopController::class, 'show'])->name('product.detail');

Route::get('/product', [ShopController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/shoping-cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/checkout', [CartController::class, 'showCheckout'])->name('cart.showCheckout');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/order/{order}', [CartController::class, 'showOrder'])->name('order.show');
    Route::get('/cart-count', [CartController::class, 'getCartCount'])->name('cart.count');
});

// Dashboard - hanya untuk admin
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/datatables', [DashboardController::class, 'datatables'])->name('dashboard.datatables');
    Route::get('/dashboard/forms', [DashboardController::class, 'forms'])->name('dashboard.forms');
    Route::get('/dashboard/products', [DashboardController::class, 'products'])->name('dashboard.products');
    Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('dashboard.orders');
    Route::get('/dashboard/orders/{orderId}', [DashboardController::class, 'orderDetail'])->name('dashboard.order-detail');
    Route::post('/dashboard/orders/{orderId}/verify-payment', [DashboardController::class, 'verifyPayment'])->name('dashboard.verify-payment');
    Route::post('/dashboard/orders/{orderId}/update-status', [DashboardController::class, 'updateOrderStatus'])->name('dashboard.update-order-status');
    Route::post('/dashboard/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/dashboard/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/dashboard/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/dashboard/orders/{orderId}/note', [DashboardController::class, 'orderNote'])->name('dashboard.order-note');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/account/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/account/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
});

Route::middleware('auth')->group(function () {
    Route::resource('tipe-jams', TipeJamController::class)->middleware('auth');
});
