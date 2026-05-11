@extends('layouts.app')
@section('title', $article->title . ' - The Finder')

@section('content')
<article class="section" style="padding-top: 32px;">
    <div class="container" style="max-width: 800px;">
        <div class="detail-breadcrumb" style="margin-bottom: 16px;">
            <a href="{{ route('home') }}">Beranda</a> / <a href="{{ route('articles.index') }}">Artikel</a> / {{ $article->title }}
        </div>

        @if($article->cover_image)
        <div style="border-radius: var(--radius); overflow: hidden; margin-bottom: 24px; height: 360px;">
            <img src="{{ $article->cover_image }}" alt="{{ $article->title }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        @endif

        <h1 style="font-size: 2rem; font-weight: 800; margin-bottom: 12px;">{{ $article->title }}</h1>
        <p style="color: var(--text-muted); margin-bottom: 32px; font-size: 0.9rem;">
            ✍️ {{ $article->user->name }} · {{ $article->published_at->format('d M Y') }}
        </p>

        <div class="detail-description" style="line-height: 1.9; font-size: 1rem;">
            {!! $article->body !!}
        </div>
    </div>
</article>

@if($relatedArticles->count())
<section class="section" style="background: rgba(13,148,136,0.05);">
    <div class="container">
        <h2 class="section-title" style="margin-bottom: 24px;">Artikel <span>Lainnya</span></h2>
        <div class="card-grid">
            @foreach($relatedArticles as $related)
            <a href="{{ route('articles.show', $related->slug) }}" class="article-card">
                <div class="article-card-img">
                    <img src="{{ $related->cover_image ?? 'https://picsum.photos/seed/art'.$related->id.'/800/400' }}" alt="{{ $related->title }}">
                </div>
                <div class="article-card-body">
                    <h3>{{ $related->title }}</h3>
                    <p>{{ Str::limit($related->excerpt, 100) }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
