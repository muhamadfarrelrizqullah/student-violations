<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ExcelController;

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
Route::get('/admin/profile', [ProfilController::class, 'index'])->name('admin-profile');

Route::get('/category', [KategoriController::class, 'read'])->name('datakategori');
Route::put('/category/update', [KategoriController::class, 'update'])->name('datakategori.update');
Route::delete('/category/{id}', [KategoriController::class, 'destroy'])->name('datakategori.destroy');
Route::post('/category/store', [KategoriController::class, 'store'])->name('datakategori.store');
Route::get('/export-excel/category', [ExcelController::class, 'exportCategory'])->name('export.excel-category');

Route::get('/class', [KelasController::class, 'read'])->name('datakelas');
Route::put('/class/update', [KelasController::class, 'update'])->name('datakelas.update');
Route::delete('/class/{id}', [KelasController::class, 'destroy'])->name('datakelas.destroy');
Route::post('/class/store', [KelasController::class, 'store'])->name('datakelas.store');
Route::get('/export-excel/class', [ExcelController::class, 'exportClass'])->name('export.excel-class');

Route::get('/sanction', [SanksiController::class, 'read'])->name('datasanksi');
Route::put('/sanction/update', [SanksiController::class, 'update'])->name('datasanksi.update');
Route::delete('/sanction/{id}', [SanksiController::class, 'destroy'])->name('datasanksi.destroy');
Route::post('/sanction/store', [SanksiController::class, 'store'])->name('datasanksi.store');
Route::get('/export-excel/sanction', [ExcelController::class, 'exportSanction'])->name('export.excel-sanction');

Route::get('/user', [PenggunaController::class, 'read'])->name('datapengguna');
Route::put('/user/update', [PenggunaController::class, 'update'])->name('datapengguna.update');
Route::delete('/user/{id}', [PenggunaController::class, 'destroy'])->name('datapengguna.destroy');
Route::post('/user/store', [PenggunaController::class, 'store'])->name('datapengguna.store');
Route::get('/export-excel/user', [ExcelController::class, 'exportUser'])->name('export.excel-user');

Route::get('/student', [SiswaController::class, 'read'])->name('datasiswa');
Route::put('/student/update', [SiswaController::class, 'update'])->name('datasiswa.update');
Route::delete('/student/{id}', [SiswaController::class, 'destroy'])->name('datasiswa.destroy');
Route::post('/student/store', [SiswaController::class, 'store'])->name('datasiswa.store');
Route::get('/export-excel/student', [ExcelController::class, 'exportStudent'])->name('export.excel-student');

Route::get('/violation', [PelanggaranController::class, 'read'])->name('datapelanggaran');
Route::put('/violation/update', [PelanggaranController::class, 'update'])->name('datapelanggaran.update');
Route::delete('/violation/{id}', [PelanggaranController::class, 'destroy'])->name('datapelanggaran.destroy');
Route::post('/violation/store', [PelanggaranController::class, 'store'])->name('datapelanggaran.store');
Route::get('/export-excel/violation', [ExcelController::class, 'exportViolation'])->name('export.excel-violation');

Route::get('/admin/profile-edit', [ProfilController::class, 'edit'])->name('admin.profile-edit');
Route::post('/admin/profile-edit-process', [ProfilController::class, 'update'])->name('admin.profile-edit-proses');

//Teacher
Route::get('/teacher/dashboard', [LoginController::class, 'teacher'])->name('teacher-dashboard');
Route::get('/teacher/violation', [PelanggaranController::class, 'indexTeacher'])->name('teacher-violation');
Route::get('/teacher/student', [SiswaController::class, 'indexTeacher'])->name('teacher-student');
Route::get('/teacher/profile', [ProfilController::class, 'indexTeacher'])->name('teacher-profile');

Route::get('/teacher/profile-edit', [ProfilController::class, 'editTeacher'])->name('teacher.profile-edit');
Route::post('/teacher/profile-edit-process', [ProfilController::class, 'update'])->name('teacher.profile-edit-proses');