<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrdersDetailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    Route::get('/', function () {
        return view('welcome');
    });

    // Products
    Route::resource('/products', ProductsController::class)->middleware(['auth', 'verified']);
    // Orders
    Route::post('/orders', [OrdersController::class,'store'])->middleware(['auth', 'verified'])->name('orders.store');
    Route::post('/ordersdetail', [OrdersDetailController::class,'store'])->middleware(['auth', 'verified'])->name('ordersdetail.store');
    Route::resource('/orders', OrdersController::class)->middleware(['auth', 'verified']);
    // Home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Auth::routes();
