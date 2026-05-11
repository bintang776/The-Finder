@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('content')
<div class="admin-header"><h1>+ Tambah Kategori</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.categories.store') }}" method="POST">@csrf
        <div class="form-group"><label>Nama *</label><input type="text" name="name" required></div>
        <div class="form-group"><label>Icon (emoji)</label><input type="text" name="icon" placeholder="🏠"></div>
        <div class="form-group"><label>Deskripsi</label><textarea name="description"></textarea></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
