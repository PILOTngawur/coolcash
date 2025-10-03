@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto bg-white shadow rounded-lg">
    <h1 class="text-xl font-bold mb-4">Edit Uang Keluar</h1>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <strong>Ups! Ada kesalahan:</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
            <a href="{{ route('debit.index') }}" class="bg-red-500 hover:bg-red-600  text-white px-4 py-2 border rounded"><i class="fa-solid fa-xmark"></i> Batal</a>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded"><i class="fa-solid fa-check"></i> Update</button>
        </div>
    </form>
</div>
@endsection
