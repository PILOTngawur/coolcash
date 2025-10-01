<div class="w-64 bg-white shadow-md h-screen fixed">
    <div class="p-4 mb-5 font-bold">Menu Utama</div>

    <!-- <input type="text" placeholder="Pencarian" class="w-500 p-2 border rounded mb-4"> -->

    <ul class="space-y-5 p-3">
     <!-- Dashboard -->
     <li>
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:text-green-500">
            <i class="fas fa-th"></i><span>Dashboard</span>
        </a>
    </li>

    <!-- Credit -->
    <li x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center justify-between w-full hover:text-green-500">
            <span class="flex items-center space-x-2">
                <i class="fas fa-money-bill-trend-up"></i><span>Uang Masuk</span>
            </span>
            <i class="fas fa-chevron-down transform transition-transform"
               :class="{ 'rotate-180': open }"></i>
        </button>
        <ul x-show="open" x-transition class="pl-6 mt-2 space-y-1 text-gray-500">
            <li><a href="#" class="block hover:text-green-500">Kategori</a></li>
            <li><a href="#" class="block hover:text-green-500">Uang Masuk</a></li>
        </ul>
    </li>

    <!-- Debit -->
    <li x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center justify-between w-full hover:text-green-500">
            <span class="flex items-center space-x-2">
                <i class="fas fa-wallet"></i><span>Uang Keluar</span>
            </span>
            <i class="fas fa-chevron-down transform transition-transform"
               :class="{ 'rotate-180': open }"></i>
        </button>
        <ul x-show="open" x-transition class="pl-6 mt-2 space-y-1 text-gray-500">
            <li><a href="{{ route('categories_debit.index') }}" class="block hover:text-green-500">Kategori</a></li>
            <li><a href="{{ route('debit.index') }}" class="block hover:text-green-500">Uang Keluar</a></li>
        </ul>
    </li>

    <!-- Laporan -->
    <li x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center justify-between w-full hover:text-green-500">
            <span class="flex items-center space-x-2">
                <i class="fas fa-folder"></i><span>Laporan</span>
            </span>
            <i class="fas fa-chevron-down transform transition-transform"
               :class="{ 'rotate-180': open }"></i>
        </button>
        <ul x-show="open" x-transition class="pl-6 mt-2 space-y-1 text-gray-500">
            <li><a href="#" class="block hover:text-green-500">Uang Masuk</a></li>
            <li><a href="#" class="block hover:text-green-500">Uang Keluar</a></li>
        </ul>
    </li>
    
    </ul>
</div>
