<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Nilai Raport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Detail Nilai Raport</h1>

        <form action="{{ route('detail-nilai-raport.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_raport" class="form-label">ID Raport</label>
                <select class="form-select" id="id_raport" name="id_raport" required>
                    <option value="">Pilih Raport</option>
                    <!-- Looping untuk menampilkan data raport -->
                    @foreach($raports as $raport)
                        <option value="{{ $raport->id }}" {{ old('id_raport') == $raport->id ? 'selected' : '' }}>
                            {{ $raport->semester }} - {{ $raport->santri->nama_santri }} <!-- Ganti dengan data yang sesuai -->
                        </option>
                    @endforeach
                </select>
                @error('id_raport')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_mapel" class="form-label">ID Mata Pelajaran</label>
                <select class="form-select" id="id_mapel" name="id_mapel" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    <!-- Looping untuk menampilkan data mata pelajaran -->
                    @foreach($mapels as $mapel)
                        <option value="{{ $mapel->id }}" {{ old('id_mapel') == $mapel->id ? 'selected' : '' }}>
                            {{ $mapel->nama_mapel }} <!-- Ganti dengan nama mapel yang sesuai -->
                        </option>
                    @endforeach
                </select>
                @error('id_mapel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="text" class="form-control" id="nilai" name="nilai" value="{{ old('nilai') }}" required>
                @error('nilai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="desk" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="desk" name="desk" rows="3" required>{{ old('desk') }}</textarea>
                @error('desk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('detail-nilai-raport.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
