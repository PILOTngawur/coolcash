@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-4">UANG MASUK</h3>

    <div class="flex justify-between items-center mb-4">
    <a href="{{ route('credit.create') }}" 
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mb-4 inline-block">
        <i class="fas fa-plus mr-2"></i> Tambah
    </a>

    <form action="{{ route('categories_credit.index') }}" method="GET" class="flex">
            <input type="text" 
               name="search" 
               class="flex-1 border rounded-l px-3 py-2 focus:outline-none"
               placeholder="cari berdasarkan kategori"
               value="{{ request('search') }}">
        <button type="submit" 
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r">
            <i class="fas fa-search mr-1"></i> Cari
        </button>
    </form>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300 rounded-lg">
        <thead class="bg-gray-200 text-gray-700 text-center">
                    <tr>
                        <th class="py-2 px-3">NO</th>
                        <th class="py-2 px-3">KATEGORI</th>
                        <th class="py-2 px-3">NOMINAL</th>
                        <th class="py-2 px-3">KETERANGAN</th>
                        <th class="py-2 px-2">TANGGAL</th>
                        <th class="py-2 px-3">AKSI</th>
                    </tr>
                </thead>
            <tbody>
                @forelse ($credits as $c)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $c->category->name }}</td>
                    <td class="px-4 py-2 border">Rp {{ number_format($c->nominal, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border">{{ $c->description}}</td>
                    <td class="px-4 py-2 border">{{ $c->credit_date }}</td>
                    <td class="px-4 py-2 border text-center space-x-2">
                        <a href="{{ route('credit.edit', $c->id) }}" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg">
                                <i class="fa fa-pencil-alt"></i></a>
                        <form action="{{ route('credit.destroy', $c->id) }}" 
                              method="POST" 
                              class="inline-block"
                              onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg">
                                    <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center px-4 py-2 border">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
