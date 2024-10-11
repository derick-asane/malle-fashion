<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthenticateMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\admin\DashboardController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;




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



//Cart route

Route::get('/cart', [CartController::class, 'create'])->name('client.cart');
Route::post('/cart/{product_id}', [CartController::class, 'addToCart'])->name('store.addtocart');
Route::post('/cart/delete/{id}', [CartController::class, 'destroy'])->name('delete.cart');
Route::post('/cart/edit/quantity/{id}', [CartController::class, 'updateQuantity'])->name('update.quantity');


//Order route

Route::get('/myorder', function () {
    return view('client.myorder');
})->name('client.order');


Route::post('/order', [OrderController::class, 'store'])->name('store.order');





 
//admin


Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/users', [DashboardController::class, 'getUsers'])->name('admin.users');
Route::get('/orders', [DashboardController::class, 'getOrders'])->name('admin.orders');
Route::get('/order_details/{id}', [DashboardController::class, 'show'])->name('order.details');
Route::post('/order/updatestatus/{id}', [DashboardController::class, 'updateStatus'])->name('order.updatestatus');
Route::get('/order/delivered', [DashboardController::class, 'deliveredOrders'])->name('admin.delivered');




