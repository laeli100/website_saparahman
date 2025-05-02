@extends('layouts.app')

@section('content')
    <h2>Daftar Guru</h2>
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>
    <table class="table table-bordered" id="guruTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Username</th>
                <th>Email</th>
                <th>ID Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#guruTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('guru.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_guru',
                        name: 'nama_guru'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'kelas_name',
                        name: 'kelas_name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endpush
