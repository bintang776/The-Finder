@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="admin-header">
    <h1>📊 Dashboard</h1>
    <p style="color: var(--text-muted);">Selamat datang, {{ auth()->user()->name }}!</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">{{ $stats['properties'] }}</div>
        <div class="stat-label">Total Hunian</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $stats['categories'] }}</div>
        <div class="stat-label">Kategori</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $stats['campuses'] }}</div>
        <div class="stat-label">Kampus</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">{{ $stats['articles'] }}</div>
        <div class="stat-label">Artikel</div>
    </div>
    <div class="stat-card">
        <div class="stat-number" style="color: var(--accent);">{{ $stats['contacts_unread'] }}</div>
        <div class="stat-label">Pesan Baru</div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <div class="sidebar-card" style="background: var(--bg-card);">
        <h3 style="margin-bottom: 16px;">Hunian Terbaru</h3>
        @foreach($latestProperties as $prop)
        <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid var(--border); font-size: 0.88rem;">
            <span>{{ $prop->name }}</span>
            <span style="color: var(--text-muted);">{{ $prop->category->name }}</span>
        </div>
        @endforeach
    </div>
    <div class="sidebar-card" style="background: var(--bg-card);">
        <h3 style="margin-bottom: 16px;">Pesan Baru</h3>
        @forelse($latestContacts as $contact)
        <div style="padding: 8px 0; border-bottom: 1px solid var(--border); font-size: 0.88rem;">
            <strong>{{ $contact->name }}</strong> — {{ $contact->kost_name }}
            <div style="color: var(--text-muted); font-size: 0.8rem;">{{ $contact->created_at->diffForHumans() }}</div>
        </div>
        @empty
        <p style="color: var(--text-muted);">Tidak ada pesan baru</p>
        @endforelse
    </div>
</div>
@endsection
