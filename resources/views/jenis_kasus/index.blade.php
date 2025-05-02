@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Jenis Kasus</h1>
    <a href="{{ route('jenis_kasus.create') }}" class="btn btn-success mb-3">Tambah Jenis Kasus</a>
    <table class="table table-bordered" id="jenis-kasus-table">
        <thead>
            <tr>
                <th>NO</th>
                <th>Jenis Kasus</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#jenis-kasus-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('jenis_kasus.index') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'jenis_kasus', name: 'jenis_kasus' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
