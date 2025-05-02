@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Mading</h2>

        <form action="{{ route('mading.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="id_kategori_mading" class="form-label">ID Kategori Mading</label>
                <select class="form-control @error('id_kategori_mading') is-invalid @enderror" id="id_kategori_mading" name="id_kategori_mading" required>
                    <option value="">Pilih Kategori Mading</option>
                    @foreach ($kategoriMadings as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('id_kategori_mading') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->kategori }}
                        </option>
                    @endforeach
                </select>
                @error('id_kategori_mading')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                    name="judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                    name="gambar" accept="image/*">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambaran_deskripsi" class="form-label">Gambaran</label>
                <textarea class="form-control @error('gambaran_deskripsi') is-invalid @enderror" id="gambaran_deskripsi"
                    name="gambaran_deskripsi" rows="3" required>{{ old('gambaran_deskripsi') }}</textarea>
                @error('gambaran_deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('mading.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
