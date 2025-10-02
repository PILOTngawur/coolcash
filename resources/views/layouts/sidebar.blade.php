<div class="w-64 bg-white shadow-md h-screen fixed">
    <div class="p-4 mb-5 font-bold">Menu Utama</div>

    <ul class="space-y-5 p-3">
        <!-- Dashboard -->
        <li>
            <a href="{{ route('dashboard') }}"
               class="flex items-center space-x-2 hover:text-green-500
               {{ request()->routeIs('dashboard') ? 'text-green-600 font-bold' : '' }}">
                <i class="fas fa-th"></i><span>Dashboard</span>
            </a>
        </li>

        <!-- Credit (Uang Masuk) -->
        <li 
            x-data="{
                id: 'uangMasuk',
                open: false,
                init() {
                    // cek localStorage
                    this.open = localStorage.getItem(this.id) === 'true';
                    // auto open kalau route aktif
                    if(@json(request()->routeIs('categories_credit.*') || request()->routeIs('credit.*'))) {
                        this.open = true;
                    }
                    // simpan kalau ada perubahan
                    this.$watch('open', val => localStorage.setItem(this.id, val));
                }
            }"
        >
            <button @click="open = !open"
                    class="flex items-center justify-between w-full hover:text-green-500
                    {{ request()->routeIs('categories_credit.*') || request()->routeIs('credit.*') ? 'text-green-600 font-bold' : '' }}">
                <span class="flex items-center space-x-2">
                    <i class="fas fa-money-bill-trend-up"></i><span>Uang Masuk</span>
                </span>
                <i class="fas fa-chevron-down transform transition-transform"
                   :class="{ 'rotate-180': open }"></i>
            </button>
            <ul x-show="open" x-transition class="pl-6 mt-2 space-y-1 text-gray-500">
                <li>
                    <a href="{{ route('categories_credit.index') }}"
                       class="block hover:text-green-500
                       {{ request()->routeIs('categories_credit.*') ? 'text-green-600 font-bold' : '' }}">
                        Kategori
                    </a>
                </li>
                <li>
                    <a href="{{ route('credit.index') }}"
                       class="block hover:text-green-500
                       {{ request()->routeIs('credit.*') ? 'text-green-600 font-bold' : '' }}">
                        Uang Masuk
                    </a>
                </li>
            </ul>
        </li>

        <!-- Debit (Uang Keluar) -->
        <li 
            x-data="{
                id: 'uangKeluar',
                open: false,
                init() {
                    this.open = localStorage.getItem(this.id) === 'true';
                    if(@json(request()->routeIs('categories_debit.*') || request()->routeIs('debit.*'))) {
                        this.open = true;
                    }
                    this.$watch('open', val => localStorage.setItem(this.id, val));
                }
            }"
        >
            <button @click="open = !open"
                    class="flex items-center justify-between w-full hover:text-green-500
                    {{ request()->routeIs('categories_debit.*') || request()->routeIs('debit.*') ? 'text-green-600 font-bold' : '' }}">
                <span class="flex items-center space-x-2">
                    <i class="fas fa-wallet"></i><span>Uang Keluar</span>
                </span>
                <i class="fas fa-chevron-down transform transition-transform"
                   :class="{ 'rotate-180': open }"></i>
            </button>
            <ul x-show="open" x-transition class="pl-6 mt-2 space-y-1 text-gray-500">
                <li>
                    <a href="{{ route('categories_debit.index') }}"
                       class="block hover:text-green-500
                       {{ request()->routeIs('categories_debit.*') ? 'text-green-600 font-bold' : '' }}">
                        Kategori
                    </a>
                </li>
                <li>
                    <a href="{{ route('debit.index') }}"
                       class="block hover:text-green-500
                       {{ request()->routeIs('debit.*') ? 'text-green-600 font-bold' : '' }}">
                        Uang Keluar
                    </a>
                </li>
            </ul>
        </li>

        <!-- Laporan -->
        <li 
            x-data="{
                id: 'laporan',
                open: false,
                init() {
                    this.open = localStorage.getItem(this.id) === 'true';
                    this.$watch('open', val => localStorage.setItem(this.id, val));
                }
            }"
        >
            <button @click="open = !open"
                    class="flex items-center justify-between w-full hover:text-green-500">
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