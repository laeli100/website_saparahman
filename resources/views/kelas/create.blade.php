@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kelas</h2>

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tingkatan" class="form-label">Tingkatan</label>
            <input type="text" class="form-control" id="tingkatan" name="tingkatan" value="{{ old('tingkatan') }}">
        </div>
        <div class="mb-3">
            <label for="tingkat_kelas" class="form-label">Tingkat Kelas</label>
            <input type="text" class="form-control" id="tingkat_kelas" name="tingkat_kelas" value="{{ old('tingkat_kelas') }}">
        </div>
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
