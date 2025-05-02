@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pengumuman</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan dalam input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label for="desk" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="desk" rows="3">{{ old('desk') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <input type="file" class="form-control" name="file">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
