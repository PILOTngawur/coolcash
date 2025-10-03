@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
    <h3 class="text-xl font-semibold mb-4">Tambah Uang Masuk</h3>

    <form action="{{ route('credit.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="credit_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
            <input type="date" name="credit_date" id="credit_date" value="{{ old('credit_date') }}"
                class="w-full border-gray-300 rounded-md shadow-sm px-3 py-2" required>
        </div>

        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
            <select name="category_id" id="category_id"
                class="w-full border-gray-300 rounded-md shadow-sm px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <input type="text" name="description" id="description"
                class="w-full border-gray-300 rounded-md shadow-sm px-3 py-2"
                placeholder="Contoh: Gaji Bulanan" value="{{ old('description') }}" required>
        </div>

        <div>
            <label for="nominal" class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
            <input type="number" name="nominal" id="nominal"
                class="w-full border-gray-300 rounded-md shadow-sm px-3 py-2"
                placeholder="Masukkan jumlah" value="{{ old('nominal') }}" required>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('credit.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Batal</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
        </div>
    </form>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
@if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 2000
});
@endif
</script>
@endsection
