@extends('layouts.app')

@section('title', 'Laporan Uang Masuk')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-700 mb-6 flex items-center gap-2">
        LAPORAN UANG MASUK
    </h1>
    <div class="bg-white shadow-lg rounded-2xl p-6 mb-8 border border-gray-200">
        <h2 class="text-lg font-semibold flex items-center gap-2 mb-4 text-gray-700">
            <i class="fas fa-filter text-blue-500"></i> Filter Laporan
        </h2>

        <form action="{{ route('laporan-credit.check') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

            <!-- Tanggal Awal -->
            <div>
                <label class="block text-sm mb-1 text-gray-600">Tanggal Awal</label>
                <input type="text" name="tanggal_awal"
                    value="{{ old('tanggal_awal', $tanggal_awal ?? '') }}"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="YYYY-MM-DD">
                @error('tanggal_awal')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center items-center">
                <span class="text-gray-500">S/D</span>
            </div>

            <!-- Tanggal Akhir -->
            <div>
                <label class="block text-sm mb-1 text-gray-600">Tanggal Akhir</label>
                <input type="text" name="tanggal_akhir"
                    value="{{ old('tanggal_akhir', $tanggal_akhir ?? '') }}"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="YYYY-MM-DD">
                @error('tanggal_akhir')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Filter -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition-all text-white font-medium py-2.5 px-4 rounded-lg shadow-md flex items-center justify-center gap-2">
                    <i class="fa fa-filter"></i> Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Tabel Data -->
    @if(isset($credit))
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200">
        <h2 class="text-lg font-semibold mb-4 flex items-center gap-2 text-gray-700">
        Hasil Laporan
        </h2>
        <div class="flex gap-2">
            <div class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 mb-6">

                <form action="{{ route('laporan.credit.export') }}" method="GET" target="_blank">
                    <input type="hidden" name="tanggal_awal" value="{{ $tanggal_awal ?? '' }}">
                    <input type="hidden" name="tanggal_akhir" value="{{ $tanggal_akhir ?? '' }}">
                    <button type="submit" class="btn btn-success">Export</button>
                </form>
            </div>
             
    </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-center">No</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Nominal</th>
                        <th class="px-4 py-2">Keterangan</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @php $no = 1; @endphp
                    @foreach($credit as $hasil)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2 text-center">{{ $no++ }}</td>
                        <td class="px-4 py-2">{{ $hasil->name }}</td>
                        <td class="px-4 py-2 font-semibold text-green-600">
                            Rp {{ number_format($hasil->nominal, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2">{{ $hasil->description }}</td>
                        <td class="px-4 py-2">{{ $hasil->credit_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    @endif

</div>
@endsection
