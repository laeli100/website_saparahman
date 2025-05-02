@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Kasus</h1>
    <a href="{{ route('kasus.create') }}" class="btn btn-success mb-3">Tambah Kasus</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="kasus-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jenis Pelanggaran</th>
                <th>Tanggal Kejadian</th>
                <th>Keterangan</th>
                <th>Deskripsi Penyelesaian</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@push('scripts')
<script>
$(function() {
    $('#kasus-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('kasus.index') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'jenis_pelanggaran', name: 'jenis_pelanggaran' },
            { data: 'tgl_kejadian', name: 'tgl_kejadian' },
            { data: 'ket_pelanggaran', name: 'ket_pelanggaran' },
            { data: 'desc_penyelesaian', name: 'desc_penyelesaian' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush

@endsection
