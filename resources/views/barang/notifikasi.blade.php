@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold mb-4">Notifikasi</h1>

    <!-- Barang Hampir Habis -->
    <h2 class="text-2xl font-semibold mt-4">Barang Hampir Habis</h2>
    @if($barangAlmostOutOfStock->isEmpty())
    <p class="text-gray-600">Tidak ada barang yang hampir habis.</p>
    @else
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama Barang</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Stok</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Minimum Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangAlmostOutOfStock as $item)
                <tr class="border-t">
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->nama_Barang }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->stok }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->minimum_Stok }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Barang Hampir Kadaluarsa -->
    <h2 class="text-2xl font-semibold mt-4">Barang Hampir Kadaluarsa</h2>
    @if($barangExpiringSoon->isEmpty())
    <p class="text-gray-600">Tidak ada barang yang hampir kadaluarsa dalam 7 hari ke depan.</p>
    @else
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama Barang</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Tanggal Kadaluarsa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangExpiringSoon as $item)
                <tr class="border-t">
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->nama_Barang }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $item->tgl_kadaluarsa }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection