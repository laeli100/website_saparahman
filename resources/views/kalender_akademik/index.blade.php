@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kalender Akademik</h2>
    <a href="{{ route('kalender_akademik.create') }}" class="btn btn-success mb-3">Tambah</a>
    <table class="table table-bordered" id="kalender-akademik-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Libur Akademik</th>
                <th>Tahun Ajaran</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#kalender-akademik-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('kalender_akademik.index') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'tanggal_mulai', name: 'tanggal_mulai' },
                { data: 'tanggal_selesai', name: 'tanggal_selesai' },
                { data: 'libur_akademik', name: 'libur_akademik' },
                { data: 'tahun_ajaran', name: 'tahun_ajaran' },
                { data: 'keterangan', name: 'keterangan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush
