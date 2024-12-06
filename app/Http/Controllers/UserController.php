<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users')); // Mengirim data ke view 'users.index'
    }

    // Menampilkan form untuk membuat pengguna baru
    public function create()
    {
        return view('users.create'); // Mengembalikan tampilan 'create.blade.php'
    }

    // Menambahkan pengguna baru
    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6',
            'role' => 'required',
            'tgl_buat' => 'required|date',
        ]);

        // Membuat pengguna baru menggunakan model User
        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Meng-enkripsi password
            'role' => $request->role,
            'tgl_buat' => $request->tgl_buat,
        ]);

        // Mengarahkan kembali ke halaman index setelah berhasil membuat pengguna
        return redirect()->route('users.index');
    }

    // Menampilkan data pengguna berdasarkan ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user')); // Mengirim data ke view 'users.show'
    }

    // Mengupdate pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index'); // Mengarahkan kembali ke halaman index
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index'); // Mengarahkan kembali ke halaman index
    }
}
