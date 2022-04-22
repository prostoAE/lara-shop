<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('shop.shop');
});

Route::get('/product', function () {
    return view('shop.single-product');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', [ProductController::class, 'index']);
    Route::get('/add-product', [ProductController::class, 'create'])->name('product.add');
    Route::get('/edit-product', function () {
        return view('admin.product.edit');
    })->name('product.edit');
});
