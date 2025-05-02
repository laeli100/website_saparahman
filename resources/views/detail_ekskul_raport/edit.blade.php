@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Edit Data Detail Ekskul Raport</div>
    <div class="card-body">
        <form action="{{ route('detail_ekskul_raport.update', $detail_ekskul_raport->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id_raport" class="form-label">ID Raport</label>
                <input type="text" name="id_raport" class="form-control" value="{{ old('id_raport', $detail_ekskul_raport->id_raport) }}">
                @error('id_raport') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="id_ekskul" class="form-label">ID Ekskul</label>
                <input type="text" name="id_ekskul" class="form-control" value="{{ old('id_ekskul', $detail_ekskul_raport->id_ekskul) }}">
                @error('id_ekskul') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="text" name="nilai" class="form-control" value="{{ old('nilai', $detail_ekskul_raport->nilai) }}">
                @error('nilai') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('detail_ekskul_raport.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
