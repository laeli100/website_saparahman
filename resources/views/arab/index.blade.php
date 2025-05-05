@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Subjek Bahasa Arab</h2>

    <a href="{{ route('arab.create') }}" class="btn btn-primary mb-3">Tambah Subjek</a>

    <table class="table table-bordered" id="arab-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Subjek</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#arab-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('arab.index') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'subjek', name: 'subjek' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
