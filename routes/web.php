<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

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

Route::get('/product-detail', function () {
    return view('product.product-detail');
});

Route::get('/product', function () {
    return view('product.product');
});

Route::get('/shoping-cart', function () {
    return view('cart.shoping-cart');
});

// Dashboard - hanya untuk admin
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/datatables', [DashboardController::class, 'datatables'])->name('dashboard.datatables');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/account/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/account/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
});


