@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Surah</h2>

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

    <form action="{{ route('surah.update', $surah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_surah" class="form-label">Nama Surah</label>
            <input type="text" class="form-control" name="nama_surah" value="{{ old('nama_surah', $surah->nama_surah) }}">
        </div>

        <div class="mb-3">
            <label for="arti_surah" class="form-label">Arti Surah</label>
            <input type="text" class="form-control" name="arti_surah" value="{{ old('arti_surah', $surah->arti_surah) }}">
        </div>

        <div class="mb-3">
            <label for="jml_ayat" class="form-label">Jumlah Ayat</label>
            <input type="number" class="form-control" name="jml_ayat" value="{{ old('jml_ayat', $surah->jml_ayat) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('surah.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
