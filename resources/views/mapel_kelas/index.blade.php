@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Mapel Kelas</h2>
    <a href="{{ route('mapel_kelas.create') }}" class="btn btn-success mb-3">Tambah Mapel Kelas</a>
    <table class="table table-bordered" id="mapel-kelas-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tingkat Kelas</th>
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
    $('#mapel-kelas-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('mapel_kelas.index') }}',  // Menentukan URL untuk mengambil data
        columns: [
            { data: 'id', name: 'id' },  // Menampilkan ID
            { data: 'tingkat_kelas', name: 'tingkat_kelas' },  // Menampilkan Nama Kelas
            { data: 'id_master_mapel', name: 'id_master_mapel' },  // Menampilkan Nama Mapel
            { data: 'action', name: 'action', orderable: false, searchable: false }  // Aksi (Edit dan Hapus)
        ]
    });
});
</script>
@endpush
