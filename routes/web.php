<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

// Authentication for login and register
// Login
Route::get('/login', [AuthenticateController::class, 'view_login'])->name('login');
Route::post('/login', [AuthenticateController::class, 'login']);

//Logout
Route::get('/logout', [AuthenticateController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [AuthenticateController::class, 'view_register'])->name('register');
Route::post('/register', [AuthenticateController::class, 'register']);

// Home
Route::get('/', [HomeController::class, 'render'])->name('home');

// Product and Orders
Route::resource('/products', ProductController::class)
    ->missing(function () {
        return Redirect::route('products.index');
    });

Route::resource('/orders', OrdersController::class)
    ->except(['create', 'show'])
    ->missing(function () {
        return Redirect::route('orders.index');
    });

// For admin
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminRegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/admin_product', AdminProductController::class);
});

