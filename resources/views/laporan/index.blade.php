@extends('layouts.app')

@section('content')
<h1>Halaman Laporan</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Laporan</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporanData as $laporan)
        <tr>
            <td>{{ $laporan['id'] }}</td>
            <td>{{ $laporan['nama'] }}</td>
            <td>{{ $laporan['tanggal'] }}</td>
            <td>
                <a href="{{ route('laporan.show', $laporan['id']) }}">Lihat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection