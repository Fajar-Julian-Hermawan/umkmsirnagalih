<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | UMKM Desa Sirnagalih</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm border border-gray-200">
        
        <div class="text-center mb-6">
            <img src="{{ asset('LambangKabCianjur.png') }}" alt="Logo Cianjur" class="mx-auto w-20 mb-4">
            <h1 class="text-xl font-bold text-gray-800 uppercase">Login Admin</h1>
            <p class="text-sm text-gray-600">UMKM Desa Sirnagalih</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm text-center italic">
                E-mail atau Password salah!
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required autofocus
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember_me" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">Ingatkan Saya</label>
                </div>
                <div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Lupa Password?</a>
                    @endif
                </div>
            </div>

            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 mb-4">
                Masuk
            </button>

            <div class="text-center border-t pt-4">
                <p class="text-sm text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-green-600 hover:underline">Daftar</a></p>
            </div>
        </form>
    </div>

</body>
</html>