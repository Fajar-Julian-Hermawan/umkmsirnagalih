<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Login | UMKM Desa Sirnagalih</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Times New Roman', Times, serif; }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm border border-gray-200">
        
        <div class="text-center mb-6">
            <img src="LambangKabCianjur.png" alt="Logo Cianjur" class="mx-auto w-20 mb-4">
            <h1 class="text-xl font-bold text-gray-800 uppercase">Login Admin</h1>
            <p class="text-sm text-gray-600">UMKM Desa Sirnagalih</p>
        </div>

        <?php if(isset($error)) : ?>
            <p class="text-red-500 text-center italic mb-4">Username atau Password salah!</p>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">E-mail</label>
                <input type="text" name="e-mail" placeholder="Masukkan e-mail" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Ingatkan Saya</label>
                </div>
                <div>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Lupa Password?</a>
                </div>
            </div>

            <button type="submit" name="login" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 mb-4">
                Masuk
            </button>

            <div class="text-center border-t pt-4">
                <p class="text-sm text-gray-600">Belum punya akun? <a href="daftar" class="text-blue-600 font-bold hover:underline">Daftar</a></p>
            </div>
        </form>
    </div>
</body>
</html>