@extends('layouts.app')

@section('content')
<div class="grid grid-cols-2 gap-4 mb-6">
    <div class="bg-white shadow p-4 rounded">
        <p class="text-gray-600">Total Saldo</p>
        <h2 class="text-xl font-bold">Rp. {{ number_format($total_saldo, 0, ',', '.') }}</h2>
    </div>
    <div class="bg-white shadow p-4 rounded">
        <p class="text-gray-600">Total Pengeluaran</p>
        <h2 class="text-xl font-bold">Rp. {{ number_format($total_pengeluaran, 0, ',', '.') }}</h2>
    </div>
</div>

<div class="bg-white shadow rounded h-64 flex items-center justify-center">
<canvas id="chartDashboard"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartDashboard').getContext('2d');
const chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Total Saldo', 'Total Pengeluaran'],
        datasets: [{
            data: [{{ $total_saldo }}, {{ $total_pengeluaran }}],
            backgroundColor: ['#22c55e', '#ef4444'], // hijau & merah
            borderColor: '#ffffff',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom' },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        let value = context.raw;
                        return context.label + ': Rp ' + value.toLocaleString('id-ID');
                    }
                }
            }
        }
    }
});
</script>
@endsection
