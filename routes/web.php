<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index']);
Route::get('/search', [ProductController::class, 'search_product'])->name('search.get');
Route::get('/product/{id}', [ProductController::class, 'product_details']);
Route::get('/cart', [ProductController::class, 'cart_details'])->name('cart');
Route::post('/pay', [UserController::class, 'pay'])->name('pay');
Route::post('/product/add-to-cart', [ProductController::class, 'add_to_cart'])->name('add_to_cart');
Route::post('/product/remove-cart-product', [ProductController::class, 'remove_cart_product'])->name('remove-cart-product');
Route::post('/product/buy-cart-product', [ProductController::class, 'buy_cart_product'])->name('buy-cart-product');
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'login']);
