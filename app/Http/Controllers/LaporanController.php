<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Menampilkan halaman laporan
    public function index()
    {
        // Anda bisa mengambil data dari model atau database di sini
        $laporanData = []; // Misalnya, data laporan kosong untuk saat ini

        return view('laporan.index', compact('laporanData')); // Mengirim data ke view 'laporan.index'
    }
}
