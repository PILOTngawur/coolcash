@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">UANG KELUAR</h1>
        <a href="{{ route('debit.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            <i class="fa fa-plus-circle"></i> TAMBAH
        </a>
    </div>

    <!-- tabel daftar debit -->
    <div class="bg-white shadow rounded-lg p-4">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="py-2 px-3 text-center">No</th>
                    <th class="py-2 px-3">Kategori</th>
                    <th class="py-2 px-3">Nominal</th>
                    <th class="py-2 px-3">Keterangan</th>
                    <th class="py-2 px-3">Tanggal</th>
                    <th class="py-2 px-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($debit as $index => $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-3 text-center">{{ $index + $debit->firstItem() }}</td>
                    <td class="py-2 px-3">{{ $item->name }}</td>
                    <td class="py-2 px-3">Rp. {{ number_format($item->nominal, 0, ',', '.') }}</td>
                    <td class="py-2 px-3">{{ $item->description }}</td>
                    <td class="py-2 px-3">{{ $item->debit_date }}</td>
                    <td class="py-2 px-3 flex justify-center gap-2">
                        <a href="{{ route('debit.edit', $item->id) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded">
                           <i class="fa fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('debit.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $debit->links() }}
        </div>
    </div>
</div>
@endsection
