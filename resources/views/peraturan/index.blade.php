@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Peraturan</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('peraturan.create') }}" class="btn btn-primary mb-3">Tambah Peraturan</a>

        <table class="table table-bordered" id="peraturan-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peraturan</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('#peraturan-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('peraturan.index') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nama_peraturan',
                            name: 'nama_peraturan'
                        },
                        {
                            data: 'file',
                            name: 'file',
                            orderable: false,
                            searchable: false
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
@endsection
