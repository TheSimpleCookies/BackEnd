<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - The Simple Snack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ secure_asset('public/build/assets/app-B1Jl-1IT.css') }}">
    <script src="{{ secure_asset('public/build/assets/app-Due1s3iS.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>

<body class="bg-gray-50 font-[Poppins,Arial]">

<div class="flex min-h-screen">

    <aside id="sidebar"
    class="fixed lg:static top-0 left-0 h-full w-64 bg-white border-r p-5 z-50 transform -translate-x-full lg:translate-x-0 transition duration-300">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-pink-500">Admin Panel</h2>
            <button id="closeSidebar" class="lg:hidden">
                <iconify-icon icon="mdi:close" width="24"></iconify-icon>
            </button>
        </div>

        <nav class="space-y-2 text-sm">
            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 p-3 rounded-xl
               {{ request()->routeIs('dashboard') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                <iconify-icon icon="mdi:view-dashboard-outline" width="24"></iconify-icon>
                Dashboard
            </a>

            <a href="{{ route('orders.index') }}"
               class="flex items-center gap-3 p-3 rounded-xl
               {{ request()->routeIs('orders.*') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                <iconify-icon icon="mdi:receipt-text-outline" width="24"></iconify-icon>
                Orders
            </a>

            <a href="{{ route('catalog.index') }}" 
                class="flex items-center gap-3 p-3 rounded-xl 
                {{ request()->routeIs('catalog.*') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                    <iconify-icon icon="mdi:package-variant-closed" width="24"></iconify-icon>
                    Catalog
            </a>

            <a href="{{ route('finance.index') }}" 
                class="flex items-center gap-3 p-3 rounded-xl 
                {{ request()->routeIs('finance.*') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                    <iconify-icon icon="mdi:cash-multiple" width="24"></iconify-icon>
                    Finance
            </a>

            <a href="{{ url('/') }}" target="_blank"
                class="flex items-center gap-3 p-3 rounded-xl hover:bg-pink-50 text-gray-600 hover:text-pink-600 transition-colors font-medium">
                    <iconify-icon icon="mdi:home-outline" width="24"></iconify-icon>
                    Lihat Web Customer
            </a>

            <hr class="my-4">
            
            <a href="{{ route('profile.edit') }}" 
            class="flex items-center gap-3 p-3 rounded-xl 
            {{ request()->routeIs('profile.*') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                <iconify-icon icon="mdi:cog-outline" width="24"></iconify-icon>
                Settings
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 p-3 hover:bg-red-50 text-gray-600 hover:text-red-600 rounded-xl w-full text-left transition-colors">
                    <iconify-icon icon="mdi:logout" width="24"></iconify-icon>
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <div id="overlay" class="fixed inset-0 bg-black/30 hidden z-40 lg:hidden"></div>

    <main class="flex-1 px-4 sm:px-6 lg:px-12 py-6 overflow-x-hidden">

        <div class="flex justify-between items-center mb-8 gap-6">
            
            <div class="flex items-center gap-3 w-full max-w-5xl">
                <button id="btnSidebar" class="lg:hidden text-gray-600">
                    <iconify-icon icon="mdi:menu" width="24"></iconify-icon>
                </button>

                {{-- PERBAIKAN: Search hanya muncul jika BUKAN di halaman Profile --}}
                @if(!request()->routeIs('profile.*'))
                <form action="{{ url()->current() }}" method="GET" class="relative w-full">
                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari data di sini..."
                        class="w-full px-5 py-3 border border-pink-200 rounded-xl bg-white
                               focus:outline-none focus:ring-2 focus:ring-pink-100 focus:border-pink-400 
                               transition-all duration-300">

                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-pink-500 hover:text-pink-700 transition-colors bg-transparent border-none p-0">
                        <iconify-icon icon="mdi:magnify" width="22"></iconify-icon>
                    </button>
                </form>
                @else
                {{-- Kosongkan atau beri judul halaman saat di Setting --}}
                <div class="w-full">
                    <h1 class="text-xl font-bold text-gray-800"></h1>
                </div>
                @endif
            </div>

            <div class="flex items-center gap-5 shrink-0">
                <iconify-icon icon="mdi:bell-outline" class="text-gray-400 cursor-pointer hover:text-pink-500 transition-colors" width="24"></iconify-icon>
                
                <div class="flex items-center gap-2 pl-2 border-l border-gray-200">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-[10px] text-gray-400">Administrator</p>
                    </div>
                    <iconify-icon icon="mdi:account-circle" class="text-pink-500" width="32"></iconify-icon>
                </div>
            </div>
        </div>

        <div class="fade-in">
            @yield('content')
        </div>

    </main>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const btn = document.getElementById('btnSidebar');
    const overlay = document.getElementById('overlay');
    const closeBtn = document.getElementById('closeSidebar');

    btn.onclick = () => {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    };

    overlay.onclick = closeBtn.onclick = () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    };
</script>

<style>
    .fade-in {
        animation: fadeIn 0.4s ease-in;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</body>
</html>