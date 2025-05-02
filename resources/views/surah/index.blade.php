@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Surah</h2>

    <a href="{{ route('surah.create') }}" class="btn btn-primary mb-3">Tambah Surah</a>

    <table class="table table-bordered" id="surah-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Surah</th>
                <th>Arti</th>
                <th>Jumlah Ayat</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(function () {
    $('#surah-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('surah.index') }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,
            searchable: false },
            { data: 'nama_surah', name: 'nama_surah' },
            { data: 'arti_surah', name: 'arti_surah' },
            { data: 'jml_ayat', name: 'jml_ayat' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});
</script>
@endpush
