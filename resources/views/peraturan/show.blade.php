@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Peraturan</h2>

    <div class="mb-3">
        <strong>Nama Peraturan:</strong>
        <p>{{ $peraturan->nama_peraturan }}</p>
    </div>

    <div class="mb-3">
        <strong>File:</strong>
        <p>
            <a href="{{ asset('storage/peraturans/' . $peraturan->file) }}" target="_blank">
                {{ $peraturan->file }}
            </a>
        </p>
    </div>

    <a href="{{ route('peraturan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
