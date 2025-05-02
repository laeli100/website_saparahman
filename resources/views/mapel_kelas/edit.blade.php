@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mapel Kelas</h1>

    <form action="{{ route('mapel_kelas.update', $mapel_kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tingkat_kelas" class="form-label">Tingkat Kelas</label>
            <select name="tingkat_kelas" class="form-control" required>
                <option value="">-- Pilih Tingkat Kelas --</option>
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ old('tingkat_kelas') == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
            @error('tingkat_kelas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_master_mapel" class="form-label">ID Master Mapel</label>
            <input type="text" name="id_master_mapel" class="form-control" value="{{ old('id_master_mapel', $mapel_kelas->id_master_mapel) }}">
            @error('id_master_mapel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mapel_kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
