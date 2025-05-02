@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Mapel Kelas</h1>

        <form action="{{ route('mapel_kelas.store') }}" method="POST">
            @csrf

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
                <label for="id_master_mapel" class="form-label">Mata Pelajaran</label>
                <select name="id_master_mapel" class="form-control" required>
                    <option value="">-- Pilih Mata Pelajaran --</option>
                    @foreach ($masterMapel as $mapel)
                        <option value="{{ $mapel->id }}" {{ old('id_master_mapel') == $mapel->id ? 'selected' : '' }}>
                            {{ $mapel->nama_mapel }}
                        </option>
                    @endforeach
                </select>
                @error('id_master_mapel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('mapel_kelas.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
