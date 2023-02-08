<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderPaymentController;
use App\Http\Controllers\panel\PanelController;
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

Route::get('/', [HomeController::class,'welcome'])->name('welcome');

Auth::routes();

// Route::get('products/create',[ProductController::class,'create'])->name('products.create');
// Route::get('products',[ProductController::class,'index'])->name('products/index');
// Route::delete('products/destroy/{product}',[ProductController::class,'delete'])->name('products/destroy');
// Route::get('products/edit/{id}',[ProductController::class,'edit'])->name('products/edit/{id}');
// Route::put('products/update/{id}',[ProductController::class,'update'])->name('products/update/{id}');
// Route::post('products/store',[ProductController::class,'store'])->name('products/store');
// Route::get('products/show/{product:title}',[ProductController::class,'show'])->name('products/show');

Route::resource('/products',ProductController::class)->middleware('is.admin');
Route::resource('orders',OrderController::class)->only(['create','store'])->middleware('is.admin');
Route::resource('carts',CartController::class)->only(['index'])->middleware('is.admin');
Route::resource('products.carts',ProductCartController::class)->only(['store','destroy'])->middleware('is.admin');
Route::resource('orders.payments',OrderPaymentController::class)->only(['store','create'])->middleware('is.admin');
Route::get('panel',[PanelController::class,'index'])->name('panel')->middleware('is.admin');
