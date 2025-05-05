@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Jenis Fiqih</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Jenis Fiqih:</strong> {{ $fiqih->jenis_fiqih }}</p>
        </div>
    </div>

    <a href="{{ route('fiqih.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
