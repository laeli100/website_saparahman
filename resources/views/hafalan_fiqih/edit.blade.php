@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Hafalan Fiqih</h2>

    <form action="{{ route('hafalan-fiqih.update', $hafalanFiqih->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id_santri">Santri</label>
            <select name="id_santri" class="form-control" required>
                @foreach($santriList as $santri)
                    <option value="{{ $santri->id }}" {{ $santri->id == $hafalanFiqih->id_santri ? 'selected' : '' }}>
                        {{ $santri->nama_santri }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_fiqih">Jenis Fiqih</label>
            <select name="id_fiqih" class="form-control" required>
                @foreach($fiqihList as $fiqih)
                    <option value="{{ $fiqih->id }}" {{ $fiqih->id == $hafalanFiqih->id_fiqih ? 'selected' : '' }}>
                        {{ $fiqih->jenis_fiqih }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_setoran">Tanggal Setoran</label>
            <input type="date" name="tgl_setoran" value="{{ $hafalanFiqih->tgl_setoran }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nilai">Nilai</label>
            <select name="nilai" class="form-control" required>
                @foreach($nilaiOptions as $nilai)
                    <option value="{{ $nilai }}" {{ $nilai == $hafalanFiqih->nilai ? 'selected' : '' }}>
                        {{ $nilai }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Update</button>
        <a href="{{ route('hafalan-fiqih.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
