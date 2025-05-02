@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kategori Mading</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('kategori-mading.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    <table class="table table-bordered" id="kategori-mading-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

@push('scripts')
    <script>
        $(function() {
            $('#kategori-mading-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('kategori-mading.index') }}',
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
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
