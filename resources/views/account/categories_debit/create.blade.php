@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 class="text-xl font-semibold">Tambah Kategori Uang Keluar</h1>
        </div>

        <div class="section-body mt-4">
            <div class="bg-white shadow rounded-lg p-6">
                
                {{-- Alert Error --}}
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('categories_debit.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                        <input type="text" name="name" 
                               value="{{ old('name') }}"
                               class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder="Masukkan nama kategori...">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                            Simpan
                        </button>
                        <a href="{{ route('categories_debit.index') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
