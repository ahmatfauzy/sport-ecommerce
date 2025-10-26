<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('Seventeen Sports');


// dibawah ini uji coba semua

// Route::get('/produk', function () {
//     return view('pages.product');
// })->name('Produk');

// route::get('/detailproduk', function () {
//     return view('pages.detail-product');
// })->name('Detail Produk');

// Route::get('/tentang', function () {
//     return view('pages.about');
// })->name('Tentang');

// Route::get('/profil', function () {
//     return view('pages.profile');
// })->name('profil');

// Route::get('/keranjang', function () {
//     return view('pages.cart');
// })->name('Keranjang');

// Route::get('/checkout', function () {
//     return view('pages.checkout');
// })->name('Checkout');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('Login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('Register');