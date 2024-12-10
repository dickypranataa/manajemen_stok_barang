@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Users</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 mb-4 inline-block">
        Tambah User
    </a>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-6 text-left text-gray-600 font-medium">ID</th>
                    <th class="py-3 px-6 text-left text-gray-600 font-medium">Username</th>
                    <th class="py-3 px-6 text-left text-gray-600 font-medium">Role</th>
                    <th class="py-3 px-6 text-left text-gray-600 font-medium">Tanggal Dibuat</th>
                    <th class="py-3 px-6 text-center text-gray-600 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-3 px-6 text-gray-800">{{ $user->id }}</td>
                        <td class="py-3 px-6 text-gray-800">{{ $user->name }}</td>
                        <td class="py-3 px-6 text-gray-800">{{ $user->role }}</td>
                        <td class="py-3 px-6 text-gray-800">{{ $user->created_at->format('d-m-Y') }}</td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-lg hover:bg-yellow-600 transition duration-300">
                                Edit
                            </a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded-lg hover:bg-red-700 transition duration-300">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
