@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Jenis Fiqih</h2>

    <form action="{{ route('fiqih.update', $fiqih->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="jenis_fiqih">Jenis Fiqih</label>
            <input type="text" name="jenis_fiqih" class="form-control" value="{{ $fiqih->jenis_fiqih }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update</button>
        <a href="{{ route('fiqih.index') }}" class="btn btn-secondary mt-2">Batal</a>
    </form>
</div>
@endsection
