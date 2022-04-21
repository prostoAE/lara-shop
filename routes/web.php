<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('shop.shop');
});

Route::get('/product', function () {
    return view('shop.single-product');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/add-product', function () {
        return view('admin.product.add');
    });
});
