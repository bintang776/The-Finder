@extends('layouts.admin')
@section('title', 'Tambah Fasilitas')
@section('content')
<div class="admin-header"><h1>+ Tambah Fasilitas</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.facilities.store') }}" method="POST">@csrf
        <div class="form-group"><label>Nama *</label><input type="text" name="name" required></div>
        <div class="form-group"><label>Icon (emoji)</label><input type="text" name="icon" placeholder="❄️"></div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
