\@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-4">Kategori Uang Masuk</h3>

    <div class="bg-white shadow-lg rounded-lg p-4">
        <!-- Header: Button Tambah + Search -->
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('categories_credit.create') }}" 
               class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                <i class="fa fa-plus-circle"></i> Tambah
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
                               class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg">
                                <i class="fa fa-pencil-alt"></i></a>

                            <!-- Delete pakai SweetAlert -->
                            <form id="delete-form-{{ $c->id }}" 
                                  action="{{ route('categories_credit.destroy', $c->id) }}" 
                                  method="POST" 
                                  class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button type="button" 
                                    onclick="confirmDelete({{ $c->id }})" 
                                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg">
                                <i class="fa fa-trash"></i>
                            </button>
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
</div>
@endsection

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Yakin hapus?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    })
}
</script>
