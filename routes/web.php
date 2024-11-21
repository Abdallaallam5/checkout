<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'show'])->name('product.details');
Route::post('/checkout', [ProductController::class, 'checkout'])->name('product.checkout');

