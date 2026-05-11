@extends('layouts.admin')
@section('title', 'Kelola Fasilitas')
@section('content')
<div class="admin-header"><h1>✨ Kelola Fasilitas</h1><a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">+ Tambah</a></div>
<div class="sidebar-card" style="background: var(--bg-card);">
    <table class="admin-table"><thead><tr><th>Icon</th><th>Nama</th><th>Dipakai</th><th>Aksi</th></tr></thead><tbody>
        @foreach($facilities as $f)
        <tr><td>{{ $f->icon }}</td><td>{{ $f->name }}</td><td>{{ $f->properties_count }} hunian</td>
            <td class="actions"><a href="{{ route('admin.facilities.edit', $f) }}" class="btn btn-sm btn-outline">Edit</a>
            <form action="{{ route('admin.facilities.destroy', $f) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form></td></tr>
        @endforeach
    </tbody></table>
</div>
@endsection
