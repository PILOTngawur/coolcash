@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-4">Kategori Uang Masuk</h3>

    {{-- Tombol tambah --}}
    <a href="{{ route('categories_credit.create') }}" 
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mb-4 inline-block">
        <i class="fas fa-plus mr-2"></i> Tambah
    </a>

    {{-- pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- form search --}}
    <form method="GET" action="{{ route('categories_credit.index') }}" class="flex mb-4">
        <input type="text" 
               name="search" 
               class="flex-1 border rounded-l px-3 py-2 focus:outline-none"
               placeholder="cari berdasarkan nama kategori"
               value="{{ request('search') }}">
        <button type="submit" 
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r">
            <i class="fas fa-search mr-1"></i> Cari
        </button>
    </form>

    {{-- tabel --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Kategori</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $c)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                   <td class="px-4 py-2 border">{{ $c->name }}</td>
                    <td class="px-4 py-2 border text-center space-x-2">
                        <a href="{{ route('categories_credit.edit', $c->id) }}" 
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</a>
                        <form action="{{ route('categories_credit.destroy', $c->id) }}" 
                              method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                Hapus
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
    </div>
</div>
@endsection
