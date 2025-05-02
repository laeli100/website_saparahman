<!-- resources/views/master_mapel/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Master Mapel</h1>

    <form action="{{ route('master_mapel.update', $master__mapel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_mapel" class="form-label">Nama Mapel</label>
            <input type="text" name="nama_mapel" class="form-control" value="{{ old('nama_mapel', $master__mapel->nama_mapel) }}" required>
            @error('nama_mapel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('master_mapel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
