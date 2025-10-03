@extends('layouts.auth')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-teal-400">
    <div class="w-full max-w-sm bg-white p-8 rounded-xl shadow-md">
        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('img/logo-coolcash-2.png') }}" alt="CoolCash" class="h-10">
        </div>
        
        <!-- Title -->
        <h2 class="text-xl font-semibold text-center text-gray-800 mb-6">Sign In</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       placeholder="Email"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Password -->
            <div class="mb-4">
                <input id="password" type="password" name="password" required
                       placeholder="Kata Sandi"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Remember Me & Forgot -->
            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2">
                    Ingat Aku
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <!-- Button -->
            <button type="submit"
                class="w-full bg-gradient-to-r from-green-400 to-blue-500 text-white py-2 px-4 rounded-lg hover:opacity-90 transition duration-200">
                Konfirmasi
            </button>
        </form>

        <!-- Register -->
        <p class="mt-6 text-sm text-center text-gray-700">
            Apakah anda tidak punya akun?
            <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
        </p>
    </div>
</div>
@endsection
