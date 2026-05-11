@extends('layouts.admin')
@section('title', 'Edit Kategori')
@section('content')
<div class="admin-header"><h1>✏️ Edit Kategori</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">@csrf @method('PUT')
        <div class="form-group"><label>Nama *</label><input type="text" name="name" value="{{ $category->name }}" required></div>
        <div class="form-group"><label>Icon</label><input type="text" name="icon" value="{{ $category->icon }}"></div>
        <div class="form-group"><label>Deskripsi</label><textarea name="description">{{ $category->description }}</textarea></div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
