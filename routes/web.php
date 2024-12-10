<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



// Route::apiResource('barang', BarangController::class);
// Route::apiResource('transaksi', TransaksiController::class);
Route::resource('users', UserController::class);

// Menampilkan form login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Proses login
Route::post('login', [LoginController::class, 'login'])->name('login.post');

// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/users', [UserController::class, 'index']);

Route::resource('barang', BarangController::class);

// Route untuk mengambil barang (form ambil barang)
Route::get('barang/{id}/ambil', [BarangController::class, 'ambilBarang'])->name('barang.ambil');

// Route untuk mengupdate stok barang setelah diambil
Route::put('barang/{id}/ambil', [BarangController::class, 'updateStok'])->name('barang.updateStok');

//notifikasi buat barang yang kadaluarsa & minimum stok
Route::get('/notifikasi', [BarangController::class, 'notifikasi'])->name('notifikasi.index');

// Rute untuk menampilkan halaman laporan
// Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

