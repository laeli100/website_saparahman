<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Raport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detail Edit Raport</h1>

        <form action="{{ route('detail-nilai-raport.update', $detailNilaiRaport->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="id_raport" class="form-label">Raport</label>
                <select class="form-select" id="id_raport" name="id_raport" required>
                    <option value="">Pilih Raport</option>
                    @foreach ($raports as $raport)
                        <option value="{{ $raport->id }}"
                            {{ $raport->id == $detailNilaiRaport->id_raport ? 'selected' : '' }}>
                            {{ $raport->semester }}
                        </option>
                    @endforeach
                </select>
                @error('id_raport')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_mapel" class="form-label">Mapel</label>
                <select class="form-select" id="id_mapel" name="id_mapel" required>
                    <option value="">Pilih Mapel</option>
                    @foreach ($mapels as $mapel)
                        <option value="{{ $mapel->id }}"
                            {{ $mapel->id == $detailNilaiRaport->id_mapel ? 'selected' : '' }}>
                            {{ $mapel->nama_mapel }}
                        </option>
                    @endforeach
                </select>
                @error('id_mapel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="text" class="form-control" id="nilai" name="nilai"
                    value="{{ old('nilai', $detailNilaiRaport->nilai) }}" required>
                @error('nilai')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="desk" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="desk" name="desk" required>{{ old('desk', $detailNilaiRaport->desk) }}</textarea>
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
