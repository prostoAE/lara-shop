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
    Route::get('/dashboard', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/add', [ProductController::class, 'create'])->name('product.add');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/product/{product}/delete', [ProductController::class, 'destroy'])->name('product.delete');
});
