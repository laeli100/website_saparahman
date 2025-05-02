@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Surah</h2>

    <div class="mb-3">
        <strong>Nama Surah:</strong> {{ $surah->nama_surah }}
    </div>
    <div class="mb-3">
        <strong>Arti Surah:</strong> {{ $surah->arti_surah }}
    </div>
    <div class="mb-3">
        <strong>Jumlah Ayat:</strong> {{ $surah->jml_ayat }}
    </div>

    <a href="{{ route('surah.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
