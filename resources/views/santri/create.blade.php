@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Santri</h1>

    <!-- Tampilkan pesan error jika ada -->
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan pada input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('santri.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_santri" class="form-label">Nama Santri</label>
            <input type="text" class="form-control" name="nama_santri" value="{{ old('nama_santri') }}">
        </div>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" class="form-control" name="nisn" value="{{ old('nisn') }}">
        </div>

        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" name="nis" value="{{ old('nis') }}">
        </div>

        <div class="mb-3">
            <label for="nsm" class="form-label">NSM</label>
            <input type="text" class="form-control" name="nsm" value="{{ old('nsm') }}">
        </div>

        <div class="mb-3">
            <label for="npsm" class="form-label">NPSM</label>
            <input type="text" class="form-control" name="npsm" value="{{ old('npsm') }}">
        </div>

        <div class="mb-3">
            <label for="id_kelas" class="form-label">Kelas</label>
            <select class="form-control" name="id_kelas">
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ old('id_kelas') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('santri.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
