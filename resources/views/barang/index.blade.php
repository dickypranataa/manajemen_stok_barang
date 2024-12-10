@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold mb-4">Daftar Barang</h1>

    @if(session('success'))
    <div class="mb-4 text-green-500">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('barang.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Tambah Barang</a>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama Barang</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Satuan</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Stok</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Tanggal Barang Masuk</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Tanggal Kadaluarsa</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Minimum Stok</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barang as $item)
                <tr class="border-t">
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->id_barang }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->nama_Barang }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->satuan }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->stok }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->tanggal->format('Y-m-d H:i:s') }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->tgl_kadaluarsa->format('Y-m-d H:i:s') }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->minimum_Stok }}</td>
                    <td class="px-4 py-2 text-sm">
                        <a href="{{ route('barang.edit', $item->id_barang) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>

                        <a href="{{ route('barang.ambil', $item->id_barang) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Ambil</a>

                        <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection