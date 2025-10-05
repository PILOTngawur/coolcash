@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center 
            bg-gradient-to-br from-cyan-400 to-blue-600 p-4">

    <div class="bg-white rounded-3xl shadow-2xl ring-1 ring-gray-100 
                w-full max-w-md p-8 space-y-6 text-center">

        {{-- Judul --}}
        <h1 class="text-2xl font-bold tracking-wide text-gray-800">
            Ganti Kata Sandi
        </h1>

        {{-- Form ganti password --}}
        <form action="{{ route('profile.password.update') }}" method="POST" class="space-y-4 text-left">
            @csrf

            {{-- Password lama --}}
            <div>
                <label for="current_password" class="block text-sm font-semibold mb-1"></label>
                <input type="password" name="current_password" id="current_password"
                       placeholder="Masukkan password lama"
                       class="w-full px-4 py-2 bg-gray-100 rounded-lg font-medium focus:ring-2 focus:ring-cyan-400 outline-none" required>
            </div>

            {{-- Password baru --}}
            <div>
                <label for="new_password" class="block text-sm font-semibold mb-1"></label>
                <input type="password" name="new_password" id="new_password"
                       placeholder="Masukkan password baru"
                       class="w-full px-4 py-2 bg-gray-100 rounded-lg font-medium focus:ring-2 focus:ring-cyan-400 outline-none" required>
            </div>

            {{-- Konfirmasi password baru --}}
            <div>
                <label for="new_password_confirmation" class="block text-sm font-semibold mb-1"></label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                       placeholder="Konfirmasi password baru"
                       class="w-full px-4 py-2 bg-gray-100 rounded-lg font-medium focus:ring-2 focus:ring-cyan-400 outline-none" required>
            </div>

            {{-- Tombol konfirmasi --}}
            <button type="submit"
                class="w-full py-3 rounded-lg text-white font-semibold
                       bg-gradient-to-r from-lime-400 to-green-600
                       hover:opacity-90 transform hover:scale-[1.02]
                       transition duration-300 ease-in-out shadow-md">
                Konfirmasi
            </button>
        </form>

        {{-- Tombol kembali --}}
        <a href="{{ route('profile.index') }}"
           class="block w-full py-3 rounded-lg text-white font-semibold
                  bg-gradient-to-r from-cyan-400 to-blue-600
                  hover:opacity-90 transform hover:scale-[1.02]
                  transition duration-300 ease-in-out shadow-md">
           Kembali
        </a>
    </div>
</div>
@endsection