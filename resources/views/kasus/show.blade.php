@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Kasus Pelanggaran</h2>

        <div class="card mt-4">
            <div class="card-body">
                <p><strong>Nama Santri:</strong> {{ $kasus->santri->nama_santri ?? 'Tidak Diketahui' }}</p>
                <p><strong>Jenis Pelanggaran:</strong> {{ $kasus->jenisKasus->nama_jenis ?? 'Tidak Diketahui' }}</p>
                <p><strong>Tanggal Kejadian:</strong>
                    {{ \Carbon\Carbon::parse($kasus->tgl_kejadian)->translatedFormat('d F Y') }}</p>
                <p><strong>Keterangan Pelanggaran:</strong> {{ $kasus->ket_pelanggaran }}</p>
                <p><strong>Deskripsi Penyelesaian:</strong> {{ $kasus->desc_penyelesaian }}</p>
            </div>
        </div>

        <a href="{{ route('kasus.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        <a href="{{ route('kasus.edit', $kasus->id) }}" class="btn btn-warning mt-3">Edit</a>
    </div>
@endsection
