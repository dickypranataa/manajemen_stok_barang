<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        $transaksis = Transaksi::all();
        return response()->json($transaksis);
    }

    // Menampilkan transaksi berdasarkan ID
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return response()->json($transaksi);
    }

    // Menambahkan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|integer|exists:Barang,id_barang',
            'user_id' => 'required|integer|exists:users,user_id',
            'satuan' => 'required|string|max:50',
            'jml_barang' => 'required|integer',
            'tipe' => 'required|in:in,out',
            'tgl_transaksi' => 'required|date',
        ]);

        $transaksi = Transaksi::create($request->all());

        // Update stok barang setelah transaksi
        $barang = Barang::findOrFail($request->id_barang);
        if ($request->tipe == 'in') {
            $barang->stok += $request->jml_barang;
        } else {
            $barang->stok -= $request->jml_barang;
        }
        $barang->save();

        return response()->json($transaksi, 201);
    }

    // Mengupdate transaksi
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());

        return response()->json($transaksi);
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return response()->json(null, 204);
    }
}
