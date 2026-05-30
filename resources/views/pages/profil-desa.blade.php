<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Profil Desa | UMKM Desa Sirnagalih</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
        .dropdown-menu { display: none; }
        .show-dropdown { display: block !important; }
        /* Smooth scroll agar perpindahan antar section halus */
        html { scroll-behavior: smooth; }
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
                    <a href="#" class="text-blue-600 font-bold border-b-2 border-blue-600 pb-1">Profil Desa</a>
                    <a href="infografis" class="text-gray-600 hover:text-blue-600 transition font-medium">Infografis</a>
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

    <div class="max-w-7xl mx-auto flex flex-col md:flex-row relative">
        
        <aside class="md:sticky md:top-24 w-full md:w-64 h-fit bg-white shadow-lg p-5 hidden md:block self-start mt-10 rounded-xl">
            <div class="flex flex-col space-y-2">
                <a href="#tentang" class="p-3 rounded-lg hover:bg-green-50 text-gray-700 hover:text-green-600 transition font-semibold">Tentang Desa Sirnagalih</a>
                <a href="#sejarah" class="p-3 rounded-lg hover:bg-green-50 text-gray-700 hover:text-green-600 transition font-semibold">Sejarah Desa Sirnagalih</a>
                <a href="#prestasi" class="p-3 rounded-lg hover:bg-green-50 text-gray-700 hover:text-green-600 transition font-semibold">Prestasi</a>
                <a href="#visi-misi" class="p-3 rounded-lg hover:bg-green-50 text-gray-700 hover:text-green-600 transition font-semibold">Visi dan Misi</a>
                <a href="#bagan-desa" class="p-3 rounded-lg hover:bg-green-50 text-gray-700 hover:text-green-600 transition font-semibold">Bagan Desa Sirnagalih</a>
            </div>
        </aside>

        <main class="flex-1 p-8 pt-10">
            <section id="tentang" class="mb-20 scroll-mt-24">
                <h2 class="text-3xl font-bold text-gray-800 border-b-2 border-green-500 pb-2 mb-6">Tentang Desa Sirnagalih</h2>
                <div class="bg-white p-6 rounded-xl shadow-sm leading-relaxed text-gray-700">
                    <p class="mb-2 text-justify">Desa Sirnagalih merupakan 1 dari 10 desa yang berada di kecamatan Cilaku, Cianjur, Jawa Barat, Indonesia. Secara geografis terletak di 06º 51 105 LS dan terletak di 107º 07 777 BT. Topografi Desa Sirnagalih termasuk dalam kategori Daerah dataran rendah dengan ketinggian ± 450-500 M meter dari permukaan laut (DPL).</p>
                    <p class="mb-2 text-justify">Desa Sirnagalih sendiri terletak di perbatasan sebelah barat Desa Rancagoong, Utara Desa Sukamaju, Timur Desa Cibinonghilir, dan selatan berbatasan Desa Sukasari.</p>
                    <p class="mb-2 text-justify">Desa Sirnagalih terdiri dari 4 dusun, 18 RW, dan 73 RT dengan perangkatnya terdiri dari Seorang Kepala Desa, satu sekertaris Desa, tiga orang kepala Seksi (Kasi), tiga orang Kaur, empat orang Kepala Dusun, dan dibantu oleh 4 orang staff. Data bulan Juli tercatat, Desa Sirnagalih memiliki jumlah penduduk 24.830 orang yang terdiri dari 12.373 laki-laki, dan 12.457 perempuan.</p>
                </div>
            </section>

            <section id="sejarah" class="mb-20 scroll-mt-24">
                <h2 class="text-3xl font-bold text-gray-800 border-b-2 border-green-500 pb-2 mb-6">Sejarah Desa Sirnagalih</h2>
                <div class="bg-white p-6 rounded-xl shadow-sm text-gray-700">
                    <p class="mb-2 text-justify">Tertulis/terdengar cerita, dulu terdapat kampung subur dan hijau yang kemudian dikenal dengan nama Kampung Cibinong Girang. Letaknya bersebelahan dengan kampung Cibinong Hilir dengan hanya dipisahkan oleh batas alam berupa aliran sungai bernama Sungai Cibinong.</p>
                    <p class="mb-2 text-justify">Diceritakan, salah seorang tokoh dari kampung Cibinong Girang memiliki gagasan untuk mengubah Kampung Cibinong Girang menjadi sebuah Desa. Pada suatu malam tokoh tersebut mengumpulkan warga di sebuah masjid bermaksud untuk musyawarah mengubah nama kampung Cibinong Girang tersebut menjadi sebuah Desa. Setelah mendengarkan paparan dan argumentasi dari setiap tokoh masyarakat mengenai gagasan pendirian sebuah Desa, singkat cerita akhirnya semua warga setuju dengan usulan tersebut.</p>
                    <p class="mb-2 text-justify">Setelah disepakati, giliran dicari nama yang tepat untuk Desa baru tersebut. Musyawarah berjalan alot, hingga belum bisa di sepakati di hari yang sama. Waktu berjalan, seluruh tokoh termasuk masyarakat ikut memikirkan nama yang tepat penganti Kampung Cibinong Girang.</p>
                    <p class="mb-2 text-justify">Hari berganti, setelah lama merenung akhirnya salah satu tokoh masyarakat mengusulkan nama SIRNAGALIH sebagai pengganti nama yang sebelumnya. Nama ini terdiri dari empat kata yang masing-masing mengandung arti. SIR artinya Perasaan (Rasa Cinta), NA berarti di dalam, dan GALIH berarti hati /Jiwa. Jika di satukan, SIRNAGALIH bermakna Perasaan Cinta dari dalam Jiwa yang Sangat dalam.</p>
                    <p class="mb-2 text-justify">Nama tersebut merupakan representasi dari keadaan wilayah dan kondisi masyarakat saat itu di mana budaya gotong royong, silih asah, silih asih, silih asuh merupakan identitas dari masyarakat. Selain itu, nama ini juga diharapkan menjadi do’a agar sejauh apapun perkembangan jaman, secanggih apapun teknologi, sehebat apapun pengetahuan kita, diharapkan rasa persatuan dan kesatuan masyarakat Desa Sirnagalih tetap tejaga hingga kapanpun.</p>
                </div>
            </section>

            <section id="prestasi" class="mb-20 scroll-mt-24">
                <h2 class="text-3xl font-bold text-gray-800 border-b-2 border-green-500 pb-2 mb-6">Prestasi</h2>
                <div class="bg-white p-8 rounded-xl shadow-sm leading-relaxed text-gray-700">
                    <p class="mb-2 text-justify">Sejak tahun 2019 dibawah kepemimpinan Kepala Desa <b>H. Sugilar</b>, Desa Sirnagalih terus melakukan inovasi dan akselerasi diberbagai bidang terutama dibidang pembangunan dan pemberdayaan masyarakat. Hal itu menjadikan Desa Sirnagalih berhasil mencapai IDM "MANDIRI" pada tahun 2019 akhir. Pencapaian itu diantaranya:</p>
                    <ol class="list-decimal ml-12">
                        <li>Desa dengan IDM Mandiri pada tahun 2019</li>
                        <li>Salah satu desa dengan pengelolaan asset terbaik tahun 2021</li>
                        <li>Juara 1 Lomba Desa Tingkat Kabupaten tahun 2022</li>
                    </ol>
                    <p class="mb-2 text-justify">Dari prestasi itu, Desa Sirnagalih berhasil mendapat <b><i>reward</i></b> dari pemeirintah, baik Kabupaten, Provinsi, bahkan Nasional (Kemendagri), diantaranya:</p>
                    <ol class="list-decimal ml-12">
                        <li>Mobil Maskara dari Gubernur Jawa Barat, Ridwan Kamil.</li>
                        <li>Reward BKKPD untuk Desa Mandiri 2022</li>
                        <li>Perbantuan SDM dari Provinsi, Patriot Desa tahun 2022</li>
                    </ol>
                </div>
            </section>

            <section id="visi-misi" class="mb-20 scroll-mt-24">
                <h2 class="text-3xl font-bold text-gray-800 border-b-2 border-green-500 pb-2 mb-6">Visi dan Misi</h2>
                <div class="bg-white p-6 rounded-xl shadow-sm text-gray-700">
                    <p class="mb-2">
                        <span class="border-b-2 border-black pb-1"><b>VISI</b></span>
                    </p>
                    <p class="mb-4 ml-9">”MEWUJUDKAN MASYARAKAT DESA MENUJU KEARAH PERUBAHAN YANG TRANSPARAN, MAJU, SEJAHTERA,  BERDAYA SAING DAN BERAKHLAKUL KHARIMAH”</p>
                    <p class="mb-2">
                        <span class="border-b-2 border-black pb-1"><b>MISI</b></span>
                    </p>
                    <ol class="list-decimal ml-12">
                        <li>PENINGKATAN PEMBANGUNAN INFRASTRUKTUR PERDESAAN YANG MENDUKUNG PEREKONOMIAN DESA</li>
                        <li>MENINGKATKAN PRASARANA DI BIDANG KESEHATAN DAN KUALITAS LAYANAN KESEHATAN DASAR MASYARAKAT</li>
                        <li>MENINGKATKAN PRASARANA DI BIDANG PENDIDIKAN DAN KUALITAS PENDIDIKAN</li>
                        <li>MENINGKATKAN PRODUKSI PERTANIAN DENGAN MENGGUNAKAN TEKNOLOGI TEPAT GUNA</li>
                        <li>MENCIPTAKAN TATA KELOLA PEMERINTAHAN YANG BAIK (GOOD GOVERNANCE) DAN SISTEM PELAYANAN YANG BERKUALITAS</li>
                        <li>PELESTARIAN LINGKUNGAN HIDUP DALAM PENGELOLAAN SUMBERDAYA ALAM DAN PERLINDUNGAN MATA AIR</li>
                        <li>PENINGKATAN KAPASITAS, KETERAMPILAN MASYARAKAT YANG BERORIENTASI PADA KEBUTUHAN PASAR, TENAGA KERJA, INDUSTRI KREATIF DAN AGRIBISNIS</li>
                        <li>PENINGKATAN PENDIDIKAN AGAMA DAN SARANA/PRASARANA IBADAH</li>
                    </ol>
                </div>
            </section>

            <section id="bagan-desa" class="mb-20 scroll-mt-24">
                <h2 class="text-3xl font-bold text-gray-800 border-b-2 border-green-500 pb-2 mb-6">Bagan Desa Sirnagalih</h2>
                <div class="bg-white p-6 rounded-xl shadow-sm text-gray-700">
                    <p class="mb-2">
                        <span><b>STRUKTUR ORGANISASI PEMERINTAHAN DESA</b></span>
                        <div>
                            <img src="{{ asset('BaganDesaSirnagalih.png') }}">
                        </div>
                    </p>
                </div>
            </section>
        </main>
    </div>

    <footer id="footer" class="bg-gray-900 text-white py-12 mt-10">
        <div class="max-w-7xl mx-auto px-4">
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
            <div class="mt-10 pt-6 border-t border-gray-800 text-center">
                <p class="text-gray-500 text-sm">&copy; Copyright 2026 <strong><span>Kampung Pinter</span></strong>. All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <script>
        // Akun Dropdown Logic
        const btnAkun = document.getElementById('btnAkun');
        const dropdownMenu = document.getElementById('dropdownMenu');
        btnAkun.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownMenu.classList.toggle('show-dropdown');
        });
        window.addEventListener('click', () => {
            dropdownMenu.classList.remove('show-dropdown');
        });
    </script>
</body>
</html>