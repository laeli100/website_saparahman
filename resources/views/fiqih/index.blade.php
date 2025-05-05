@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Jenis Fiqih</h2>

    <a href="{{ route('fiqih.create') }}" class="btn btn-primary mb-3">Tambah Jenis Fiqih</a>

    <table class="table table-bordered" id="fiqih-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Fiqih</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#fiqih-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('fiqih.index') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'jenis_fiqih', name: 'jenis_fiqih' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
