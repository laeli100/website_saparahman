@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Kelas</h2>
    <p><strong>ID:</strong> {{ $kelas->id }}</p>
    <p><strong>Tingkatan:</strong> {{ $kelas->tingkatan }}</p>
    <p><strong>Tingkat Kelas:</strong> {{ $kelas->tingkat_kelas }}</p>
    <p><strong>Nama Kelas:</strong> {{ $kelas->nama_kelas }}</p>
    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
