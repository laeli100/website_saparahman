@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Kategori Mading</h2>

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

    <form action="{{ route('kategori-mading.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" name="kategori" value="{{ old('kategori') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori-mading.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
