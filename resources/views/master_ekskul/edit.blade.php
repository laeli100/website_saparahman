@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Ekskul</h2>

    <form action="{{ route('master_ekskul.update', $master_ekskul->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
            <input type="text" class="form-control" id="nama_ekskul" name="nama_ekskul" value="{{ old('nama_ekskul', $master_ekskul->nama_ekskul) }}">
            @error('nama_ekskul')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('master_ekskul.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
