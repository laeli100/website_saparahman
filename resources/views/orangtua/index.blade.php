@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Orang Tua</h2>
    <a href="{{ route('orangtua.create') }}" class="btn btn-success mb-3">Tambah Orang Tua</a>
    <table class="table table-bordered" id="orangtua-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Orang Tua</th>
                <th>No KK</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- DataTable akan mengisi data di sini melalui Ajax -->
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#orangtua-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route('orangtua.index') }}',
    columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'nama_ortu', name: 'nama_ortu' },
        { data: 'no_kk', name: 'no_kk' },
        { data: 'no_telepon', name: 'no_telepon' },
        { data: 'alamat', name: 'alamat' },
        { data: 'pekerjaan', name: 'pekerjaan' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
    ]
});
});
</script>
@endpush
