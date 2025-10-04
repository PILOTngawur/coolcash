@extends('layouts.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
        <h3 class="text-xl font-semibold mb-4">Tambah Uang Masuk</h3>

        <form action="{{ route('credit.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- Kategori --}}
            <div>
                <label class="block text-sm font-medium mb-1">Kategori</label>
                <select name="category_id"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Tanggal --}}
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal</label>
                <input type="date" name="credit_date"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300" required>
            </div>
            
            {{-- Nominal --}}
            <div>
                <label class="block text-sm font-medium mb-1">Nominal</label>
                <input type="text" name="nominal" id="nominal"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Rp 0" required>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="block text-sm font-medium mb-1">Deskripsi</label>
                <textarea name="description" rows="3"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300" required></textarea>
            </div>



            <div class="flex justify-end gap-2">
                <a href="{{ route('credit.index') }}" class="px-4 py-2 border rounded">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nominalInput = document.getElementById('nominal');

        nominalInput.addEventListener('input', function(e) {
            // Ambil angka murni (hapus selain digit)
            let value = this.value.replace(/[^0-9]/g, '');
            if (value) {
                // Format ke bentuk rupiah (Rp 20.000)
                this.value = 'Rp ' + Number(value).toLocaleString('id-ID');
            } else {
                this.value = '';
            }
        });

        // Saat hapus "Rp" dan titik agar tersisa angka saja
        nominalInput.form?.addEventListener('submit', function() {
            nominalInput.value = nominalInput.value
                .replace(/[^0-9]/g, '');
        });
    });
</script>
