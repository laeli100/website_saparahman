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
                    <th>NISN</th>
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
            // Initialize the DataTable
            $('#santri-table').DataTable({
                processing: true, // Show loading indicator
                serverSide: true, // Enable server-side processing
                ajax: '{{ route('santri.index') }}', // Fetch data from the server
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    }, // Row index for numbering
                    {
                        data: 'nama_santri',
                        name: 'nama_santri'
                    },
                    {
                        data: 'nisn',
                        name: 'nisn'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }, // Action buttons (view, edit, delete)
                ]
            });
        });
    </script>
@endpush
