@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Kasus</h1>

        <form action="{{ route('kasus.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="jenis_pelanggaran" class="form-label">Jenis Pelanggaran</label>
                <input type="text" class="form-control" name="jenis_pelanggaran" value="{{ old('jenis_pelanggaran') }}">
            </div>

            <div class="mb-3">
                <label for="tgl_kejadian" class="form-label">Tanggal Kejadian</label>
                <input type="date" class="form-control" name="tgl_kejadian" value="{{ old('tgl_kejadian') }}">
            </div>

            <div class="mb-3">
                <label for="ket_pelanggaran" class="form-label">Keterangan Pelanggaran</label>
                <textarea class="form-control" name="ket_pelanggaran">{{ old('ket_pelanggaran') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="desc_penyelesaian" class="form-label">Deskripsi Penyelesaian</label>
                <textarea class="form-control" name="desc_penyelesaian">{{ old('desc_penyelesaian') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="id_jenis_kasus" class="form-label">Jenis Kasus</label>
                <select class="form-control" name="id_jenis_kasus">
                    <option value="">Pilih Jenis Kasus</option>
                    @foreach ($jenisKasus as $jenis)
                        <option value="{{ $jenis->id }}" {{ old('id_jenis_kasus') == $jenis->id ? 'selected' : '' }}>
                            {{ $jenis->jenis_kasus }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_santri" class="form-label">Santri</label>
                <select class="form-control" name="id_santri">
                    <option value="">Pilih Santri</option>
                    @foreach ($santris as $santri)
                        <option value="{{ $santri->id }}" {{ old('id_santri') == $santri->id ? 'selected' : '' }}>
                            {{ $santri->nama_santri }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
