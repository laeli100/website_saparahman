@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Pengumuman</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary mb-3">Tambah Pengumuman</a>

        <table class="table table-bordered" id="pengumuman-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('#pengumuman-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('pengumuman.index') }}',
                    columns: [
                        {
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
                            data: 'desk',
                            name: 'desk'
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
