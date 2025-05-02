@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jenis Kasus</h1>
    <form action="{{ route('jenis_kasus.update', $jenisKasus->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="jenis_kasus" class="form-label">Jenis Kasus</label>
            <input type="text" class="form-control" id="jenis_kasus" name="jenis_kasus" value="{{ old('jenis_kasus', $jenisKasus->jenis_kasus) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
