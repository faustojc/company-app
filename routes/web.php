<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication for login and register
// Login
Route::get('/login', [AuthenticateController::class, 'view_login']);
Route::post('/login', [AuthenticateController::class, 'authLogin'])->name('login');

//Logout
Route::get('/login', [AuthenticateController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthenticateController::class, 'view_register']);
Route::post('/register', [AuthenticateController::class, 'authRegister'])->name('register');

// Components
Route::get('/home', [HomeComponent::class, 'render'])->name('home');

// Product and Orders
Route::resource('/home/products', ProductController::class)
    ->missing(function () {
        return Redirect::route('products.index');
    });

Route::resource('/home/orders', OrdersController::class)
    ->missing(function () {
        return Redirect::route('orders.index');
    });
