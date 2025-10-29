<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){ return redirect('/products'); });

// Auth
Route::get('/register', [AuthController::class,'showRegister'])->name('register');;
Route::post('/register', [AuthController::class,'register']);
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

// Products 
Route::get('/products', [ProductController::class,'index'])->name('products.index');

// Admin product management 
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
    Route::post('/products', [ProductController::class,'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class,'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('products.destroy');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/test', fn() => 'Admin ok');
});