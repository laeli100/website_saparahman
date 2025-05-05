@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jenis Fiqih</h2>

    <form action="{{ route('fiqih.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jenis_fiqih">Jenis Fiqih</label>
            <input type="text" name="jenis_fiqih" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-2">Simpan</button>
        <a href="{{ route('fiqih.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection
