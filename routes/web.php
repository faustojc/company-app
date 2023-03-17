<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

// Authentication for login and register
Route::get('/login', [AuthenticateController::class, 'authLogin'])->name('login');
Route::get('/register', [AuthenticateController::class, 'render_register'])->name('register');
Route::post('/home', [HomeController::class, 'index'])->name('home');
