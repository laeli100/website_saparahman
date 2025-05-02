@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Detail Nilai Raport</h2>
        <a href="{{ route('detail-nilai-raport.create') }}" class="btn btn-success mb-3">Tambah Detail Nilai Raport</a>

        <table class="table table-bordered" id="detail-nilai-raport-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Raport</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Deskripsi</th>
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
            $('#detail-nilai-raport-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('detail-nilai-raport.index') }}', // URL untuk mengambil data
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, // Kolom nomor urut
                    {
                        data: 'raport_santri', // Menampilkan semester raport
                        name: 'raport_santri'
                    },
                    {
                        data: 'mapel', // Menampilkan nama mata pelajaran
                        name: 'mapel'
                    },
                    {
                        data: 'nilai',
                        name: 'nilai'
                    },
                    {
                        data: 'desk',
                        name: 'desk'
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
