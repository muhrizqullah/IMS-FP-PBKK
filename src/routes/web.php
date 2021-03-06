<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Resource\OrderController;
use App\Http\Controllers\Resource\ProductController;
use App\Http\Controllers\Resource\CategoryController;
use App\Http\Controllers\Resource\SupplierController;
use App\Http\Controllers\Resource\OrderDetailController;


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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Resource
Route::resource('/category', CategoryController::class)->middleware('auth');
Route::resource('/supplier', SupplierController::class)->middleware('auth');
Route::resource('/product', ProductController::class)->middleware('auth');
Route::resource('/order', OrderController::class)->middleware('auth');
Route::resource('/order-detail', OrderDetailController::class)->middleware('auth');
