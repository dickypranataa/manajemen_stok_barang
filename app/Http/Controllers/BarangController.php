<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon; // Pastikan untuk menambahkan Carbon
use Illuminate\Support\Facades\View;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function index()
    {
        // Ambil semua barang
        $barang = Barang::all();

        // Filter barang yang hampir habis dan yang akan kadaluarsa
        $barangAlmostOutOfStock = $barang->filter(function ($item) {
            return $item->stok <= $item->minimum_Stok;
        });

        $barangExpiringSoon = $barang->filter(function ($item) {
            // Periksa apakah tanggal kadaluarsa kurang dari 7 hari
            return Carbon::parse($item->tgl_kadaluarsa)->diffInDays(Carbon::now()) <= 7;
        });

        // Kirim data ke view
        return view('barang.index', compact('barang', 'barangAlmostOutOfStock', 'barangExpiringSoon'));
    }

    // Menampilkan form untuk ambil barang
    public function ambilBarang($id)
    {
        // Menampilkan detail barang berdasarkan ID
        $barang = Barang::findOrFail($id);
        return view('barang.ambil', compact('barang'));
    }

    // untuk notifikasi barang
    public function notifikasi()
    {
        // Ambil semua barang
        $barang = Barang::all();

        // Filter barang dengan stok rendah
        $barangAlmostOutOfStock = $barang->filter(function ($item) {
            return $item->stok <= $item->minimum_Stok; // Barang yang stoknya <= minimum_Stok
        });

        // Filter barang dengan kadaluarsa dalam waktu 7 hari
        $barangExpiringSoon = $barang->filter(function ($item) {
            $expiryDate = Carbon::parse($item->tgl_kadaluarsa);
            $now = Carbon::now();
            $sevenDaysFromNow = $now->copy()->addDays(7);

            // Barang akan masuk jika tanggal kadaluarsa berada antara sekarang dan 7 hari ke depan
            return $expiryDate->greaterThanOrEqualTo($now) && $expiryDate->lessThanOrEqualTo($sevenDaysFromNow);
        });

        // Kirim data ke view
        return view('barang.notifikasi', compact('barangAlmostOutOfStock', 'barangExpiringSoon'));
    }


    // untuk bubble reminder notifikasi jika ada barang yang akan habis maupun kadaluarsa
    public function __construct()
    {
        // Ambil data barang hampir habis dan hampir kadaluarsa
        $barangAlmostOutOfStockCount = Barang::whereColumn('stok', '<=', 'minimum_Stok')->count();
        $barangExpiringSoonCount = Barang::whereBetween('tgl_kadaluarsa', [Carbon::now(), Carbon::now()->addDays(7)])->count();

        // Total notifikasi
        $totalNotifications = $barangAlmostOutOfStockCount + $barangExpiringSoonCount;

        // Bagikan total notifikasi ke semua view
        View::share('totalNotifications', $totalNotifications);
    }



    // Mengupdate stok setelah barang diambil
    public function updateStok(Request $request, $id)
    {
        // Cari barang berdasarkan ID
        $barang = Barang::findOrFail($id);

        // Validasi jumlah yang diminta
        $request->validate([
            'jumlah' => 'required|integer|min:1|max:' . $barang->stok,
        ]);

        // Kurangi jumlah stok yang diambil
        $barang->stok -= $request->jumlah;
        $barang->save();

        // Redirect kembali ke daftar barang dengan pesan sukses
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diambil!');
    }

    // Menampilkan form untuk menambah barang
    public function create()
    {
        return view('barang.create');
    }

    // Menyimpan barang baru
    public function store(Request $request)
{
    // Validasi input dari form
    $request->validate([
        'nama_Barang' => 'required|string|max:255',
        'satuan' => 'required|string|max:255',
        'stok' => 'required|integer|min:0',
        'tanggal' => 'required|date',
        'tgl_kadaluarsa' => 'required|date',
        'minimum_Stok' => 'required|integer|min:0',
    ]);

    // Simpan barang baru dengan input yang valid
    Barang::create([
        'nama_Barang' => $request->nama_Barang,
        'satuan' => $request->satuan,
        'stok' => $request->stok,
        'tanggal' => $request->tanggal,
        'tgl_kadaluarsa' => $request->tgl_kadaluarsa,
        'minimum_Stok' => $request->minimum_Stok,
    ]);

    // Redirect kembali ke daftar barang dengan pesan sukses
    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
}


    // Menampilkan form untuk edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    // Menyimpan perubahan data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_Barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'tanggal' => 'required|date',
            'tgl_kadaluarsa' => 'required|date',
            'minimum_Stok' => 'required|integer|min:0',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Menghapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}