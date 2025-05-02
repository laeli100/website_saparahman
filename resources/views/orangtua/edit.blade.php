@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Orang Tua</h2>

    <form action="{{ route('orangtua.update', $orangtua->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_ortu" class="form-label">Nama Orang Tua</label>
            <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu', $orangtua->nama_ortu) }}">
        </div>
        <div class="mb-3">
            <label for="no_kk" class="form-label">No KK</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ old('no_kk', $orangtua->no_kk) }}">
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $orangtua->no_telepon) }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $orangtua->alamat) }}">
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $orangtua->pekerjaan) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
