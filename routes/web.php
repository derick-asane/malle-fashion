<?php

use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;



Route::get('/', function () {
    return view('landing');
});




// Show login form
Route::get('/login', [AuthController::class, 'create'])->name('loginform');

// Handle login form submission
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




//register controller

//show the registration form
Route::get('/register', [RegisterController::class, 'create'])->name('registerform');
Route::post('/register', [RegisterController::class, 'store'])->name('storeuser');


Route::get('/home', function () {
    return view('client.home');
})->name('client.home')->middleware('auth');




//Products route
Route::get('/shop', [ProductController::class, 'index'])->name('client.shop');

Route::get('/product', [ProductController::class, 'index'])->name('admin.product');

Route::get('/addproduct', [ProductController::class, 'create'])->name('productform');
Route::post('/addproduct', [ProductController::class, 'store'])->name('storeproduct');
Route::get('product/{product}/editproduct', [ProductController::class, 'edit'])->name('editproductform');
Route::put('product/{product}/updateproduct', [ProductController::class, 'update'])->name('updateproductform');













//admin

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

