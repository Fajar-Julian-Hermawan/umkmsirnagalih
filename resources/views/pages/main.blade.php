<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama | UMKM Desa Sirnagalih</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <img src="{{ asset('LambangKabCianjur.png') }}" alt="Logo" class="w-12">
                    <div>
                        <span class="font-bold text-lg block text-gray-800">DESA SIRNAGALIH</span>
                        <span class="text-xs text-gray-500 uppercase tracking-widest">Pendataan UMKM Online</span>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="main" class="text-blue-600 font-bold border-b-2 border-blue-600 pb-1">Beranda</a>
                    <a href="profil-desa" class="text-gray-600 hover:text-blue-600 transition font-medium">Profil Desa</a>
                    <a href="infografis" class="text-gray-600 hover:text-blue-600 transition font-medium">Infografis</a>
                    <a href="listing" class="text-gray-600 hover:text-blue-600 transition font-medium">Listing</a>
                    <a href="berita" class="text-gray-600 hover:text-blue-600 transition font-medium">Berita</a>
                    <a href="data-umkm" class="text-gray-600 hover:text-blue-600 transition font-medium">Data UMKM</a>

                    <div class="relative inline-block text-left">
                        <?php if (isset($_SESSION['login'])): ?>
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
                                <div id="dropdownMenu" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50 border border-gray-100">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition-colors">
                                        Pengaturan Profil
                                    </a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                            Keluar (Logout)
                                        </a>
                                    </form>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="login" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-bold transition text-sm shadow-sm flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Login Admin</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="relative h-[500px] flex items-center justify-center text-white">
        <img src="{{ asset('BackgroundDesa.jpg') }}" alt="Background Desa" class="absolute inset-0 w-full h-full object-cover brightness-50">
        <div class="relative text-center px-4">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">Selamat Datang di Portal UMKM</h2>
            <p class="text-lg md:text-xl max-w-2xl mx-auto opacity-90">
                Mendorong kemajuan ekonomi lokal melalui pendataan dan publikasi produk unggulan Desa Sirnagalih.
            </p>
        </div>
    </header>

