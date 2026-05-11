@extends('layouts.admin')
@section('title', 'Kelola Kampus')
@section('content')
<div class="admin-header"><h1>🎓 Kelola Kampus</h1><a href="{{ route('admin.campuses.create') }}" class="btn btn-primary">+ Tambah</a></div>
<div class="sidebar-card" style="background: var(--bg-card);">
    <table class="admin-table"><thead><tr><th>Nama</th><th>Alamat</th><th>Hunian</th><th>Aksi</th></tr></thead><tbody>
        @foreach($campuses as $c)
        <tr><td>{{ $c->name }}</td><td style="color: var(--text-muted);">{{ Str::limit($c->address, 30) }}</td><td>{{ $c->properties_count }}</td>
            <td class="actions"><a href="{{ route('admin.campuses.edit', $c) }}" class="btn btn-sm btn-outline">Edit</a>
            <form action="{{ route('admin.campuses.destroy', $c) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form></td></tr>
        @endforeach
    </tbody></table>
</div>
@endsection
