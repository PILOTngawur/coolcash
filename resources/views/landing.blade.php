<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoolCash - Kelola Keuanganmu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed w-full top-0 z-10">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-600">CoolCash</h1>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="px-4 py-2 text-gray-700 hover:text-blue-600">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="flex-1 flex items-center justify-center text-center px-6 pt-32 pb-16">
        <div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                Kelola Keuanganmu Dengan Mudah 💰
            </h2>
            <p class="text-gray-600 max-w-xl mx-auto mb-8">
                CoolCash membantu kamu mencatat pemasukan & pengeluaran dengan lebih praktis.
                Pantau saldo kapanpun dan dimanapun dengan dashboard yang interaktif.
            </p>
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                    Mulai Sekarang
                </a>
                <a href="#fitur" class="px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50">
                    Lihat Fitur
                </a>
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section id="fitur" class="bg-white py-16 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h3 class="text-2xl font-semibold text-gray-800 mb-12">Fitur Utama CoolCash</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 border rounded-lg hover:shadow-lg transition">
                    <h4 class="text-lg font-bold mb-2">📊 Dashboard Ringkas</h4>
                    <p class="text-gray-600">Lihat pemasukan, pengeluaran, dan saldo dalam satu tampilan.</p>
                </div>
                <div class="p-6 border rounded-lg hover:shadow-lg transition">
                    <h4 class="text-lg font-bold mb-2">💵 Catatan Transaksi</h4>
                    <p class="text-gray-600">Tambah, edit, dan hapus transaksi sesuai kebutuhanmu.</p>
                </div>
                <div class="p-6 border rounded-lg hover:shadow-lg transition">
                    <h4 class="text-lg font-bold mb-2">📑 Laporan Bulanan</h4>
                    <p class="text-gray-600">Dapatkan ringkasan laporan bulanan untuk evaluasi keuanganmu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-2 text-center mt-auto">
        <p>&copy; {{ date('Y') }} CoolCash. Semua hak dilindungi.</p>
    </footer>

</body>
</html>
