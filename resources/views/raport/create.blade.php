<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Raport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Raport</h1>

        <form action="{{ route('raport.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_santri" class="form-label">ID Santri</label>
                <select class="form-select" id="id_santri" name="id_santri" required>
                    <option value="">Pilih Santri</option>
                    <!-- Looping untuk menampilkan data santri -->
                    @foreach($santris as $santri)
                        <option value="{{ $santri->id }}" {{ old('id_santri') == $santri->id ? 'selected' : '' }}>
                            {{ $santri->nama_santri }} <!-- Ganti dengan nama santri yang sesuai -->
                        </option>
                    @endforeach
                </select>
                @error('id_santri')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_guru" class="form-label">ID Guru</label>
                <select class="form-select" id="id_guru" name="id_guru" required>
                    <option value="">Pilih Guru</option>
                    <!-- Looping untuk menampilkan data guru -->
                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id }}" {{ old('id_guru') == $guru->id ? 'selected' : '' }}>
                            {{ $guru->nama_guru }} <!-- Ganti dengan nama guru yang sesuai -->
                        </option>
                    @endforeach
                </select>
                @error('id_guru')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_kelas" class="form-label">ID Kelas</label>
                <select class="form-select" id="id_kelas" name="id_kelas" required>
                    <option value="">Pilih Kelas</option>
                    <!-- Looping untuk menampilkan data kelas -->
                    @foreach($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}" {{ old('id_kelas') == $kelasItem->id ? 'selected' : '' }}>
                            {{ $kelasItem->nama_kelas }} <!-- Ganti dengan nama kelas yang sesuai -->
                        </option>
                    @endforeach
                </select>
                @error('id_kelas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <select class="form-select" id="semester" name="semester" required>
                    <option value="">Pilih Semester</option>
                    <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>Semester 1</option>
                    <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>Semester 2</option>
                </select>
                @error('semester')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('raport.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
