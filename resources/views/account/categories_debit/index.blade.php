@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 class="text-xl font-semibold">KATEGORI UANG KELUAR</h1>
        </div>

        <div class="section-body mt-4">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <a href="{{ route('categories_debit.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                        <i class="fa fa-plus-circle"></i> TAMBAH
                    </a>
                    <form action="" method="GET" class="flex">
                        <input type="text" name="q" 
                               placeholder="cari berdasarkan nama kategori"
                               class="px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg">
                            <i class="fa fa-search"></i> CARI
                        </button>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 border text-center w-16">NO.</th>
                                <th class="px-4 py-2 border text-left">NAMA KATEGORI</th>
                                <th class="px-4 py-2 border text-center w-32">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($categories as $hasil)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">{{ $no }}</td>
                                <td class="px-4 py-2 border">{{ $hasil->name }}</td>
                                <td class="px-4 py-2 border text-center flex items-center justify-center gap-2">
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
    </section>
</div>
@endsection