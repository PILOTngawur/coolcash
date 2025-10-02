<div x-data="{ open: false, userMenu: false }" 
     class="bg-gradient-to-r from-teal-400 to-blue-500 h-16 flex justify-between items-center px-6 text-white">

    <!-- Left: Sidebar Toggle -->
    <div class="flex items-center space-x-3">
        <button @click="open = !open" class="p-2 text-white rounded focus:outline-none">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <!-- Right: User Profile Dropdown -->
    <div class="relative" @click.away="userMenu = false">
        <button @click="userMenu = !userMenu" 
                class="flex items-center space-x-2 focus:outline-none">
            <span>{{ Auth::user()->username }}</span>
            <i class="fas fa-user-circle text-2xl"></i>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="userMenu" 
             x-transition 
             class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg overflow-hidden z-20">
            
            {{-- Link ke Profile --}}
            <a href="{{ route('profile.index') }}" 
               class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100">
                <i class="fa fa-user mr-2"></i> Profile
            </a>

            {{-- Logout --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center px-4 py-2 text-red-600 hover:bg-red-100">
                    <i class="fa fa-sign-out mr-2"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</div>
