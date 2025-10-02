@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-xl font-semibold mb-4">UANG KELUAR</h1>

    <div class="bg-white shadow rounded-lg p-4">
        <!-- header tombol tambah + search -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-3 mb-4">
            <a href="{{ route('debit.create') }}" 
               class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fa fa-plus"></i> Tambah
            </a>

            <div class="flex w-full md:w-2/3">
                <input type="text" 
                       placeholder="Cari Berdasarkan Kategori"
                       class="flex-1 border border-gray-300 px-4 py-2 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r">
                    <i class="fa fa-search"></i> Cari
                </button>
            </div>
        </div>

        <!-- tabel daftar debit -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700 text-center">
                    <tr>
                        <th class="py-2 px-3">NO</th>
                        <th class="py-2 px-3">KATEGORI</th>
                        <th class="py-2 px-3">NOMINAL</th>
                        <th class="py-2 px-3">KETERANGAN</th>
                        <th class="py-2 px-3">TANGGAL</th>
                        <th class="py-2 px-3">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($debit as $index => $item)
                    <tr class="border-b hover:bg-gray-50 text-center">
                        <td class="py-2 px-3">{{ $index + $debit->firstItem() }}</td>
                        <td class="py-2 px-3">{{ $item->name }}</td>
                        <td class="py-2 px-3">Rp. {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        <td class="py-2 px-3">{{ $item->description }}</td>
                        <td class="py-2 px-3">{{ $item->debit_date }}</td>
                        <td class="py-2 px-3 flex justify-center gap-2">
                            <a href="{{ route('debit.edit', $item->id) }}"
                               class="text-blue-600 hover:text-blue-800">
                               <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('debit.destroy', $item->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin hapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="mt-4">
            {{ $debit->links() }}
        </div>
    </div>
</div>
@endsection
