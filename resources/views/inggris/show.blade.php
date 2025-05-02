@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Subjek</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Subjek</h5>
            <p class="card-text">{{ $inggris->subjek }}</p>
        </div>
    </div>

    <a href="{{ route('inggris.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
