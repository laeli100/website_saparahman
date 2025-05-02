@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Admin</h1>
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_admin" class="form-label">Nama</label>
            <input type="text" name="nama_admin" class="form-control" value="{{ old('nama_admin') }}">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value="{{ old('username') }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" name="password" class="form-control" value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
