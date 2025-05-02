@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Peraturan</h2>

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

    <form action="{{ route('peraturan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_peraturan" class="form-label">Nama Peraturan</label>
            <input type="text" class="form-control" name="nama_peraturan" value="{{ old('nama_peraturan') }}">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <input type="file" class="form-control" name="file">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('peraturan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
