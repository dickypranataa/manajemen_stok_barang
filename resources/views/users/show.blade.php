@extends('layouts.app')

@section('content')
<h1>Detail Pengguna</h1>
<table>
    <tr>
        <th>ID</th>
        <td>{{ $user->user_id }}</td>
    </tr>
    <tr>
        <th>Username</th>
        <td>{{ $user->username }}</td>
    </tr>
    <tr>
        <th>Role</th>
        <td>{{ $user->role }}</td>
    </tr>
    <tr>
        <th>Tanggal Dibuat</th>
        <td>{{ $user->tgl_buat }}</td>
    </tr>
</table>
<a href="{{ route('users.index') }}">Kembali ke Daftar Pengguna</a>
@endsection