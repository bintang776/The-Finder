@extends('layouts.admin')
@section('title', 'Edit Kampus')
@section('content')
<div class="admin-header"><h1>✏️ Edit Kampus</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.campuses.update', $campus) }}" method="POST">@csrf @method('PUT')
        <div class="form-group"><label>Nama *</label><input type="text" name="name" value="{{ $campus->name }}" required></div>
        <div class="form-group"><label>Alamat</label><input type="text" name="address" value="{{ $campus->address }}"></div>
        <div class="form-row">
            <div class="form-group"><label>Latitude</label><input type="number" step="any" name="latitude" value="{{ $campus->latitude }}"></div>
            <div class="form-group"><label>Longitude</label><input type="number" step="any" name="longitude" value="{{ $campus->longitude }}"></div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
