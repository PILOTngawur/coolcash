<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoolCash - Kelola Keuanganmu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth; /* biar scroll smooth ke section */
        }
    </style>
</head>
<body class="bg-white flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white fixed w-full top-0 z-50 border-b shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            
            <!-- Logo -->
            <div class="flex items-center">
                <a href="#">
                    <img src="{{ asset('img/logo-coolcash-2.png') }}" 
                         alt="CoolCash Logo"
                         class="h-16 w-auto object-contain">
                </a>
            </div>

            <!-- Menu -->
            <div class="flex items-center space-x-6">
                <a href="#tentang" class="text-gray-700 hover:text-green-600 font-medium">
                    TENTANG
                </a>
                <a href="{{ route('login') }}" 
                   class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                   Gunakan
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="flex-1 flex items-center justify-center px-6 pt-32 pb-20 bg-gradient-to-r from-cyan-400 to-blue-500">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-10">
            
            <!-- Teks Kiri -->
            <div class="text-left md:pr-12">
                <h2 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">
                    Lihat uangmu <br> bekerja untukmu.
                </h2>
                <p class="text-white/90 max-w-md mb-8">
                    CoolCash bikin uangmu lebih nurut: pengeluaran aman, pemasukan ketahuan, keuntungan bisnis jelas kelihatan.
                </p>
                <a href="{{ route('login') }}" 
                   class="inline-block px-6 py-3 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition">
                   Mulai Sekarang
                </a>
            </div>

            <!-- Gambar Kanan -->
            <div class="flex justify-center">
                <img src="{{ asset('img/material-coolcash1.png') }}" 
                     alt="CoolCash Mockup"
                     class="w-64 md:w-80 lg:w-[380px] object-contain">
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-20 bg-white -mt-12 relative z-0 rounded-t-3xl shadow-lg">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center px-6">
            
            <!-- Gambar -->
            <div class="flex justify-start">
                <img src="{{ asset('img/material-coolcash3.png') }}" 
                     alt="Tentang CoolCash"
                     class="w-72 md:w-96 object-contain">
            </div>

            <!-- Konten Teks -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Tentang</h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    CoolCash adalah platform digital untuk mengelola keuangan secara mudah, praktis, dan transparan. 
                    Dengan tampilan yang sederhana namun modern, CoolCash membantu siapa saja mulai dari individu, 
                    organisasi, hingga wirausaha untuk memahami aliran uang mereka.
                </p>
                
                <div class="space-y-3">
                    <h3 class="font-semibold text-gray-800">Kontak Kami:</h3>
                    <p class="flex items-center space-x-3">
                        <span class="material-icons text-green-500">mail</span>
                        <a href="mailto:coolcashmg@gmail.com" class="text-gray-600 hover:text-green-600">
                            coolcashmg@gmail.com
                        </a>
                    </p>
                    <p class="flex items-center space-x-3">
                        <span class="material-icons text-green-500">call</span>
                        <a href="tel:+6289765434321" class="text-gray-600 hover:text-green-600">
                            +62 897-6543-4321
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-2 text-center mt-auto">
        <p>&copy; {{ date('Y') }} CoolCash. Semua hak dilindungi.</p>
    </footer>

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>
</html>
