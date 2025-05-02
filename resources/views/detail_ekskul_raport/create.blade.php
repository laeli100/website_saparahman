@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Detail Ekskul Raport</h1>
    <form action="{{ route('detail_ekskul_raport.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="id_raport">ID Raport</label>
            <input type="text" class="form-control" id="id_raport" name="id_raport" required>
        </div>
        
        <div class="form-group">
            <label for="id_ekskul">ID Ekskul</label>
            <input type="text" class="form-control" id="id_ekskul" name="id_ekskul" required>
        </div>
        
        <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="text" class="form-control" id="nilai" name="nilai" required>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('detail_ekskul_raport.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection