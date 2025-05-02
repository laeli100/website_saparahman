@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Ekskul</h2>

    <form action="{{ route('master_ekskul.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_ekskul" class="form-label">Nama Ekskul</label>
            <input type="text" class="form-control" id="nama_ekskul" name="nama_ekskul" value="{{ old('nama_ekskul') }}">
            @error('nama_ekskul')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
