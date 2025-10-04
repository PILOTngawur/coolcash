@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-semibold mb-4">KATEGORI UANG KELUAR</h1>

    <div class="bg-white shadow-lg rounded-lg p-4">
        <!-- Header: Button Tambah + Search -->
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('categories_debit.create') }}" 
               class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                <i class="fa fa-plus-circle"></i> Tambah
            </a>

            <form action="{{ route('categories_debit.index') }}" method="GET" class="flex">
                <input type="text" 
                    name="search" 
                    class="flex-1 border rounded-l px-3 py-2 focus:outline-none"
                    placeholder="Cari kategori..."
                    value="{{ request('search') }}">
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r">
                    <i class="fas fa-search mr-1"></i> Cari
                </button>
            </form>
        </div>

    {{-- tabel --}}
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 rounded-lg border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-700 w-16">NO</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">NAMA KATEGORI</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-700 w-32">AKSI</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($categories as $hasil)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                   <td class="px-4 py-2 border">{{ $hasil->name }}</td>
                    <td class="px-4 py-2 border text-center space-x-2">
                        <a href="{{ route('categories_debit.edit', $hasil->id) }}" 
                            class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg inline-flex items-center justify-center">
                            <i class="fa fa-pencil-alt"></i>
                         </a>
                         
                         <form action="{{ route('categories_debit.destroy', $hasil->id) }}" 
                               method="POST" 
                               class="inline-block delete-form">
                             @csrf
                             @method('DELETE')
                             <button type="submit" 
                                 class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg inline-flex items-center justify-center">
                                 <i class="fa fa-trash"></i>
                             </button>
                         </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center px-4 py-2 border">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $categories->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
    
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    
    });
</script>
