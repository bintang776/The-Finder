@extends('layouts.admin')
@section('title', 'Pesan Masuk')
@section('content')
<div class="admin-header"><h1>📬 Pesan Masuk (Pendaftaran Kost)</h1></div>
<div class="sidebar-card" style="background: var(--bg-card); overflow-x: auto;">
    <table class="admin-table"><thead><tr><th>Nama</th><th>Nama Kost</th><th>Telepon</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
        @foreach($contacts as $c)
        <tr style="{{ !$c->is_read ? 'font-weight: 600;' : '' }}">
            <td>{{ $c->name }}</td><td>{{ $c->kost_name }}</td><td>{{ $c->phone }}</td>
            <td style="color: var(--text-muted);">{{ $c->created_at->format('d M Y') }}</td>
            <td><span style="color: {{ $c->is_read ? 'var(--success)' : 'var(--warning)' }};">{{ $c->is_read ? 'Dibaca' : 'Baru' }}</span></td>
            <td class="actions">
                <a href="{{ route('admin.contacts.show', $c) }}" class="btn btn-sm btn-outline">Lihat</a>
                <form action="{{ route('admin.contacts.destroy', $c) }}" method="POST" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form>
            </td>
        </tr>
        @endforeach
    </tbody></table>
    <div class="pagination">{{ $contacts->links() }}</div>
</div>
@endsection
