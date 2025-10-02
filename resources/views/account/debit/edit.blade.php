@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto bg-white shadow rounded-lg">
    <h1 class="text-xl font-bold mb-4">Edit Uang Masuk</h1>

    <form action="{{ route('debit.update', $debit->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Kategori</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded focus:ring">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $debit->category_id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Nominal</label>
            <input type="text" name="nominal" value="{{ $debit->nominal }}" class="w-full border px-3 py-2 rounded focus:ring">
        </div>

        <div>
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="debit_date" value="{{ $debit->debit_date }}" class="w-full border px-3 py-2 rounded focus:ring">
        </div>

        <div>
            <label class="block mb-1">Keterangan</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded focus:ring">{{ $debit->description }}</textarea>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('debit.index') }}" class="px-4 py-2 border rounded">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
