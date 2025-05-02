@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Raport</h2>
        <a href="{{ route('raport.create') }}" class="btn btn-success mb-3">Tambah Raport</a>

        <table class="table table-bordered" id="raport-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Santri</th>
                    <th>ID Guru</th>
                    <th>ID Kelas</th>
                    <th>Semester</th>
                    <th>Aksi</th>
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
            $('#raport-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('raport.index') }}', // URL untuk mengambil data
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, // Kolom nomor urut
                    {
                        data: 'id_santri',
                        name: 'id_santri'
                    },
                    {
                        data: 'id_guru',
                        name: 'id_guru'
                    },
                    {
                        data: 'id_kelas',
                        name: 'id_kelas'
                    },
                    {
                        data: 'semester',
                        name: 'semester'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    } // Kolom aksi
                ]
            });
        });
    </script>
@endpush
