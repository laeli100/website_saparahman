@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Subjek Bahasa Arab</h2>

    <form action="{{ route('arab.update', $arab->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="subjek" class="form-label">Subjek</label>
            <input type="text" name="subjek" class="form-control" value="{{ old('subjek', $arab->subjek) }}" required>
            @error('subjek')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('arab.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
