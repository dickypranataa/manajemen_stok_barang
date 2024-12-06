@extends('layouts.app')

@section('content')
<h1>Daftar Pengguna</h1>
<a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Pengguna</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->user_id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->tgl_buat }}</td>
            <td>
                <a href="{{ route('users.show', $user->user_id) }}">Lihat</a>
                <a href="{{ route('users.edit', $user->user_id) }}">Edit</a>
                <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection