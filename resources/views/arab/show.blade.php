@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Subjek Bahasa Arab</h2>

    <div class="mb-3">
        <label class="form-label fw-bold">Subjek:</label>
        <div>{{ $arab->subjek }}</div>
    </div>

    <a href="{{ route('arab.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
