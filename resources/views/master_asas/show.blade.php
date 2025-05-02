@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Master Asas</h2>

    <div class="mb-3">
        <strong>Nama Asas:</strong>
        <p>{{ $masterAsas->nama_asas }}</p>
    </div>

    <a href="{{ route('master-asas.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
