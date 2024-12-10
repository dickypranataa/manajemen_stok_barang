<!-- resources/views/layouts/sidebar.blade.php -->
<div class="bg-gray-800 text-white w-64 min-h-screen">
    <div class="p-6">
        <h4 class="text-2xl font-bold">Admin Dashboard</h4>
    </div>
    <div class="space-y-2">
        <!-- Menu Dashboard -->
        <a href="{{ route('users.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded transition">Dashboard</a>

        <!-- Menu Notifikasi -->
        <a href="{{ route('notifikasi.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded transition flex items-center">
            Notifikasi
            @isset($totalNotifications)
            @if($totalNotifications > 0)
            <span class="ml-2 bg-red-600 text-white text-sm font-bold px-2 py-1 rounded-full">
                {{ $totalNotifications }}
            </span>
            @endif
            @endisset
        </a>

        <!-- Menu Users -->
        <a href="{{ route('users.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded transition">Users List</a>
        <a href="{{ route('users.create') }}" class="block py-2 px-4 hover:bg-gray-700 rounded transition">Add User</a>

        <!-- Menu Barang -->
        <a href="{{ route('barang.index') }}" class="block py-2 px-4 hover:bg-gray-700 rounded transition">Barang List</a>
        <a href="{{ route('barang.create') }}" class="block py-2 px-4 hover:bg-gray-700 rounded transition">Add Barang</a>



        <!-- Menu Logout -->
        <a href="{{ route('logout') }}" class="block py-2 px-4 hover:bg-gray-700 rounded transition">Logout</a>
    </div>
</div>