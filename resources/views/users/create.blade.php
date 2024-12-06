@extends('layouts.app')

@section('content')
<h1>Tambah Pengguna Baru</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <label for="role">Role</label>
    <select name="role" id="role" required>
        <option value="admin">Admin</option>
        <option value="staff">Staff</option>
    </select>

    <label for="tgl_buat">Tanggal Dibuat</label>
    <input type="date" name="tgl_buat" id="tgl_buat" required>

    <button type="submit">Simpan</button>
</form>
@endsection