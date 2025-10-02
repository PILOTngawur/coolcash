@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Uang Masuk</h3>
    <form action="{{ route('credit.update', $credit->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $credit->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" value="{{ $credit->nominal }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="description" class="form-control" required>{{ $credit->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="credit_date" value="{{ \Carbon\Carbon::parse($credit->credit_date)->format('Y-m-d') }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('credit.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
