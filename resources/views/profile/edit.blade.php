@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center 
            bg-gradient-to-br from-cyan-400 to-blue-600 p-6">

    <div class="bg-white rounded-3xl shadow-2xl ring-1 ring-gray-100 
                w-full max-w-md overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-slate-800 to-indigo-900 p-6 text-center">
            <h2 class="text-white font-bold text-xl">Edit Profile</h2>
        </div>

        <div class="p-8 space-y-4">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- Username --}}
                <input type="text" name="username"
                       value="{{ old('username', $user->username) }}"
                       class="w-full px-4 py-2 rounded-xl bg-gray-100 text-gray-700 focus:outline-none">

                {{-- Email --}}
                <input type="email" name="email"
                       value="{{ old('email', $user->email) }}"
                       class="w-full px-4 py-2 rounded-xl bg-gray-100 text-gray-700 focus:outline-none">

                {{-- Avatar upload --}}
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 rounded-full overflow-hidden bg-gray-100">
                        <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('img/photoprofile.png') }}" 
                             alt="Avatar" class="w-full h-full object-cover">
                    </div>
                    <input type="file" name="avatar" class="flex-1 text-sm">
                </div>

                {{-- Submit --}}
                <button type="submit"
                        class="w-full py-2 rounded-xl bg-gradient-to-r from-green-400 to-blue-500 
                               text-white font-semibold shadow-md hover:scale-[1.02] transition">
                    Simpan Perubahan
                </button>
            </form>

            {{-- Tombol kembali --}}
            <a href="{{ route('profile.index') }}" 
               class="block w-full py-2 rounded-xl text-center bg-gradient-to-r from-gray-400 to-gray-600 
                      text-white font-semibold shadow-md hover:scale-[1.02] transition">
               Kembali
            </a>
        </div>
    </div>
</div>
@endsection
