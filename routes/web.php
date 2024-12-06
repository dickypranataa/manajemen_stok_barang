<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;

Route::apiResource('barang', BarangController::class);
Route::apiResource('transaksi', TransaksiController::class);
Route::resource('users', UserController::class);

// Rute untuk menampilkan halaman laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

