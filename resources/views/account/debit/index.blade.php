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

            <form action="{{ route('debit.search') }}" method="GET" class="flex">
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

        <!-- tabel daftar debit -->
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
                    @forelse ($debit as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border text-center">{{ $index + $debit->firstItem() }}</td>
                        <td class="px-4 py-2 border">{{ $item->name }}</td>
                        <td class="px-4 py-2 border">Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border">{{ $item->description }}</td>
                        <td class="px-4 py-2 border">{{ $item->debit_date }}</td>
                        <td class="px-4 py-2 border text-center space-x-2">
                            <a href="{{ route('debit.edit', $item->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white p-2 rounded-lg">
                                <i class="fa fa-pencil-alt"></i></a>
                            <form id="deleteForm-{{ $item->id }}" action="{{ route('debit.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    onclick="confirmDelete({{ $item->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg">
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

        <!-- pagination -->
        <div class="mt-4">
            {{ $debit->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin mau hapus?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm-' + id).submit();
            }
        })
    }
</script>