@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Ekskul</h2>

        <a href="{{ route('master_ekskul.create') }}" class="btn btn-success mb-3">Tambah Ekskul</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Table for displaying data -->
        <table class="table table-bordered" id="eksulTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ekskul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- DataTable will populate this tbody dynamically -->
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#eksulTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('master_ekskul.index') }}', // Route to your controller method for AJAX
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_ekskul',
                        name: 'nama_ekskul'
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
