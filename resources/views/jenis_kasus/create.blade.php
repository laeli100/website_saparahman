@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Jenis Kasus</h1>
    <form action="{{ route('jenis_kasus.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="jenis_kasus" class="form-label">Jenis Kasus</label>
            <input type="text" class="form-control" id="jenis_kasus" name="jenis_kasus" value="{{ old('jenis_kasus') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
