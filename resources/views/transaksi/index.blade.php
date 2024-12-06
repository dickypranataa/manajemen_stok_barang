@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Transaksi</h1>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Barang</th>
                <th>User ID</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah Barang</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $trx)
            <tr>
                <td>{{ $trx->id_transaksi }}</td>
                <td>{{ $trx->id_barang }}</td>
                <td>{{ $trx->user_id }}</td>
                <td>{{ $trx->tgl_transaksi }}</td>
                <td>{{ $trx->jml_barang }}</td>
                <td>{{ $trx->tipe }}</td>
                <td>
                    <a href="{{ route('transaksi.edit', $trx->id_transaksi) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transaksi.destroy', $trx->id_transaksi) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection