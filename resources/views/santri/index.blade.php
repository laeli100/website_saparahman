@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Santri List</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('santri.create') }}" class="btn btn-primary mb-3">Tambah Santri</a>

        <table class="table table-bordered" id="santri-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Santri</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>NSM</th>
                    <th>NPSM</th>
                    <th>Tingkatan</th>
                    <th>Nama Kelas</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTable will populate this section dynamically -->
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#santri-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('santri.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_santri',
                        name: 'nama_santri'
                    },
                    {
                        data: 'nis',
                        name: 'nis'
                    },
                    {
                        data: 'nisn',
                        name: 'nisn'
                    },
                    {
                        data: 'nsm',
                        name: 'nsm'
                    },
                    {
                        data: 'npsm',
                        name: 'npsm'
                    },
                    {
                        data: 'tingkatan',
                        name: 'tingkatan'
                    },
                    {
                        data: 'nama_kelas',
                        name: 'nama_kelas'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
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
