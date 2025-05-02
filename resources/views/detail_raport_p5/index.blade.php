@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Detail Raport P5</h2>
        <a href="{{ route('detail-raport-p5.create') }}" class="btn btn-success mb-3">Tambah Detail Raport</a>

        <div class="mb-3">
            <label for="filter_id_raport">Filter berdasarkan ID Raport:</label>
            <select id="filter_id_raport" class="form-control" style="width: 200px;">
                <option value="">-- Semua --</option>
                @foreach ($raports as $raport)
                    <option value="{{ $raport->id }}">{{ $raport->id }}</option>
                @endforeach
            </select>
        </div>

        <table class="table table-bordered" id="detail-raport-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Raport</th>
                    <th>Judul</th>
                    <th>Foto</th>
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
            var table = $('#detail-raport-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('detail-raport-p5.index') }}',
                    data: function(d) {
                        d.id_raport = $('#filter_id_raport').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'id_raport', name: 'id_raport' },
                    { data: 'judul', name: 'judul' },
                    { data: 'foto', name: 'foto' },
                    { data: 'desk', name: 'desk' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            $('#filter_id_raport').change(function() {
                table.draw();
            });
        });
    </script>
@endpush
