@extends('layouts.admin')
@section('title', 'Kelola Artikel')
@section('content')
<div class="admin-header"><h1>📰 Kelola Artikel</h1><a href="{{ route('admin.articles.create') }}" class="btn btn-primary">+ Tambah</a></div>
<div class="sidebar-card" style="background: var(--bg-card); overflow-x: auto;">
    <table class="admin-table"><thead><tr><th>Judul</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead><tbody>
        @foreach($articles as $a)
        <tr><td>{{ $a->title }}</td>
            <td><span style="color: {{ $a->is_published ? 'var(--success)' : 'var(--warning)' }};">{{ $a->is_published ? 'Published' : 'Draft' }}</span></td>
            <td style="color: var(--text-muted);">{{ $a->created_at->format('d M Y') }}</td>
            <td class="actions"><a href="{{ route('admin.articles.edit', $a) }}" class="btn btn-sm btn-outline">Edit</a>
            <form action="{{ route('admin.articles.destroy', $a) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form></td></tr>
        @endforeach
    </tbody></table>
    <div class="pagination">{{ $articles->links() }}</div>
</div>
@endsection
