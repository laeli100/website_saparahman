@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Hafalan Surah</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan dalam input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hafalan-surah.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_santri" class="form-label">Santri</label>
            <select class="form-control" name="id_santri">
                <option value="">-- Pilih Santri --</option>
                @foreach ($santriList as $santri)
                    <option value="{{ $santri->id }}" {{ old('id_santri') == $santri->id ? 'selected' : '' }}>
                        {{ $santri->nama_santri }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_surah" class="form-label">Surah</label>
            <select class="form-control" name="id_surah">
                <option value="">-- Pilih Surah --</option>
                @foreach ($surahList as $surah)
                    <option value="{{ $surah->id }}" {{ old('id_surah') == $surah->id ? 'selected' : '' }}>
                        {{ $surah->nama_surah }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_setoran" class="form-label">Tanggal Setoran</label>
            <input type="date" class="form-control" name="tgl_setoran" value="{{ old('tgl_setoran') }}">
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
        <a href="{{ route('hafalan-surah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
