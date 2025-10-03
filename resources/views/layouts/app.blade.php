<!DOCTYPE html>
<html lang="en" x-data>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CoolCash</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Alpine Store buat sidebar -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('sidebar', {
                open: JSON.parse(localStorage.getItem('sidebarOpen')) ?? false
            })

            Alpine.effect(() => {
                localStorage.setItem('sidebarOpen', JSON.stringify(Alpine.store('sidebar').open))
            })
        })
    </script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <div class="flex flex-1">
        <!-- Sidebar -->
        <div
            class="fixed top-0 left-0 w-64 h-screen bg-white shadow-md transform transition-transform duration-300 ease-in-out z-50"
            :class="$store.sidebar.open ? 'translate-x-0' : '-translate-x-full'">
            @include('layouts.sidebar')
        </div>

        <!-- Main Content -->
        <div class="flex-1 transition-all duration-200 ease-in-out" 
             :class="$store.sidebar.open ? 'ml-64' : 'ml-0'">
            @include('layouts.navbar')

            <main class="p-6 min-h-screen">
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="text-center py-1 bg-gray-200 text-sm">
        2025 ©CoolCash All Rights Reserved
    </footer>

</body>
</html>
