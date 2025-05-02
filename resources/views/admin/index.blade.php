@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Admin</h1>
    <a href="{{ route('admin.create') }}" class="btn btn-success mb-3">Tambah Admin</a>
    <table class="table table-bordered" id="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Admin</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#admin-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.index') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_admin', name: 'nama_admin' },
            { data: 'username', name: 'username' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
