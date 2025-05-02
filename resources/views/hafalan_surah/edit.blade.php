@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Hafalan Surah</h2>

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

    <form action="{{ route('hafalan-surah.update', $hafalanSurah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_santri" class="form-label">Santri</label>
            <select class="form-control" name="id_santri">
                @foreach ($santriList as $santri)
                    <option value="{{ $santri->id }}" {{ $hafalanSurah->id_santri == $santri->id ? 'selected' : '' }}>
                        {{ $santri->nama_santri }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_surah" class="form-label">Surah</label>
            <select class="form-control" name="id_surah">
                @foreach ($surahList as $surah)
                    <option value="{{ $surah->id }}" {{ $hafalanSurah->id_surah == $surah->id ? 'selected' : '' }}>
                        {{ $surah->nama_surah }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_setoran" class="form-label">Tanggal Setoran</label>
            <input type="date" class="form-control" name="tgl_setoran" value="{{ $hafalanSurah->tgl_setoran }}">
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <input type="text" class="form-control" name="nilai" value="{{ $hafalanSurah->nilai }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('hafalan-surah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
