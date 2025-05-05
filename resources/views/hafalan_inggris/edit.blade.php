@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Hafalan Inggris</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('hafalan-inggris.update', $hafalanInggris->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_santri" class="form-label">Santri</label>
            <select name="id_santri" class="form-control">
                @foreach($santriList as $santri)
                    <option value="{{ $santri->id }}" {{ $hafalanInggris->id_santri == $santri->id ? 'selected' : '' }}>
                        {{ $santri->nama_santri }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_inggris" class="form-label">Subjek</label>
            <select name="id_inggris" class="form-control">
                @foreach($inggrisList as $inggris)
                    <option value="{{ $inggris->id }}" {{ $hafalanInggris->id_inggris == $inggris->id ? 'selected' : '' }}>
                        {{ $inggris->subjek }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_setoran" class="form-label">Tanggal Setoran</label>
            <input type="date" class="form-control" name="tgl_setoran" value="{{ $hafalanInggris->tgl_setoran }}">
        </div>

        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai</label>
            <select name="nilai" class="form-control" required>
                @foreach($nilaiOptions as $nilai)
                    <option value="{{ $nilai }}" {{ $hafalanInggris->nilai == $nilai ? 'selected' : '' }}>{{ $nilai }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('hafalan-inggris.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
