@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
    <h3 class="text-xl font-semibold mb-4">Edit Kategori Uang Masuk</h3>

    {{-- Form Edit --}}
    <form action="{{ route('categories_credit.update', $category->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
            <input type="text" name="name" id="name"
                   class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 px-3 py-2"
                   value="{{ old('name', $category->name) }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('categories_credit.index') }}" 
               class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
               <i class="fa-solid fa-xmark"></i> Batal
            </a>
            <button type="submit" 
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                <i class="fa-solid fa-check"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
