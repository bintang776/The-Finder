@extends('layouts.admin')
@section('title', 'Kelola Kategori')
@section('content')
<div class="admin-header"><h1>📁 Kelola Kategori</h1><a href="{{ route('admin.categories.create') }}" class="btn btn-primary">+ Tambah</a></div>
<div class="sidebar-card" style="background: var(--bg-card);">
    <table class="admin-table"><thead><tr><th>Icon</th><th>Nama</th><th>Jumlah Hunian</th><th>Aksi</th></tr></thead><tbody>
        @foreach($categories as $cat)
        <tr><td>{{ $cat->icon }}</td><td>{{ $cat->name }}</td><td>{{ $cat->properties_count }}</td>
            <td class="actions"><a href="{{ route('admin.categories.edit', $cat) }}" class="btn btn-sm btn-outline">Edit</a>
            <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form></td></tr>
        @endforeach
    </tbody></table>
</div>
@endsection
