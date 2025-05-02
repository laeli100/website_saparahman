@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Detail Ekskul Raport</h3>
    <a href="{{ route('detail_ekskul_raport.create') }}" class="btn btn-success mb-3">Tambah Data</a>
    <table class="table table-bordered" id="raport-table">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Raport</th>
                <th>ID Ekskul</th>
                <th>Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#raport-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('detail_ekskul_raport.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'id_raport',
                    name: 'id_raport'
                },
                {
                    data: 'id_ekskul',
                    name: 'id_ekskul'
                },
                {
                    data: 'nilai',
                    name: 'nilai'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>
@endpush