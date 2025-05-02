@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Kategori Mading</h2>

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

    <form action="{{ route('kategori-mading.update', $kategoriMading->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" name="kategori" value="{{ old('kategori', $kategoriMading->kategori) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategori-mading.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
