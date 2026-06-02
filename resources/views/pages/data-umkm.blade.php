<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Data UMKM | UMKM Desa Sirnagalih</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
        /* Hilangkan efek hover lama agar tidak bentrok dengan klik */
        .dropdown-menu { display: none; }
        .show-dropdown { display: block !important; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

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
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition font-medium">Beranda</a>
                    <a href="profil-desa" class="text-gray-600 hover:text-blue-600 transition font-medium">Profil Desa</a>
                    <a href="infografis" class="text-gray-600 hover:text-blue-600 transition font-medium">Infografis</a>
                    <a href="listing" class="text-gray-600 hover:text-blue-600 transition font-medium">Listing</a>
                    <a href="#" class="text-blue-600 font-bold border-b-2 border-blue-600 pb-1">Data UMKM</a>

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
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Daftar Data UMKM Desa Sirnagalih</h2>
                    <p class="text-sm text-gray-400 mt-1">Halaman pengelolaan informasi laba usaha dan pemetaan komoditas desa</p>
                </div>
                
                @auth
                    <button onclick="openModal('tambah')" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-5 rounded-lg text-sm transition duration-300 shadow-sm">
                        + Tambah Data UMKM
                    </button>
                @endauth
            </div>

            <div class="overflow-x-auto rounded-xl border border-gray-100">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-50 text-gray-700 uppercase text-xs font-bold tracking-wider border-b border-gray-100">
                            <th class="py-4 px-6 text-left">No</th>
                            <th class="py-4 px-6 text-left">Nama Usaha</th>
                            <th class="py-4 px-6 text-left">Jenis Usaha</th>
                            <th class="py-4 px-6 text-left">Alamat</th>
                            <th class="py-4 px-6 text-center">Penghasilan / Bulan (%)</th>
                            @auth <th class="py-4 px-6 text-center">Aksi</th> @endauth
                        </tr>
                    </thead>
                    <tbody id="tabelBodyUMKM" class="text-gray-600 text-sm font-light divide-y divide-gray-100">
                        </tbody>
                </table>
            </div>
        </div>
    </main>

    <div id="formModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-xl max-w-md w-full border border-gray-100 overflow-hidden">
            <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                <h3 id="modalTitle" class="text-lg font-bold text-gray-800">Tambah Data UMKM</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <form id="umkmForm" onsubmit="handleFormSubmit(event)" class="p-6 space-y-4">
                <input type="hidden" id="editIndex">
                <div>
                    <label class="block text-gray-700 text-xs font-bold uppercase tracking-wider mb-2">Nama Usaha</label>
                    <input type="text" id="inputNama" required class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm">
                </div>
                <div>
                    <label class="block text-gray-700 text-xs font-bold uppercase tracking-wider mb-2">Jenis Usaha</label>
                    <input type="text" id="inputJenis" required class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm" placeholder="Contoh: Kuliner, Kerajinan">
                </div>
                <div>
                    <label class="block text-gray-700 text-xs font-bold uppercase tracking-wider mb-2">Alamat Lengkap</label>
                    <textarea id="inputAlamat" required rows="2" class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm"></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-xs font-bold uppercase tracking-wider mb-2">Penghasilan (Rp)</label>
                        <input type="number" id="inputPenghasilan" required class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm" placeholder="Angka saja">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-xs font-bold uppercase tracking-wider mb-2">Persentase (%)</label>
                        <input type="number" id="inputPersen" required class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-500 text-sm" placeholder="Contoh: 12">
                    </div>
                </div>
                <div class="pt-4 flex justify-end space-x-2 border-t border-gray-100">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition">Batal</button>
                    <button type="submit" id="btnSubmitModal" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold transition">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <div id="konfirmasiModal" class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-[60] hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl max-w-sm w-full p-6 text-center border border-gray-100">
            <div class="w-12 h-12 bg-yellow-50 rounded-full flex items-center justify-center mx-auto mb-4 text-yellow-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <p id="konfirmasiText" class="text-gray-700 font-medium mb-6 text-base">Apakah anda yakin dengan keputusan ini?</p>
            <div class="flex justify-center space-x-3">
                <button onclick="closeKonfirmasi(false)" class="px-5 py-2 border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition w-24">Tidak</button>
                <button onclick="closeKonfirmasi(true)" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold transition w-24 shadow-sm">Ya</button>
            </div>
        </div>
    </div>

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
        // Dropdown Menu Akun
        const btnAkun = document.getElementById('btnAkun');
        const dropdownMenu = document.getElementById('dropdownMenu');
        if(btnAkun) {
            btnAkun.addEventListener('click', (e) => { e.stopPropagation(); dropdownMenu.classList.toggle('show-dropdown'); });
            window.addEventListener('click', () => { dropdownMenu.classList.remove('show-dropdown'); });
        }

        // --- SISTEM SIMULASI DATA UMKM (LocalStorage) ---
        const defaultData = [
            { nama: 'Kripik Singkong Barokah', jenis: 'Kuliner / Makanan Ringan', alamat: 'Kp. Sirnagalih RT 02/RW 01', penghasilan: 123456789, persen: 12 }
        ];

        if (!localStorage.getItem('umkm_list')) {
            localStorage.setItem('umkm_list', JSON.stringify(defaultData));
        }

        let umkmList = JSON.parse(localStorage.getItem('umkm_list'));
        let currentAction = ''; 
        let targetIndex = null;

        function formatRupiah(angka) {
            return 'Rp' + parseInt(angka).toLocaleString('id-ID');
        }

        function renderTable() {
            const tbody = document.getElementById('tabelBodyUMKM');
            tbody.innerHTML = '';

            if (umkmList.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6" class="py-8 text-center text-gray-400 italic">Tidak ada data UMKM tersedia. Klik tambah data untuk mengisi.</td></tr>`;
                return;
            }

            umkmList.forEach((item, index) => {
                const tr = document.createElement('tr');
                tr.className = "hover:bg-gray-50/70 transition";
                
                tr.innerHTML = `
                    <td class="py-4 px-6 text-left font-medium text-gray-900">${index + 1}</td>
                    <td class="py-4 px-6 text-left font-medium text-gray-800">${item.nama}</td>
                    <td class="py-4 px-6 text-left">${item.jenis}</td>
                    <td class="py-4 px-6 text-left">${item.alamat}</td>
                    <td class="py-4 px-6 text-center">
                        <span class="font-bold text-gray-800">${formatRupiah(item.penghasilan)}</span>
                        <span class="text-green-600 font-bold ml-1">(${item.persen}%)</span>
                    </td>
                    @auth
                    <td class="py-4 px-6 text-center">
                        <div class="flex items-center justify-center space-x-2">
                            <button onclick="openModal('edit', ${index})" class="bg-blue-500 hover:bg-blue-600 text-white py-1.5 px-3 rounded text-xs font-bold transition">
                                Edit
                            </button>
                            <button onclick="triggerHapus(${index})" class="bg-red-500 hover:bg-red-600 text-white py-1.5 px-3 rounded text-xs font-bold transition">
                                Hapus
                            </button>
                        </div>
                    </td>
                    @endauth
                `;
                tbody.appendChild(tr);
            });
        }

        function openModal(type, index = null) {
            currentAction = type;
            const modal = document.getElementById('formModal');
            const title = document.getElementById('modalTitle');
            const submitBtn = document.getElementById('btnSubmitModal');
            
            modal.classList.remove('hidden');
            
            if (type === 'tambah') {
                title.innerText = "Tambah Data UMKM Baru";
                submitBtn.innerText = "Tambah";
                submitBtn.className = "px-5 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm font-bold transition";
                document.getElementById('umkmForm').reset();
                targetIndex = null;
            } else if (type === 'edit') {
                title.innerText = "Edit Data UMKM";
                submitBtn.innerText = "Simpan";
                submitBtn.className = "px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-bold transition";
                
                targetIndex = index;
                const data = umkmList[index];
                document.getElementById('inputNama').value = data.nama;
                document.getElementById('inputJenis').value = data.jenis;
                document.getElementById('inputAlamat').value = data.alamat;
                document.getElementById('inputPenghasilan').value = data.penghasilan;
                document.getElementById('inputPersen').value = data.persen;
            }
        }

        function closeModal() {
            document.getElementById('formModal').classList.add('hidden');
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            closeModal();
            triggerKonfirmasi(currentAction);
        }

        function triggerKonfirmasi(type) {
            currentAction = type;
            const text = document.getElementById('konfirmasiText');
            
            if (type === 'tambah') {
                text.innerText = "Apa anda yakin ingin menambah Data UMKM terbaru?";
            } else if (type === 'edit') {
                text.innerText = "Apa anda yakin mengedit Data UMKM yang akan diupdate?";
            } else if (type === 'hapus') {
                text.innerText = "Apa anda yakin untuk menghapus Data UMKM yang tidak diperlukan?";
            }
            
            document.getElementById('konfirmasiModal').classList.remove('hidden');
        }

        function triggerHapus(index) {
            targetIndex = index;
            triggerKonfirmasi('hapus');
        }

        function closeKonfirmasi(isYes) {
            document.getElementById('konfirmasiModal').classList.add('hidden');
            
            if (isYes) {
                if (currentAction === 'tambah') {
                    const baru = {
                        nama: document.getElementById('inputNama').value,
                        jenis: document.getElementById('inputJenis').value,
                        alamat: document.getElementById('inputAlamat').value,
                        penghasilan: document.getElementById('inputPenghasilan').value,
                        persen: document.getElementById('inputPersen').value
                    };
                    umkmList.push(baru);
                } 
                else if (currentAction === 'edit' && targetIndex !== null) {
                    umkmList[targetIndex] = {
                        nama: document.getElementById('inputNama').value,
                        jenis: document.getElementById('inputJenis').value,
                        alamat: document.getElementById('inputAlamat').value,
                        penghasilan: document.getElementById('inputPenghasilan').value,
                        persen: document.getElementById('inputPersen').value
                    };
                } 
                else if (currentAction === 'hapus' && targetIndex !== null) {
                    umkmList.splice(targetIndex, 1);
                }

                localStorage.setItem('umkm_list', JSON.stringify(umkmList));
                renderTable();
            }
        }

        window.onload = renderTable;
    </script>
</body>
</html>