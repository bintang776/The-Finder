@extends('layouts.app')
@section('title', $property->name . ' - The Finder')
@section('description', Str::limit($property->description, 160))

@section('content')
<div class="detail-header">
    <div class="container">
        <div class="detail-breadcrumb">
            <a href="{{ route('home') }}">Beranda</a> /
            <a href="{{ route('categories.show', $property->category->slug) }}">{{ $property->category->name }}</a> /
            {{ $property->name }}
        </div>
        <h1 class="detail-title">{{ $property->name }}</h1>
        <p class="detail-address">📍 {{ $property->address }}</p>
    </div>
</div>

<div class="container">
    <div class="detail-content">
        <div class="detail-main">
            {{-- Gallery --}}
            <div class="gallery">
                <div class="gallery-main">
                    <img id="mainImage" src="{{ $property->images->first()?->image_path ?? 'https://picsum.photos/seed/'.$property->id.'/800/600' }}" alt="{{ $property->name }}">
                </div>
                @if($property->images->count() > 1)
                <div class="gallery-thumbs">
                    @foreach($property->images as $i => $img)
                    <div class="gallery-thumb {{ $i === 0 ? 'active' : '' }}" onclick="changeImage(this, '{{ $img->image_path }}')">
                        <img src="{{ $img->image_path }}" alt="{{ $img->caption }}">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Description --}}
            <div class="detail-section">
                <h2>📝 Deskripsi</h2>
                <div class="detail-description">{{ $property->description }}</div>
            </div>

            {{-- Facilities --}}
            <div class="detail-section">
                <h2>✨ Fasilitas</h2>
                <div class="facilities-grid">
                    @foreach($property->facilities as $facility)
                    <div class="facility-item">
                        <span class="f-icon">{{ $facility->icon }}</span>
                        <span>{{ $facility->name }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Map --}}
            @if($property->latitude && $property->longitude)
            <div class="detail-section">
                <h2>📍 Lokasi</h2>
                <div class="map-container">
                    <iframe src="https://maps.google.com/maps?q={{ $property->latitude }},{{ $property->longitude }}&z=15&output=embed" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="detail-sidebar">
            <div class="sidebar-card">
                <div class="sidebar-price">{{ $property->formatted_price }} <span class="sidebar-price-period">/ bulan</span></div>
                @if($property->formatted_yearly_price)
                    <div class="sidebar-yearly">{{ $property->formatted_yearly_price }} / tahun</div>
                @endif

                <div class="sidebar-owner">
                    <div class="sidebar-owner-avatar">{{ substr($property->owner_name, 0, 1) }}</div>
                    <div>
                        <div class="sidebar-owner-name">{{ $property->owner_name }}</div>
                        <div class="sidebar-owner-label">Pemilik Kost</div>
                    </div>
                </div>

                <a href="{{ $property->whatsapp_url }}" target="_blank" class="btn btn-whatsapp btn-block btn-lg">
                    💬 Hubungi via WhatsApp
                </a>
            </div>

            <div class="sidebar-card">
                <h4 style="margin-bottom: 12px; font-size: 0.9rem;">Info Hunian</h4>
                <table style="width: 100%; font-size: 0.85rem;">
                    <tr><td style="color: var(--text-muted); padding: 6px 0;">Kategori</td><td style="text-align: right; padding: 6px 0;">{{ $property->category->name }}</td></tr>
                    @if($property->campus)
                    <tr><td style="color: var(--text-muted); padding: 6px 0;">Area Kampus</td><td style="text-align: right; padding: 6px 0;">{{ $property->campus->name }}</td></tr>
                    @endif
                    <tr><td style="color: var(--text-muted); padding: 6px 0;">Status</td><td style="text-align: right; padding: 6px 0; color: var(--success);">✅ Tersedia</td></tr>
                </table>
            </div>
        </div>
    </div>

    {{-- Related --}}
    @if($relatedProperties->count())
    <section class="section" style="padding: 0 0 60px;">
        <div class="section-header"><h2 class="section-title">Hunian <span>Serupa</span></h2></div>
        <div class="card-grid">
            @foreach($relatedProperties as $prop)
                @include('partials.property-card', ['property' => $prop])
            @endforeach
        </div>
    </section>
    @endif
</div>
@endsection

@section('scripts')
<script>
function changeImage(thumb, src) {
    document.getElementById('mainImage').src = src;
    document.querySelectorAll('.gallery-thumb').forEach(t => t.classList.remove('active'));
    thumb.classList.add('active');
}
</script>
@endsection
