@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center 
            bg-gradient-to-br from-cyan-400 to-blue-600 p-4">

    <div class="bg-white rounded-3xl shadow-2xl ring-1 ring-gray-100 
                w-full max-w-md p-8 text-center space-y-5">

        <h1 class="text-2xl font-bold tracking-wide">Ganti Kata Sandi</h1>

        {{-- Form ganti password --}}
        <form action="{{ route('profile.password.update') }}" method="POST" class="space-y-4">
            @csrf

            <input type="password" name="current_password"
                   placeholder="Password Lama"
                   class="w-full px-4 py-2 bg-gray-100 rounded-lg font-medium" required>

            <input type="password" name="new_password"
                   placeholder="Password Baru"
                   class="w-full px-4 py-2 bg-gray-100 rounded-lg font-medium" required>

            <input type="password" name="new_password_confirmation"
                   placeholder="Konfirmasi Password Baru"
                   class="w-full px-4 py-2 bg-gray-100 rounded-lg font-medium" required>

            <button type="submit"
                class="w-full py-3 rounded-lg text-white font-semibold
                       bg-gradient-to-r from-lime-400 to-green-600
                       hover:opacity-90 transform hover:scale-105
                       transition duration-300 ease-in-out shadow-md">
                Konfirmasi
            </button>
        </form>

        {{-- Tombol kembali --}}
        <a href="{{ route('profile.index') }}"
           class="block w-full py-3 rounded-lg text-white font-semibold
                  bg-gradient-to-r from-cyan-400 to-blue-600
                  hover:opacity-90 transform hover:scale-105
                  transition duration-300 ease-in-out shadow-md">
           Kembali
        </a>
    </div>
</div>
@endsection
