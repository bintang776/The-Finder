@extends('layouts.admin')
@section('title', 'Edit Fasilitas')
@section('content')
<div class="admin-header"><h1>✏️ Edit Fasilitas</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.facilities.update', $facility) }}" method="POST">@csrf @method('PUT')
        <div class="form-group"><label>Nama *</label><input type="text" name="name" value="{{ $facility->name }}" required></div>
        <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $facility->icon }}"></div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
