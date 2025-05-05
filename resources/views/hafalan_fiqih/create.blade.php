@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Hafalan Fiqih</h2>

    <form action="{{ route('hafalan-fiqih.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_santri">Santri</label>
            <select name="id_santri" class="form-control" required>
                @foreach($santriList as $santri)
                    <option value="{{ $santri->id }}">{{ $santri->nama_santri }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_fiqih">Jenis Fiqih</label>
            <select name="id_fiqih" class="form-control" required>
                @foreach($fiqihList as $fiqih)
                    <option value="{{ $fiqih->id }}">{{ $fiqih->jenis_fiqih }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_setoran">Tanggal Setoran</label>
            <input type="date" name="tgl_setoran" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nilai">Nilai</label>
            <select name="nilai" class="form-control" required>
                @foreach($nilaiOptions as $nilai)
                    <option value="{{ $nilai }}">{{ $nilai }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('hafalan-fiqih.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
