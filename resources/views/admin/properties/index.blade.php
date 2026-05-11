@extends('layouts.admin')
@section('title', 'Kelola Hunian')
@section('content')
<div class="admin-header">
    <h1>🏠 Kelola Hunian</h1>
    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">+ Tambah Hunian</a>
</div>
<div class="sidebar-card" style="background: var(--bg-card); overflow-x: auto;">
    <table class="admin-table">
        <thead><tr><th>Nama</th><th>Kategori</th><th>Harga</th><th>Status</th><th>Verifikasi</th><th>Aksi</th></tr></thead>
        <tbody>
            @foreach($properties as $prop)
            <tr>
                <td><strong>{{ $prop->name }}</strong><br><small style="color: var(--text-muted);">{{ Str::limit($prop->address, 30) }}</small></td>
                <td>{{ $prop->category->name }}</td>
                <td style="color: var(--accent);">Rp {{ number_format($prop->price_monthly, 0, ',', '.') }}</td>
                <td><span style="color: {{ $prop->status === 'available' ? 'var(--success)' : 'var(--danger)' }};">{{ ucfirst($prop->status) }}</span></td>
                <td>
                    @if(!$prop->is_verified)
                        <form action="{{ route('admin.properties.verify', $prop) }}" method="POST">@csrf @method('PATCH')<button class="btn btn-sm btn-success">Verifikasi</button></form>
                    @else
                        <span style="color: var(--success);">Verified</span>
                    @endif
                </td>
                <td class="actions">
                    <a href="{{ route('admin.properties.edit', $prop) }}" class="btn btn-sm btn-outline">Edit</a>
                    <form action="{{ route('admin.properties.destroy', $prop) }}" method="POST" onsubmit="return confirm('Hapus hunian ini?')">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Hapus</button></form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">{{ $properties->links() }}</div>
</div>
@endsection
