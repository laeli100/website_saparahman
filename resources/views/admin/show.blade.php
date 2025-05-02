@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Admin</h1>
    <p><strong>Nama:</strong> {{ $admin->nama_admin }}</p>
    <p><strong>Username:</strong> {{ $admin->username }}</p>
    <p><strong>Email:</strong> {{ $admin->email }}</p>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
