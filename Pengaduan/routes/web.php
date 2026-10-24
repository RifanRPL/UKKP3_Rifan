<?php

use App\Http\Controllers\AuthManual;
use App\Http\Controllers\KategoriPengaduanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduanUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthManual::class, 'login'])->name('login');

Route::get('/login', [AuthManual::class, 'login'])->name('login');
Route::post('/login', [AuthManual::class, 'loginProses'])->name('loginProses');
Route::post('/logout', [AuthManual::class, 'logout'])->name('logout');

Route::get('/register', [AuthManual::class, 'register'])->name('register');
Route::post('/register', [AuthManual::class, 'registerProses'])->name('registerProses');

Route::get('/admin', function () {return view('admin.index');})->name('admin.index');
Route::resource('pengaduan', PengaduanController::class);   
Route::resource('kategori_pengaduan', KategoriPengaduanController::class);   
Route::resource('user', UserController::class);

Route::get('/cust', function () {return view('cust.index');})->name('cust.index');
Route::resource('pengaduan_customer', PengaduanUserController::class);

