@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <h1>Kelola Keuangan Lebih Mudah</h1>
        <p>CoolCash membantu kamu mencatat pemasukan & pengeluaran dengan cepat dan rapi.</p>
        @guest
            <a href="{{ route('register') }}" class="btn">Mulai Sekarang</a>
        @else
            <a href="{{ route('home') }}" class="btn">Ke Dashboard</a>
        @endguest
    </section>

    <!-- About Section -->
    <section class="about">
        <h2>Tentang CoolCash</h2>
        <p>
            CoolCash adalah aplikasi pencatatan keuangan sederhana berbasis web.
            Kamu bisa memantau pemasukan, pengeluaran, dan saldo secara praktis.
            Cocok untuk pelajar, mahasiswa, maupun pekerja yang ingin lebih hemat
            dan teratur dalam mengelola uang.
        </p>
    </section>
@endsection
