@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pengumuman</h2>

    <div class="mb-3">
        <strong>Judul:</strong>
        <p>{{ $pengumuman->judul }}</p>
    </div>

    <div class="mb-3">
        <strong>Deskripsi:</strong>
        <p>{{ $pengumuman->desk }}</p>
    </div>

    <div class="mb-3">
        <strong>File:</strong>
        <p>
            <a href="{{ asset('storage/pengumumans/' . $pengumuman->file) }}" target="_blank">
                {{ $pengumuman->file }}
            </a>
        </p>
    </div>

    <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
