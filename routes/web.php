<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('shop.shop');
});

Route::get('/product', function () {
    return view('shop.single-product');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/product', ProductController::class);
    Route::resource('/category', CategoryController::class);
});
