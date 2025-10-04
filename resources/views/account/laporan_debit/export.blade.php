<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Uang Masuk</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Laporan Uang Masuk</h2>
    <p>
        Periode: {{ $tanggal_awal ?? '-' }} s/d {{ $tanggal_akhir ?? '-' }}
    </p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($debit as $i => $c)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $c->name }}</td>
                <td>Rp {{ number_format($c->nominal,0,',','.') }}</td>
                <td>{{ $c->description }}</td>
                <td>{{ $c->credit_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button onclick="window.print()">Print / Save as PDF</button>
</body>
</html>
