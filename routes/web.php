<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PenggunaController;

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

//Landing
Route::get('/', function () {
    return view('welcome');
});

//Autentikasi
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/auth', [LoginController::class, 'autentikasi']);
Route::post('/logout', [LoginController::class, 'logout']);

//Admin
Route::get('/admin/dashboard', [LoginController::class, 'admin'])->name('admin-dashboard');
Route::get('/admin/violation', [PelanggaranController::class, 'index'])->name('admin-violation');
Route::get('/admin/category', [KategoriController::class, 'index'])->name('admin-viocategory');
Route::get('/admin/sanction', [SanksiController::class, 'index'])->name('admin-sanction');
Route::get('/admin/student', [SiswaController::class, 'index'])->name('admin-student');
Route::get('/admin/class', [KelasController::class, 'index'])->name('admin-class');
Route::get('/admin/user', [PenggunaController::class, 'index'])->name('admin-user');

Route::get('/category', [KategoriController::class, 'read'])->name('datakategori');
Route::put('/category/update', [KategoriController::class, 'update'])->name('datakategori.update');
Route::delete('/category/{id}', [KategoriController::class, 'destroy'])->name('datakategori.destroy');
Route::post('/category/store', [KategoriController::class, 'store'])->name('datakategori.store');

Route::get('/class', [KelasController::class, 'read'])->name('datakelas');
Route::put('/class/update', [KelasController::class, 'update'])->name('datakelas.update');
Route::delete('/class/{id}', [KelasController::class, 'destroy'])->name('datakelas.destroy');
Route::post('/class/store', [KelasController::class, 'store'])->name('datakelas.store');

Route::get('/sanction', [SanksiController::class, 'read'])->name('datasanksi');
Route::put('/sanction/update', [SanksiController::class, 'update'])->name('datasanksi.update');
Route::delete('/sanction/{id}', [SanksiController::class, 'destroy'])->name('datasanksi.destroy');
Route::post('/sanction/store', [SanksiController::class, 'store'])->name('datasanksi.store');


//Guru
Route::get('/guru/dashboard', [LoginController::class, 'guru']);