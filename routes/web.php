<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TipeJamController;

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
    Route::get('/dashboard/forms', [TipeJamController::class, 'index'])->name('dashboard.forms');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/account/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/account/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
});

Route::middleware('auth')->group(function () {
    Route::resource('tipe-jams', TipeJamController::class)->middleware('auth');
    Route::get('/tipe-jams', [TipeJamController::class, 'index'])->name('tipe-jams.index');
    Route::get('/tipe-jams/create', [TipeJamController::class, 'create'])->name('tipe-jams.create');
    Route::post('/tipe-jams', [TipeJamController::class, 'store'])->name('tipe-jams.store');
    Route::get('/tipe-jams/{tipeJam}/edit', [TipeJamController::class, 'edit'])->name('tipe-jams.edit');
    Route::put('/tipe-jams/{tipeJam}', [TipeJamController::class, 'update'])->name('tipe-jams.update');
    Route::delete('/tipe-jams/{tipeJam}', [TipeJamController::class, 'destroy'])->name('tipe-jams.destroy');
});



