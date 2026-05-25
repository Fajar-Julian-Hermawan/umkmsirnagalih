<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | UMKM Desa Sirnagalih</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-10">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md border border-gray-200">
        <div class="text-center mb-6">
            <img src="{{ asset('LambangKabCianjur.png') }}" alt="Logo Cianjur" class="mx-auto w-20 mb-4">
            <h1 class="text-xl font-bold text-gray-800 uppercase">Registrasi Admin</h1>
            <p class="text-sm text-gray-600">Daftarkan akun pengelola UMKM Desa Sirnagalih</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@mail.com" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" placeholder="Buat password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" 
                class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 mb-4">
                Daftar Sekarang
            </button>

            <div class="text-center border-t pt-4">
                <p class="text-sm text-gray-600">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk</a></p>
            </div>
        </form>
    </div>

</body>
</html>