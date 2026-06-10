
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - The Simple Snack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ secure_asset('public/build/assets/app-B1Jl-1IT.css') }}">
    <script src="{{ secure_asset('public/build/assets/app-Due1s3iS.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>

<body class="bg-gray-50 font-[Poppins,Arial] overflow-x-hidden">

<div class="flex min-h-screen">

    <aside id="sidebar"
        class="fixed lg:static top-0 left-0 h-full w-64 bg-white border-r p-5 z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-pink-500">Admin Panel</h2>
            <button id="closeSidebar" class="lg:hidden p-1 text-gray-500">
                <iconify-icon icon="mdi:close" width="24"></iconify-icon>
            </button>
        </div>

        <nav class="space-y-2 text-sm">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 p-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                <iconify-icon icon="mdi:view-dashboard-outline" width="24"></iconify-icon>
                Dashboard
            </a>

            <a href="{{ route('orders.index') }}"
               class="flex items-center gap-3 p-3 rounded-xl {{ request()->routeIs('orders.*') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                <iconify-icon icon="mdi:receipt-text-outline" width="24"></iconify-icon>
                Orders
            </a>

            <a href="{{ route('catalog.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl {{ request()->routeIs('catalog.*') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                <iconify-icon icon="mdi:package-variant-closed" width="24"></iconify-icon>
                Catalog
            </a>

            <a href="{{ route('finance.index') }}" 
               class="flex items-center gap-3 p-3 rounded-xl {{ request()->routeIs('finance.*') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                <iconify-icon icon="mdi:cash-multiple" width="24"></iconify-icon>
                Finance
            </a>

            <hr class="my-4 border-pink-50">

            <a href="{{ route('profile.edit') }}" 
               class="flex items-center gap-3 p-3 rounded-xl {{ request()->routeIs('profile.*') ? 'bg-pink-50 text-pink-600 font-semibold' : 'hover:bg-pink-50 text-gray-600' }}">
                <iconify-icon icon="mdi:cog-outline" width="24"></iconify-icon>
                Settings
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 p-3 hover:bg-red-50 text-gray-600 hover:text-red-600 rounded-xl w-full text-left transition">
                    <iconify-icon icon="mdi:logout" width="24"></iconify-icon>
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <div id="overlay" class="fixed inset-0 bg-black/30 hidden z-40 lg:hidden transition-opacity"></div>

    <main class="flex-1 w-full px-4 sm:px-6 lg:px-12 py-6 overflow-hidden">

        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            
            <div class="flex items-center gap-3 w-full md:max-w-2xl">
                <button id="btnSidebar" class="lg:hidden p-2 text-gray-600 hover:bg-pink-50 rounded-lg shrink-0">
                    <iconify-icon icon="mdi:menu" width="28"></iconify-icon>
                </button>

                <div class="relative w-full">
                    <input type="text" placeholder="Search..."
                        class="w-full px-5 py-2.5 border border-pink-200 rounded-xl bg-white focus:outline-none focus:border-pink-400">
                    <iconify-icon icon="mdi:magnify" width="20" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></iconify-icon>
                </div>
            </div>

            <div class="flex items-center justify-between w-full md:w-auto gap-5">
                <iconify-icon icon="mdi:bell-outline" width="24" class="text-gray-500 cursor-pointer hover:text-pink-500"></iconify-icon>
                <div class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-lg border border-pink-50 shadow-sm">
                    <iconify-icon icon="mdi:account-circle-outline" width="24" class="text-pink-400"></iconify-icon>
                    <span class="text-sm text-gray-600 font-medium whitespace-nowrap">admincantik</span>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-3 mb-6 border-b border-pink-100 pb-4">
            <iconify-icon icon="mdi:view-dashboard" class="text-pink-400" width="28"></iconify-icon>
            <h1 class="text-pink-500 text-2xl font-bold m-0 leading-tight">Dashboard Admin</h1>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <div class="bg-white p-5 rounded-2xl border shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Total Orders</p>
                <h3 class="text-2xl font-semibold text-pink-500">{{ $totalOrders }}</h3>
            </div>
            <div class="bg-white p-5 rounded-2xl border shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Today Orders</p>
                <h3 class="text-2xl font-semibold text-pink-500">{{ $todayOrders }}</h3>
            </div>
            <div class="bg-white p-5 rounded-2xl border shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Menu</p>
                <h3 class="text-2xl font-semibold text-pink-500">{{ $totalMenu }}</h3>
            </div>
            <div class="bg-white p-5 rounded-2xl border shadow-sm hover:shadow-md transition">
                <p class="text-sm text-gray-500">Revenue</p>
                <h3 class="text-2xl font-semibold text-pink-500">Rp {{ number_format($revenue, 0, ',', '.') }}</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border shadow-sm min-w-0">
                <h3 class="text-sm font-semibold mb-4 text-gray-700">Revenue (7 Hari Terakhir)</h3>
                <div class="relative w-full" style="height: 250px;">
                    <canvas id="revChart"></canvas>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-2xl border shadow-sm flex flex-col items-center">
                <h3 class="text-sm font-semibold mb-4 w-full text-gray-700">Order Status</h3>
                <div class="w-full max-w-[220px]">
                    <canvas id="distChart"></canvas>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // LOGIKA SIDEBAR RESPONSIVE
    const sidebar = document.getElementById('sidebar');
    const btnSidebar = document.getElementById('btnSidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const overlay = document.getElementById('overlay');

    const toggleSidebar = () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    };

    btnSidebar.addEventListener('click', toggleSidebar);
    closeSidebar.addEventListener('click', toggleSidebar);
    overlay.addEventListener('click', toggleSidebar);

    // ================= REVENUE LINE CHART (SUDAH DI-UPDATE) =================
    const revCtx = document.getElementById('revChart').getContext('2d');
    
    // Tangkap data mentah dari Controller Laravel
    const rawLabels = {!! json_encode($revLabels) !!};
    const rawData = {!! json_encode($revTotals) !!};

    // Sinkronisasi data agar konsisten memunculkan 7 hari terakhir ke belakang
    const daysName = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const dynamicLabels = [];
    const dynamicData = [];

    for (let i = 6; i >= 0; i--) {
        let d = new Date();
        d.setDate(d.getDate() - i);
        let dayLabel = daysName[d.getDay()];
        dynamicLabels.push(dayLabel);

        // Cari indeks kecocokan hari antara database dengan kalender browser
        let dataIndex = rawLabels.indexOf(dayLabel);
        if (dataIndex !== -1) {
            dynamicData.push(rawData[dataIndex]);
        } else {
            dynamicData.push(0); // Isikan 0 jika tidak ada orderan pada hari tersebut
        }
    }

    new Chart(revCtx, {
        type: 'line',
        data: {
            labels: dynamicLabels,
            datasets: [{
                label: 'Revenue',
                data: dynamicData,
                borderColor: '#ec4899',
                backgroundColor: 'rgba(236,72,153,0.15)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { 
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });

    // ORDER STATUS DOUGHNUT CHART
    const distCtx = document.getElementById('distChart').getContext('2d');
    new Chart(distCtx, {
        type: 'doughnut',
        data: {
            labels: ['New', 'Process', 'Completed'],
            datasets: [{
                data: [
                    {{ $statusCounts['new'] }}, 
                    {{ $statusCounts['process'] }}, 
                    {{ $statusCounts['completed'] }}
                ],
                backgroundColor: ['#f9a8d4', '#ec4899', '#4ade80'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>

</body>
</html>