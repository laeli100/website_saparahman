@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Santri</h2>

    <table class="table table-bordered">
        <tr>
            <th>Nama Santri</th>
            <td>{{ $santri->nama_santri }}</td>
        </tr>
        <tr>
            <th>NISN</th>
            <td>{{ $santri->nisn }}</td>
        </tr>
        <tr>
            <th>NIS</th>
            <td>{{ $santri->nis }}</td>
        </tr>
        <tr>
            <th>NSM</th>
            <td>{{ $santri->nsm }}</td>
        </tr>
        <tr>
            <th>NPSM</th>
            <td>{{ $santri->npsm }}</td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>{{ $santri->kelas->nama_kelas ?? 'Belum Ada' }}</td>
        </tr>
    </table>

    <a href="{{ route('santri.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('santri.edit', $santri->id) }}" class="btn btn-warning">Edit</a>
</div>
@endsection
