@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Master Asas</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('master-asas.create') }}" class="btn btn-primary mb-3">Tambah Master Asas</a>

        <table class="table table-bordered" id="master-asas-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Asas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('#master-asas-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('master-asas.index') }}',
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'nama_asas',
                            name: 'nama_asas'
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
