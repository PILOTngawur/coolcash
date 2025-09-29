@extends('layouts.app')

@section('content')
<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-white shadow p-4 rounded">
        <p class="text-gray-600">Semua Saldo</p>
        <h2 class="text-xl font-bold">Rp. 0,00</h2>
    </div>
    <div class="bg-white shadow p-4 rounded">
        <p class="text-gray-600">Saldo Bulan Ini</p>
        <h2 class="text-xl font-bold">Rp. 0,00</h2>
    </div>
    <div class="bg-white shadow p-4 rounded">
        <p class="text-gray-600">Saldo Bulan Lalu</p>
        <h2 class="text-xl font-bold">Rp. 0,00</h2>
    </div>
</div>

<div class="bg-white shadow rounded h-64 flex items-center justify-center">
    <p class="text-gray-400">[ Chart / Content ]</p>
</div>
@endsection
