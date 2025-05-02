@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Detail Raport P5</h2>

        <form action="{{ route('detail-raport-p5.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="id_raport" class="form-label">ID Raport</label>
                <select name="id_raport" class="form-control" required>
                    <option value="">-- Pilih Raport --</option>
                    @foreach ($raports as $raport)
                        <option value="{{ $raport->id }}">{{ $raport->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="desk" class="form-label">Deskripsi</label>
                <textarea name="desk" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('detail-nilai-raport.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
