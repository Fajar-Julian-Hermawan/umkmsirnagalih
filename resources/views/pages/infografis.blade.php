<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infografis | UMKM Desa Sirnagalih</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
        /* Hilangkan efek hover lama agar tidak bentrok dengan klik */
        .dropdown-menu { display: none; }
        .show-dropdown { display: block ! final; }
    </style>
</head>
<body class="bg-gray-50">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 shadow-sm">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-4">
                    <img src="LambangKabCianjur.png" alt="Logo" class="w-12">
                    <div>
                        <span class="font-bold text-lg block text-gray-800">DESA SIRNAGALIH</span>
                        <span class="text-xs text-gray-500 uppercase tracking-widest">Pendataan UMKM Online</span>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition font-medium">Beranda</a>
                    <a href="profil-desa" class="text-gray-600 hover:text-blue-600 transition font-medium">Profil Desa</a>
                    <a href="infografis" class="text-blue-600 font-bold border-b-2 border-blue-600 pb-1">Infografis</a>
                    <a href="listing" class="text-gray-600 hover:text-blue-600 transition font-medium">Listing</a>
                    <a href="berita" class="text-gray-600 hover:text-blue-600 transition font-medium">Berita</a>
                    <a href="data-umkm" class="text-gray-600 hover:text-blue-600 transition font-medium">Data UMKM</a>

                    <div class="hidden md:flex items-center space-x-4">

                        @guest
                            <a href="{{ route('login', ['redirect_to' => url()->current()]) }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-lg font-bold hover:bg-blue-700 transition duration-300 shadow-sm text-sm">
                                Login Admin
                            </a>
                        @endguest

                        @auth
                            <div class="relative">
                                <button id="btnAkun" class="flex items-center space-x-2 bg-gray-100 px-4 py-2 rounded-full hover:bg-gray-200 transition">
                                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="font-semibold text-gray-700">Akun Anda</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <div id="dropdownMenu" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-100 py-2 z-50">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                                        Pengaturan Profil
                                    </a>
                                    <div class="border-t border-gray-100 my-1">
                                        <form method="POST" action="{{ route('logout', ['redirect_to' => url()->current()]) }}">
                                            @csrf
                                            <button type="submit" class="block px-4 py-2 text-sm text-red-600 font-bold hover:bg-red-50">
                                                Keluar (Logout)
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-12 max-w-7xl">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-800 uppercase tracking-wider">Infografis Desa Sirnagalih</h1>
            <div class="h-1 w-24 bg-blue-600 mx-auto mt-3 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 col-span-1 lg:col-span-2">
                <h3 class="text-2xl font-bold text-gray-800 text-center mb-1 tracking-wide">Statistik Umur</h3>
                <div class="relative w-full h-[450px]">
                    <canvas id="umurChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-1 tracking-wide">Statistik Agama</h3>
                <div class="relative w-full h-96 flex justify-center">
                    <canvas id="agamaChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-1 tracking-wide">Pendidikan Penduduk</h3>
                <div class="relative w-full h-96">
                    <canvas id="pendidikanChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-1 tracking-wide">Kritea Penduduk</h3>
                <p class="text-sm text-gray-400 mb-10">Mampu dan Tidak Mampu</p>
                <div class="relative w-full h-96">
                    <canvas id="kriteaChart"></canvas>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Set Warna Standar dan Font untuk Semua Chart
        Chart.defaults.font.family = "'Times New Roman', Times, serif";
        Chart.defaults.font.size = 13;
        Chart.defaults.color = "#6b7280"; // text-gray-500
        Chart.defaults.plugins.tooltip.backgroundColor = 'rgba(17, 24, 39, 0.9)'; // gray-900
        Chart.defaults.plugins.tooltip.titleColor = '#fff';
        Chart.defaults.plugins.tooltip.bodyColor = '#f3f4f6'; // gray-100
        Chart.defaults.plugins.tooltip.cornerRadius = 6;

        // --- 1. Skrip untuk Statistik Umur (Line Chart) ---
        const ctxUmur = document.getElementById('umurChart').getContext('2d');
        const gradientUmur = ctxUmur.createLinearGradient(0, 0, 0, 450);
        gradientUmur.addColorStop(0, 'rgba(37, 99, 235, 0.1)'); // blue-600 light
        gradientUmur.addColorStop(1, 'rgba(255, 255, 255, 0)'); // white full

        new Chart(ctxUmur, {
            type: 'line',
            data: {
                labels: ['0 s/d 10 Thn', '10 s/d 20 Thn', '20 s/d 30 Thn', '30 s/d 40 Thn', '40 s/d 50 Thn', '50 s/d 65 Thn', '65+ Thn', 'Belum Terdata'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [781, 2148, 2444, 2071, 2092, 2243, 744, 6], // Data angka dari gambar Anda
                    fill: true,
                    backgroundColor: gradientUmur,
                    borderColor: '#079aa2', // blue-600
                    borderWidth: 3,
                    pointBackgroundColor: '#079aa2',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                    tension: 0.2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f3f4f6', // gray-100
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        // --- 2. Skrip untuk Statistik Agama (Doughnut Chart) ---
        new Chart(document.getElementById('agamaChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Islam', 'Kristen', 'Katholik', 'Buddha', 'Lainnya'],
                datasets: [{
                    data: [12388, 70, 62, 7, 2], // Data persentase dari gambar Anda
                    backgroundColor: [
                        '#079aa2',
                        '#26a7ae',
                        '#45b3b9',
                        '#45b3b9',
                        '#83cdd1',
                    ],
                    borderColor: '#fff',
                    borderWidth: 4,
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 25,
                            usePointStyle: true,
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });

        // --- 3. Skrip untuk Pendidikan Penduduk (Horizontal Bar Chart) ---
        new Chart(document.getElementById('pendidikanChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: ['Tamat SD/Sederajat', 'SLTA/SMA/Sederajat', 'SLTP/SMP/Sederajat', 'Tidak/Belum Sekolah', 'Belum Tamat SD/Sederajat', 'Diploma IV/Strata I/II', 'Akademi/D3/Sarjana Muda', 'Diploma I/II', 'Lainnya', 'Strata III'],
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: [3220, 3140, 2176, 1825, 1366, 593, 152, 43, 8, 3], // Data angka dari gambar Anda
                    backgroundColor: 'rgba(122, 214, 255, 0.8)', // blue-600
                    borderColor: '#7ad6ff', // blue-600
                    borderWidth: 1,
                    borderRadius: 6,
                    barThickness: 25
                }]
            },
            options: {
                indexAxis: 'y', // Membuat bar menjadi horizontal
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            color: '#f3f4f6', // gray-100
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        new Chart(document.getElementById('kriteaChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: ['Tidak Mampu', 'Mampu'],
                datasets: [{
                    data: [11361, 1168], // Data persentase dari gambar Anda
                    backgroundColor: [
                        '#56cc58',
                        '#a6edc5',
                    ],
                    borderColor: '#fff',
                    borderWidth: 4,
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 25,
                            usePointStyle: true,
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>

    <footer id="footer" class="bg-gray-900 text-white py-12">
        <div class="footer-top">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                    <div class="footer-info">
                        <h3 class="text-2xl font-bold mb-4 text-yellow-500">DESA SIRNAGALIH</h3>
                        <p class="text-gray-300">
                            JL KH Muhammad Sudjai Kp Sirnagalih Desa Sirnagalih <br>
                            Kec. Cilaku Kab Cianjur Kode Pos 43285 <br><br>
                            <strong>Phone:</strong> 087717438283<br>
                            <strong>Email:</strong> sirnagalih.cilaku@gmail.com<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 mt-10 pt-6 border-t border-gray-800 text-center">
            <div class="copyright text-gray-500 text-sm">
            &copy; Copyright 2026 <strong><span>Kampung Pinter</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>

    <script>
        const btnAkun = document.getElementById('btnAkun');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Fungsi klik tombol
        btnAkun.addEventListener('click', function(e) {
            e.stopPropagation(); // Mencegah event bubbling
            dropdownMenu.classList.toggle('show-dropdown');
        });

        // Klik di mana saja di luar dropdown untuk menutup menu
        window.addEventListener('click', function() {
            if (dropdownMenu.classList.contains('show-dropdown')) {
                dropdownMenu.classList.remove('show-dropdown');
            }
        });

        // CSS tambahan untuk menampilkan menu (disisipkan via JS)
        const style = document.createElement('style');
        style.innerHTML = '.show-dropdown { display: block !important; }';
        document.head.appendChild(style);
    </script>

</body>
</html>