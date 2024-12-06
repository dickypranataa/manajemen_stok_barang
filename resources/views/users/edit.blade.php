@extends('layouts.app')

@section('content')
<h1>Edit Pengguna</h1>
<form action="{{ route('users.update', $user->user_id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="{{ $user->username }}" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <label for="role">Role</label>
    <input type="number" name="role" id="role" value="{{ $user->role }}" required>

    <label for="tgl_buat">Tanggal Dibuat</label>
    <input type="date" name="tgl_buat" id="tgl_buat" value="{{ $user->tgl_buat }}" required>

    <button type="submit">Simpan</button>
</form>
@endsection