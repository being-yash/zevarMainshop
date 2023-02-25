<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\MainShopController::class, 'index']);
Route::get('/search/{query}', [App\Http\Controllers\MainShopController::class, 'search']);
Route::get('/shop', [App\Http\Controllers\MainShopController::class, 'shop'])->name('shop');
Route::get('/detail/{name}/{code}', [App\Http\Controllers\MainShopController::class, 'detail'])->name('detail');
Route::get('/categories', [App\Http\Controllers\MainShopController::class, 'categories'])->name('categories');
Route::get('/category/{name}', [App\Http\Controllers\MainShopController::class, 'category'])->name('category');

Route::get('/filter', [App\Http\Controllers\MainShopController::class, 'filter']);
Route::get('/cart', [App\Http\Controllers\MainShopController::class, 'cart']);

Route::get('/checkout', [App\Http\Controllers\MainShopController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [App\Http\Controllers\MainShopController::class, 'checkoutSave'])->name('checkoutSave');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth Routes
Auth::routes();
