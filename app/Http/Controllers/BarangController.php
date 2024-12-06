<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan semua barang
    public function index()
    {
        $barangs = Barang::all();
        return response()->json($barangs);
    }

    // Menampilkan data barang berdasarkan ID
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }

    // Menambahkan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_Barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'stok' => 'required|integer',
            'tanggal' => 'required|date',
            'tgl_kadaluarsa' => 'required|date',
            'minimum_Stok' => 'required|integer',
        ]);

        $barang = Barang::create($request->all());

        return response()->json($barang, 201);
    }

    // Mengupdate data barang
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return response()->json($barang);
    }

    // Menghapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return response()->json(null, 204);
    }
}
