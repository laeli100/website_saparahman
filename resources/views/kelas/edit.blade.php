@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kelas</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada masalah dengan inputanmu:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tingkatan" class="form-label">Tingkatan</label>
            <input type="text" name="tingkatan" value="{{ old('tingkatan', $kelas->tingkatan) }}" class="form-control" id="tingkatan" required>
        </div>

        <div class="mb-3">
            <label for="tingkat_kelas" class="form-label">Tingkat Kelas</label>
            <input type="text" name="tingkat_kelas" value="{{ old('tingkat_kelas', $kelas->tingkat_kelas) }}" class="form-control" id="tingkat_kelas" required>
        </div>

        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}" class="form-control" id="nama_kelas" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
