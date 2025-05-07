@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Data Kandungan Mading</h2>
        <a href="{{ route('kandungan-mading.create') }}" class="btn btn-success mb-3">Tambah Kandungan Mading</a>
        <table class="table table-bordered" id="kandungan-mading-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Asas</th>
                    <th>Nama Guru Pengampu</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>Gambaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#kandungan-mading-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kandungan-mading.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id_asas',
                        name: 'id_asas'
                    },
                    {
                        data: 'nama_pengampu',
                        name: 'nama_pengampu'
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'file',
                        name: 'file',
                       

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
                    }
                ]
            });
        });

        function deleteData(id) {
            if (confirm('Yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: '/kandungan-mading/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#kandungan-mading-table').DataTable().ajax.reload();
                        alert(response.success);
                    }
                });
            }
        }
    </script>
@endpush
