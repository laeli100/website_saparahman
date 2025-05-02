<!-- resources/views/master_mapel/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Master Mapel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Master Mapel</h1>

        <form action="{{ route('master_mapel.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_mapel">Nama Mapel</label>
                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="{{ old('nama_mapel') }}" required>
                @if ($errors->has('nama_mapel'))
                    <div class="text-danger">{{ $errors->first('nama_mapel') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('master_mapel.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
