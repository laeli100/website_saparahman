@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Kelas</h2>
    <a href="{{ route('kelas.create') }}" class="btn btn-success mb-3">Tambah Kelas</a>
    <table class="table table-bordered" id="kelas-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tingkatan</th>
                <th>Nama Kelas</th>
                <th>Tingkat Kelas</th>
                <th>Action</th>
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
    $('#kelas-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('kelas.index') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'tingkatan', name: 'tingkatan' },
            { data: 'nama_kelas', name: 'nama_kelas' },
            { data: 'tingkat_kelas', name: 'tingkat_kelas' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush
