@extends('layouts.admin')
@section('title', 'Tambah Kampus')
@section('content')
<div class="admin-header"><h1>+ Tambah Kampus</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.campuses.store') }}" method="POST">@csrf
        <div class="form-group"><label>Nama *</label><input type="text" name="name" required></div>
        <div class="form-group"><label>Alamat</label><input type="text" name="address"></div>
        <div class="form-row">
            <div class="form-group"><label>Latitude</label><input type="number" step="any" name="latitude"></div>
            <div class="form-group"><label>Longitude</label><input type="number" step="any" name="longitude"></div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
