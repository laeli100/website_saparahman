<!-- resources/views/master_mapel/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Master Mapel</h1>

    <div class="form-group">
        <label for="nama_mapel">Nama Mapel</label>
        <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="{{ $master__mapel->nama_mapel }}" disabled>
    </div>
    
    <a href="{{ route('master_mapel.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