<main class="container mx-auto px-4 py-12 max-w-6xl flex-grow">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 uppercase tracking-wider">Jelajahi Desa Sirnagalih</h2>
            <p class="text-gray-500 text-sm mt-2">Pusat layanan informasi publik, infografis statistik, dan direktori digital UMKM lokal</p>
            <div class="h-1 w-24 bg-blue-600 mx-auto mt-3 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <a href="profil-desa" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 tracking-wide group-hover:text-blue-600 transition-colors">Profil Desa</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Pelajari sejarah asal-usul, visi misi utama, struktur aparatur organisasi pemerintahan, dan identitas resmi geografi Desa Sirnagalih.</p>
                </div>
                <div class="text-blue-600 text-xs font-bold mt-6 inline-flex items-center group-hover:translate-x-2 transition-transform">
                    <span>Buka Halaman</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

            <a href="infografis" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-green-50 text-green-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 tracking-wide group-hover:text-green-600 transition-colors">Infografis</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Penyajian data statistik kependudukan, tingkat mata pencaharian, klasifikasi tingkat pendidikan, dan diagram perkembangan anggaran belanja desa.</p>
                </div>
                <div class="text-green-600 text-xs font-bold mt-6 inline-flex items-center group-hover:translate-x-2 transition-transform">
                    <span>Lihat Statistik</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

            <a href="listing" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-yellow-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 tracking-wide group-hover:text-yellow-600 transition-colors">Listing Peta Desa</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Peta wilayah spasial kartografi untuk mengetahui batas-batas daerah RT/RW serta pemetaan zonasi wilayah di lingkungan Desa Sirnagalih.</p>
                </div>
                <div class="text-yellow-600 text-xs font-bold mt-6 inline-flex items-center group-hover:translate-x-2 transition-transform">
                    <span>Eksplorasi Peta</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

            <a href="berita" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 bg-red-50 text-red-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-red-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h10M7 16h5"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 tracking-wide group-hover:text-red-600 transition-colors">Berita Desa</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Kumpulan informasi aktual, agenda kegiatan sosial kemasyarakatan, rilis berita resmi, serta pengumuman penting bagi warga desa.</p>
                </div>
                <div class="text-red-600 text-xs font-bold mt-6 inline-flex items-center group-hover:translate-x-2 transition-transform">
                    <span>Baca Berita</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

            <a href="data-umkm" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 transform hover:-translate-y-1 flex flex-col justify-between sm:col-span-2 lg:col-span-1">
                <div>
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center mb-5 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2 tracking-wide group-hover:text-purple-600 transition-colors">Data UMKM</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">Eksplorasi direktori komoditas produk usaha lokal warga, rincian omzet, analisis persentase pertumbuhan ekonomi, dan grafik rekapitulasi data UMKM.</p>
                </div>
                <div class="text-purple-600 text-xs font-bold mt-6 inline-flex items-center group-hover:translate-x-2 transition-transform">
                    <span>Lihat Direktori</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </div>
            </a>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 mt-8 mb-12 flex flex-col md:flex-row items-center gap-6 md:gap-8 transform transition duration-300 hover:shadow-md">
            <div class="flex-shrink-0 bg-gray-50 p-4 rounded-xl border border-gray-100 flex items-center justify-center w-32 h-32 md:w-40 md:h-40">
                <img src="{{ asset('LambangKabCianjur.png') }}" alt="Lambang Kabupaten Cianjur" class="w-24 md:w-28 h-auto object-contain">
            </div>
            
            <div class="flex-grow text-center md:text-left">
                <h3 class="text-2xl font-bold text-gray-800 mt-2 mb-3">SAMBUTAN KEPALA DESA</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-4">
                    Assalamu'alaikum Wr. Wb.<br>
                    Puji syukur kami panjatkan kehadirat ALLAH SWT atas limpahan rahmat dan karunia-Nya.<br>
                    Kehadiran Website Desa Sirnagalih diharapkan dapat memudahkan penyampaian informasi secara terbuka kepada Masyarakat Desa Sirnagalih serta instansi lain yang terkait.
                </p>
                <div class="border-t border-gray-100 pt-3">
                    <p class="text-sm font-bold text-gray-800">H. SUGILAR, S.Pd.I</p>
                    <p class="text-xs text-gray-400">Kepala Desa Sirnagalih, Kec. Cilaku, Kab. Cianjur</p>
                </div>
            </div>
        </div>

        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 uppercase tracking-wider">Peta Desa Sirnagalih</h2>
            <div class="h-1 w-24 bg-blue-600 mx-auto mt-3 rounded-full"></div>
        </div>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 mt-8 mb-12 transform transition duration-300 hover:shadow-md">
    
    <div class="flex items-center space-x-3 mb-6">
        <div class="w-10 h-10 bg-yellow-50 text-yellow-600 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
            </svg>
        </div>
        <div>
            <h3 class="text-xl font-bold text-gray-800">Pemetaan Wilayah Geografis</h3>
            <p class="text-xs text-gray-400">Peta Infrastruktur Spasial Resmi Desa Sirnagalih, Kec. Cilaku, Kabupaten Cianjur</p>
        </div>
    </div>

    <div class="w-full h-[350px] md:h-[450px] rounded-xl overflow-hidden border border-gray-100 shadow-inner relative bg-gray-50">
        <iframe 
    		src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15843.518179262237!2d107.1147573456728!3d-6.832961806307135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6852579dfd9735%3A0x6b97645f061e809c!2sSirnagalih%2C%20Kec.%20Cilaku%2C%20Kabupaten%20Cianjur%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1716490000000!5m2!1sid!2sid" 
    		class="absolute inset-0 w-full h-full border-0"
    		allowfullscreen="" 
    		loading="lazy" 
    		referrerpolicy="no-referrer-when-downgrade">
	</iframe>
    </div>

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mt-4 pt-3 border-t border-gray-50 text-xs text-gray-500">
        <div class="flex items-center space-x-2">
            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
            <span>Data Peta Terintegrasi Live dengan Satelit Google Maps</span>
        </div>
        <a href="https://maps.app.goo.gl/9ZpC7Q56M9uN4R3w7" target="_blank" class="text-blue-600 font-semibold hover:underline flex items-center space-x-1">
            <span>Buka di Aplikasi Google Maps</span>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
        </a>
    </div>

</div>

    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 uppercase tracking-wider">Galeri Desa Sirnagalih</h2>
            <p class="text-gray-500 text-sm mt-2">Menampilkan kegiatan-kegiatan yang berlangsung di Desa</p>
        <div class="h-1 w-24 bg-blue-600 mx-auto mt-3 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        
        <div class="overflow-hidden rounded-lg shadow-sm">
            <img src="{{ asset('PemDesSirnagalih_1.jpg') }}" alt="Galeri 1" class="w-full h-64 object-cover hover:scale-105 transition-transform duration-500">
        </div>

        <div class="overflow-hidden rounded-lg shadow-sm">
            <img src="{{ asset('PemDesSirnagalih_2.jpg') }}" alt="Galeri 2" class="w-full h-64 object-cover hover:scale-105 transition-transform duration-500">
        </div>

        <div class="overflow-hidden rounded-lg shadow-sm">
            <img src="{{ asset('PemDesSirnagalih_3.jpg') }}" alt="Galeri 3" class="w-full h-64 object-cover hover:scale-105 transition-transform duration-500">
        </div>

    </div>
</div>

    </main>

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