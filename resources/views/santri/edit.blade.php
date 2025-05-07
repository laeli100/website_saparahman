@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Santri</h2>

    {{-- Tampilkan pesan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi Kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form update santri --}}
    <form action="{{ route('santri.update', $santri->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_santri" class="form-label">Nama Santri</label>
            <input type="text" name="nama_santri" class="form-control" value="{{ old('nama_santri', $santri->nama_santri) }}" required>
        </div>

        <div class="mb-3">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" name="nisn" class="form-control" value="{{ old('nisn', $santri->nisn) }}" required>
        </div>

        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" name="nis" class="form-control" value="{{ old('nis', $santri->nis) }}" required>
        </div>

        <div class="mb-3">
            <label for="nsm" class="form-label">NSM</label>
            <input type="text" name="nsm" class="form-control" value="{{ old('nsm', $santri->nsm) }}" required>
        </div>

        <div class="mb-3">
            <label for="npsm" class="form-label">NPSM</label>
            <input type="text" name="npsm" class="form-control" value="{{ old('npsm', $santri->npsm) }}" required>
        </div>

        <div class="mb-3">
            <label for="id_kelas" class="form-label">Kelas</label>
            <select name="id_kelas" id="id_kelas" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ $k->id == old('id_kelas', $santri->id_kelas) ? 'selected' : '' }}>
                        {{ $k->nama_kelas }} - {{ $k->tingkatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-control" required>
                <option value="">-- Pilih Gender --</option>
                <option value="santriwan" {{ old('gender', $santri->gender) == 'santriwan' ? 'selected' : '' }}>Santriwan</option>
                <option value="santriwati" {{ old('gender', $santri->gender) == 'santriwati' ? 'selected' : '' }}>Santriwati</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('santri.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
