@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Data Mading</h2>
        <a href="{{ route('mading.create') }}" class="btn btn-success mb-3">Tambah</a>
        <table class="table table-bordered" id="mading-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>ID Kategori</th>
                    <th>ID Asas</th>
                    <th>Gambar</th> 
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
            $('#mading-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('mading.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'id_asas',
                        name: 'id_asas'
                    },
                    {
                        data: 'id_kategori_mading',
                        name: 'id_kategori_mading'
                    },
                    {
                        data: 'gambar',
                        name: 'gambar'
                    },
                    {
                        data: 'gambaran_deskripsi',
                        name: 'gambaran_deskripsi'
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
                    url: '/mading/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#mading-table').DataTable().ajax.reload();
                        alert(response.success);
                    }
                });
            }
        }
    </script>
@endpush
