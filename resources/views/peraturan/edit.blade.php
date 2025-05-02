@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Peraturan</h2>

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

    <form action="{{ route('peraturan.update', $peraturan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_peraturan" class="form-label">Nama Peraturan</label>
            <input type="text" class="form-control" name="nama_peraturan" value="{{ old('nama_peraturan', $peraturan->nama_peraturan) }}">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Ganti File (optional)</label>
            <input type="file" class="form-control" name="file">
            @if ($peraturan->file)
                <p class="mt-2">File saat ini: 
                    <a href="{{ asset('storage/peraturans/' . $peraturan->file) }}" target="_blank">
                        {{ $peraturan->file }}
                    </a>
                </p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('peraturan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
