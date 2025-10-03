@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-4">Daftar Uang Masuk</h3>

    <a href="{{ route('credit.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mb-4 inline-block">
        Tambah Uang Masuk
    </a>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2 border">Tanggal</th>
                <th class="px-4 py-2 border">Kategori</th>
                <th class="px-4 py-2 border">Deskripsi</th>
                <th class="px-4 py-2 border">Nominal</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($credits as $credit)
                <tr>
                    <td class="px-4 py-2 border">{{ $credit->credit_date }}</td>
                    <td class="px-4 py-2 border">{{ $credit->category->name ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ $credit->description }}</td>
                    <td class="px-4 py-2 border">Rp {{ number_format($credit->nominal, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border flex space-x-2">
                        <a href="{{ route('credit.edit', $credit->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md">Edit</a>

                        <form action="{{ route('credit.destroy', $credit->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- SweetAlert untuk delete -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin mau hapus?',
            text: "Data ini tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});

@if(session('success'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: "{{ session('success') }}",
    showConfirmButton: false,
    timer: 2000
});
@endif
</script>
@endsection
