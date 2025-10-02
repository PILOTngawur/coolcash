@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Uang Masuk</h3>
    <form action="{{ route('credit.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="credit_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('credit.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
