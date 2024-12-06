<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok Barang</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <!-- Navigasi -->
        <nav>
            <ul>
                <li><a href="{{ route('users.index') }}">Daftar Pengguna</a></li>
                <li><a href="{{ route('barang.index') }}">Barang</a></li>
                <li><a href="{{ route('laporan.index') }}">Laporan</a></li>
            </ul>
        </nav>

        <!-- Konten Halaman -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>

</html>