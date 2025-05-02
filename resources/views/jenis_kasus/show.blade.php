@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Jenis Kasus</h1>
    <p><strong>Jenis Kasus:</strong> {{ $jenisKasus->jenis_kasus }}</p>
    <a href="{{ route('jenis_kasus.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection