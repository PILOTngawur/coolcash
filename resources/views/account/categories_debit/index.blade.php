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

            <form action="" method="GET" class="flex">
                <input type="text" name="q" placeholder="Cari berdasarkan kategori" 
                       class="border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg flex items-center gap-1">
                    <i class="fa fa-search"></i> Cari
                </button>
            </form>
        </div>

        <!-- Table -->
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
                    @php $no = 1; @endphp
                    @foreach ($categories as $hasil)
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-4 py-2 text-center">{{ $no }}</td>
                        <td class="px-4 py-2">{{ $hasil->name }}</td>
                        <td class="px-4 py-2 text-center flex justify-center items-center gap-2">
                            <a href="{{ route('categories_debit.edit', $hasil->id) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('categories_debit.destroy', $hasil->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
