@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Subjek</h2>

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

    <form action="{{ route('inggris.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="subjek" class="form-label">Subjek</label>
            <input type="text" class="form-control" name="subjek" value="{{ old('subjek') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('inggris.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
