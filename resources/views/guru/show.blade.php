@extends('layouts.app')

@section('content')
<h2>Detail Guru</h2>
<ul class="list-group">
    <li class="list-group-item"><strong>Nama:</strong> {{ $guru->nama_guru }}</li>
    <li class="list-group-item"><strong>Username:</strong> {{ $guru->username }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $guru->email }}</li>
    <li class="list-group-item"><strong>ID Kelas:</strong> {{ $guru->id_kelas }}</li>
</ul>
<a href="{{ route('guru.index') }}" class="btn btn-primary mt-3">Kembali</a>
@endsection