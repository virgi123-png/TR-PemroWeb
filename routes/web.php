<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/account', function () {
    return view('account.account');
})->middleware('auth');


