@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Kandungan Mading</h2>

    <div class="mb-3">
        <strong>ID Asas:</strong>
        <p>{{ $kandunganMading->id_asas }}</p>
    </div>

    <div class="mb-3">
        <strong>Nama Guru Pengampu:</strong>
        <p>{{ $kandunganMading->nama_pengampu }}</p>
    </div>

    <div class="mb-3">
        <strong>Judul:</strong>
        <p>{{ $kandunganMading->judul }}</p>
    </div>

    <div class="mb-3">
        <strong>File:</strong><br>
        @if($kandunganMading->file)
            <a href="{{ asset('storage/' . $kandunganMading->file) }}" target="_blank">Lihat File</a>
        @else
            <p>Tidak ada file yang diunggah</p>
        @endif
    </div>

    <div class="mb-3">
        <strong>Gambaran:</strong>
        <p>{{ $kandunganMading->desk }}</p>
    </div>

    <a href="{{ route('kandungan-mading.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
