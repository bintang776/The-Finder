@extends('layouts.app')
@section('title', 'Dashboard Saya - The Finder')

@section('content')
<section class="section" style="padding-top: 32px; min-height: 70vh;">
    <div class="container">
        <div class="section-header">
            <h1 class="section-title">Kost <span>Saya</span></h1>
            <a href="{{ route('user.properties.create') }}" class="btn btn-primary">+ Tambah Kost Baru</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success" style="margin-bottom: 24px;">{{ session('success') }}</div>
        @endif

        @if($properties->count())
            <div class="card-grid">
                @foreach($properties as $property)
                <div class="property-card" style="display: flex; flex-direction: column;">
                    <div class="property-card-img">
                        <img src="{{ $property->primaryImage?->image_path ?? 'https://picsum.photos/seed/'.$property->id.'/800/600' }}" alt="{{ $property->name }}">
                        @if($property->is_verified)
                            <span class="property-card-badge badge-promo" style="background: var(--success);">✅ Terverifikasi</span>
                        @else
                            <span class="property-card-badge" style="background: var(--warning); color: #000;">⏳ Menunggu Review</span>
                        @endif
                    </div>
                    <div class="property-card-body" style="flex: 1;">
                        <h3>{{ $property->name }}</h3>
                        <div class="property-card-location">📍 {{ Str::limit($property->address, 40) }}</div>
                        <div class="property-card-footer" style="margin-top: auto; padding-top: 16px;">
                            <div class="property-price">{{ $property->formatted_price }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination">{{ $properties->links() }}</div>
        @else
            <div style="text-align: center; padding: 60px 0; background: var(--bg-card); border-radius: var(--radius-lg); border: 1px dashed var(--border);">
                <p style="font-size: 3rem; margin-bottom: 16px;">🏠</p>
                <h3>Belum Ada Kost yang Didaftarkan</h3>
                <p style="color: var(--text-muted); margin-bottom: 24px;">Ayo daftarkan kost atau kontrakanmu sekarang juga.</p>
                <a href="{{ route('user.properties.create') }}" class="btn btn-primary">Daftarkan Kost</a>
            </div>
        @endif
    </div>
</section>
@endsection
