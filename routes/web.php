<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/autentikasi', [LoginController::class, 'autentikasi']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/guru/dashboard', function () {
    return view('guru.dashboard');
});