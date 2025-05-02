@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Kasus</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada masalah dengan inputanmu:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kasus.update', $kasus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_santri" class="form-label">Santri</label>
            <select name="id_santri" id="id_santri" class="form-control" required>
                <option value="">-- Pilih Santri --</option>
                @foreach ($santris as $santri)
                    <option value="{{ $santri->id }}" {{ $santri->id == old('id_santri', $kasus->id_santri) ? 'selected' : '' }}>
                        {{ $santri->nama_santri }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_jenis_kasus" class="form-label">Jenis Pelanggaran</label>
            <select name="id_jenis_kasus" id="id_jenis_kasus" class="form-control" required>
                <option value="">-- Pilih Jenis Pelanggaran --</option>
                @foreach ($jenisKasus as $jenis)
                    <option value="{{ $jenis->id }}" {{ $jenis->id == old('id_jenis_kasus', $kasus->id_jenis_kasus) ? 'selected' : '' }}>
                        {{ $jenis->jenis_kasus }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_kejadian" class="form-label">Tanggal Kejadian</label>
            <input type="date" name="tgl_kejadian" class="form-control" value="{{ old('tgl_kejadian', $kasus->tgl_kejadian) }}" required>
        </div>

        <div class="mb-3">
            <label for="ket_pelanggaran" class="form-label">Keterangan Pelanggaran</label>
            <textarea name="ket_pelanggaran" class="form-control" rows="3" required>{{ old('ket_pelanggaran', $kasus->ket_pelanggaran) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="desc_penyelesaian" class="form-label">Deskripsi Penyelesaian</label>
            <textarea name="desc_penyelesaian" class="form-control" rows="3">{{ old('desc_penyelesaian', $kasus->desc_penyelesaian) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kasus.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
