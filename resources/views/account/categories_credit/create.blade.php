@extends('layouts.app')

@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 class="text-xl font-semibold">Tambah Kategori Uang Masuk</h1>
        </div>

        <div class="section-body mt-4">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('categories_credit.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                        <input type="text" name="name" id="name"
                        class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="contoh: Gaji Bulanan"
                               value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                        <a href="{{ route('categories_credit.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

