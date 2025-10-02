@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
    <h3 class="text-xl font-semibold mb-4">Tambah Uang Masuk</h3>

    <form action="{{ route('credit.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Nominal --}}
        <div>
            <label class="block text-sm font-medium mb-1">Nominal</label>
            <input type="number" name="nominal" 
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                   required>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="description" rows="3"
                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                      required></textarea>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block text-sm font-medium mb-1">Kategori</label>
            <select name="category_id" 
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                    required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Tanggal --}}
        <div>
            <label class="block text-sm font-medium mb-1">Tanggal</label>
            <input type="date" name="credit_date" 
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                   required>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end space-x-2">
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
            <a href="{{ route('credit.index') }}" 
               class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
