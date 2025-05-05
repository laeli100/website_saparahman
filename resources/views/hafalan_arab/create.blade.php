@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Hafalan Arab</h2>

    <form action="{{ route('hafalan-arab.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_santri" class="form-label">Santri</label>
            <select name="id_santri" class="form-control" required>
                <option value="">-- Pilih Santri --</option>
                @foreach($santriList as $santri)
                    <option value="{{ $santri->id }}">{{ $santri->nama_santri }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_arab" class="form-label">Subjek Arab</label>
            <select name="id_arab" class="form-control" required>
                <option value="">-- Pilih Subjek --</option>
                @foreach($arabList as $arab)
                    <option value="{{ $arab->id }}">{{ $arab->subjek }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_setoran" class="form-label">Tanggal Setoran</label>
            <input type="date" name="tgl_setoran" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <select name="nilai" class="form-control" required>
                <option value="">-- Pilih Nilai --</option>
                @foreach($nilaiOptions as $nilai)
                    <option value="{{ $nilai }}">{{ $nilai }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('hafalan-arab.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
