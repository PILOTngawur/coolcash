@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto bg-white shadow rounded-lg">
    <h1 class="text-xl font-bold mb-4">Edit Uang Masuk</h1>

    <form action="{{ route('credit.update', $credit->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Kategori</label>
            <select name="category_id" class="w-full border px-3 py-2 rounded focus:ring">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $credit->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Nominal</label>
            <input type="number" name="nominal" value="{{ $credit->nominal }}" class="w-full border px-3 py-2 rounded focus:ring">
            @error('nominal') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Tanggal</label>
            <input type="date" name="credit_date" value="{{ \Carbon\Carbon::parse($credit->credit_date)->format('Y-m-d') }}" class="w-full border px-3 py-2 rounded focus:ring">
            @error('credit_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1">Keterangan</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded focus:ring">{{ $credit->description }}</textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('credit.index') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 border rounded"><i class="fa-solid fa-xmark"></i> Batal</a>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded"><i class="fa-solid fa-check"></i> Update</button>
        </div>
    </form>
</div>
@endsection