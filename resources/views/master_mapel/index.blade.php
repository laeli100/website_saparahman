@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Master Mapel</h2>
    <a href="{{ route('master_mapel.create') }}" class="btn btn-success mb-3">Tambah Master Mapel</a>
    <table class="table table-bordered" id="master-mapel-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Mapel</th>
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
    $('#master-mapel-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('master_mapel.index') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'nama_mapel', name: 'nama_mapel' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endpush