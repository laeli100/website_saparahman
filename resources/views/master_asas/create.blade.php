@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Master Asas</h2>

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

    <form action="{{ route('master-asas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_asas" class="form-label">Nama Asas</label>
            <input type="text" class="form-control" name="nama_asas" value="{{ old('nama_asas') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('master-asas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
