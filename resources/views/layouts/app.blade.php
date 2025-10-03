<!DOCTYPE html>
<html lang="en"
    x-data="{ 
          open: JSON.parse(localStorage.getItem('sidebarOpen')) ?? false 
      }"
    x-init="$watch('open', value => localStorage.setItem('sidebarOpen', JSON.stringify(value)))">

<head>
    <meta charset="UTF-8">
    <title>CoolCash</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <div class="flex flex-1">
        <!-- Sidebar -->
        <div
            class="fixed top-0 left-0 w-64 h-screen bg-white shadow-md transform transition-transform duration-300 z-50"
            :class="open ? 'translate-x-0' : '-translate-x-full'">
            @include('layouts.sidebar')
        </div>

        <!-- Main Content -->
        <div class="flex-1 transition-all duration-200" :class="open ? 'ml-64' : 'ml-0'">
            @include('layouts.navbar')

            <main class="p-6 min-h-[calc(100vh-4rem-3rem)]">
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="text-center py-1 bg-gray-200 text-sm">
        2025 ©CoolCash All Rights Reserved
    </footer>

</body>

</html>