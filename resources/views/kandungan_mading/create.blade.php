@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Kandungan Mading</h2>

        <form action="{{ route('kandungan-mading.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="id_asas" class="form-label">ID Asas</label>
                <select class="form-control @error('id_asas') is-invalid @enderror" id="id_asas" name="id_asas" required>
                    <option value="">Pilih Asas</option>
                    @foreach ($asass as $asas)
                        <option value="{{ $asas->id }}" {{ old('id_asas') == $asas->id ? 'selected' : '' }}>
                            {{ $asas->nama_asas }}
                        </option>
                    @endforeach
                </select>
                @error('id_asas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_pengampu" class="form-label">Nama Guru Pengampu</label>
                <input type="text" class="form-control @error('nama_pengampu') is-invalid @enderror" id="nama_pengampu" name="nama_pengampu"
                    value="{{ old('nama_pengampu') }}" required>
                @error('nama_pengampu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                    value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" accept="file/*">
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="desk" class="form-label">Gambaran</label>
                <textarea class="form-control @error('desk') is-invalid @enderror" id="desk"
                    name="desk" rows="3" required>{{ old('desk') }}</textarea>
                @error('desk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kandungan-mading.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
