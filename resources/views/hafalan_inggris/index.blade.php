@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Hafalan Inggris</h2>

    <a href="{{ route('hafalan-inggris.create') }}" class="btn btn-success mb-3">Tambah Hafalan</a>

    <table class="table table-bordered" id="hafalanTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Santri</th>
                <th>Subjek</th>
                <th>Tanggal Setoran</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

@push('scripts')
<script>
$(function () {
    $('#hafalanTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('hafalan-inggris.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'santri', name: 'santri' },
            { data: 'inggris', name: 'inggris' },
            { data: 'tgl_setoran', name: 'tgl_setoran' },
            { data: 'nilai', name: 'nilai' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
@endsection
