@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center 
            bg-gradient-to-br from-cyan-400 to-blue-600 p-6">

    <div class="bg-white rounded-3xl shadow-2xl ring-1 ring-gray-100 
                w-full max-w-md overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-slate-800 to-indigo-900 p-6 
                    flex items-center justify-between relative">

            {{-- Logo --}}
            <img src="{{ asset('img/logo-coolcash-2.png') }}" 
                 alt="CoolCash" class="w-40">

            {{-- Avatar --}}
            <div class="absolute right-6 bottom-[-2.5rem]">
                <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white shadow-lg bg-gray-100">
                    <img src="{{ asset('img/photoprofile.png') }}" 
                         alt="Avatar" class="w-full h-full object-cover">
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="p-8 pt-12 text-center space-y-4">

            {{-- Username --}}
            <h2 class="text-2xl font-bold text-gray-800">
                {{ Auth::user()->username }}
            </h2>

            {{-- Email --}}
            <input type="text" 
                   value="{{ Auth::user()->email }}"
                   class="w-full px-4 py-2 rounded-xl bg-gray-100 text-gray-700 focus:outline-none" 
                   readonly>

            {{-- Password --}}
            <input type="password" 
                   value="********" 
                   class="w-full px-4 py-2 rounded-xl bg-gray-100 text-gray-700 focus:outline-none" 
                   readonly>

            {{-- Ganti password --}}
            <a href="{{ route('password.edit') }}" 
               class="text-blue-600 text-sm font-medium hover:underline">
                Ganti Kata Sandi
            </a>

            {{-- Tombol Aksi --}}
            <div class="space-y-3 pt-4">

                {{-- Tombol Logout --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full py-2 rounded-xl bg-gradient-to-r from-red-500 to-yellow-400 
                                   text-white font-semibold shadow-md hover:scale-[1.02] transition">
                        Keluar
                    </button>
                </form>

                {{-- Tombol Kembali --}}
                <a href="{{ route('dashboard') }}" 
                   class="block w-full py-2 rounded-xl text-center bg-gradient-to-r from-cyan-400 to-blue-600 
                          text-white font-semibold shadow-md hover:scale-[1.02] transition">
                   Kembali
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
