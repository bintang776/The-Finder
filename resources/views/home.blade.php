@extends('layouts.app')
@section('title', 'The Finder - Cari Kost & Hunian Terbaik di Surabaya')

@section('content')
{{-- HERO --}}
<section class="hero">
    <div class="hero-content">
        <h1>Temukan <span>Hunian Impian</span> Dekat Kampusmu</h1>
        <p>Cari kost, kontrakan, dan rumah sewa terbaik di Surabaya dengan mudah dan cepat.</p>
        <form action="{{ route('properties.index') }}" method="GET" class="search-box">
            <input type="text" name="q" placeholder="Mau cari kost di area mana?" autocomplete="off">
            <button type="submit">🔍 Cari</button>
        </form>
    </div>
</section>

{{-- CATEGORIES --}}
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Kategori <span>Hunian</span></h2>
        </div>
        <div class="category-grid">
            @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="category-card">
                <div class="icon">{{ $category->icon }}</div>
                <h3>{{ $category->name }}</h3>
                <p>{{ $category->properties_count }} hunian</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- FEATURED --}}
@if($featuredProperties->count())
<section class="section" style="background: rgba(13,148,136,0.05);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">⭐ Rekomendasi <span>Terbaik</span></h2>
            <a href="{{ route('properties.index') }}" class="section-link">Lihat Semua →</a>
        </div>
        <div class="card-grid">
            @foreach($featuredProperties as $property)
                @include('partials.property-card', ['property' => $property])
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- PROMO --}}
@if($promoProperties->count())
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">🔥 Promo <span>Spesial</span></h2>
            <a href="{{ route('properties.index') }}" class="section-link">Lihat Semua →</a>
        </div>
        <div class="card-grid">
            @foreach($promoProperties as $property)
                @include('partials.property-card', ['property' => $property])
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CAMPUS AREAS --}}
<section class="section" style="background: rgba(13,148,136,0.05);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">🎓 Area <span>Kampus</span></h2>
            <a href="{{ route('campuses.index') }}" class="section-link">Lihat Semua →</a>
        </div>
        <div class="campus-grid">
            @foreach($campuses as $campus)
            <a href="{{ route('campuses.show', $campus->slug) }}" class="campus-card">
                <div class="campus-icon">🎓</div>
                <div>
                    <h3>{{ $campus->name }}</h3>
                    <p>{{ $campus->properties_count }} hunian tersedia</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ARTICLES --}}
@if($latestArticles->count())
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">📰 Artikel & <span>Tips</span></h2>
            <a href="{{ route('articles.index') }}" class="section-link">Lihat Semua →</a>
        </div>
        <div class="card-grid">
            @foreach($latestArticles as $article)
            <a href="{{ route('articles.show', $article->slug) }}" class="article-card">
                <div class="article-card-img">
                    <img src="{{ $article->cover_image ?? 'https://picsum.photos/seed/art/800/400' }}" alt="{{ $article->title }}">
                </div>
                <div class="article-card-body">
                    <h3>{{ $article->title }}</h3>
                    <p>{{ Str::limit($article->excerpt, 100) }}</p>
                    <span class="article-card-date">{{ $article->published_at->format('d M Y') }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
