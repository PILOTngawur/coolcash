@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto bg-white shadow rounded-lg">
    <h1 class="text-xl font-bold mb-4">Tambah Uang Masuk</h1>

    <form action="{{ route('debit.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-1">Kategori</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded focus:ring">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Nominal</label>
            <input type="text" name="nominal" class="w-full border px-3 py-2 rounded focus:ring">
            @error('nominal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="debit_date" class="w-full border px-3 py-2 rounded focus:ring">
            @error('debit_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Keterangan</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded focus:ring"></textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('debit.index') }}" class="px-4 py-2 border rounded">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
