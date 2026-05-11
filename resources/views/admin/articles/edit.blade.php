@extends('layouts.admin')
@section('title', 'Edit Artikel')
@section('content')
<div class="admin-header"><h1>✏️ Edit Artikel</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
        <div class="form-group"><label>Judul *</label><input type="text" name="title" value="{{ $article->title }}" required></div>
        <div class="form-group"><label>Ringkasan *</label><textarea name="excerpt" style="min-height: 80px;" required>{{ $article->excerpt }}</textarea></div>
        <div class="form-group"><label>Isi Artikel (HTML) *</label><textarea name="body" style="min-height: 300px;" required>{{ $article->body }}</textarea></div>
        <div class="form-group"><label>Cover Image Baru</label><input type="file" name="cover_image_file" accept="image/*" style="color: var(--text-muted);"></div>
        <div class="form-group"><label><input type="checkbox" name="is_published" value="1" {{ $article->is_published ? 'checked' : '' }}> Published</label></div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
