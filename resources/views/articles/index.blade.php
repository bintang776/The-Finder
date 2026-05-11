@extends('layouts.app')
@section('title', 'Artikel & Tips - The Finder')

@section('content')
<section class="section" style="padding-top: 32px;">
    <div class="container">
        <h1 class="section-title" style="margin-bottom: 8px;">📰 Artikel & <span>Tips</span></h1>
        <p style="color: var(--text-muted); margin-bottom: 32px;">Bacaan ringan seputar dunia kost dan kehidupan mahasiswa</p>

        @if($articles->count())
            <div class="card-grid">
                @foreach($articles as $article)
                <a href="{{ route('articles.show', $article->slug) }}" class="article-card">
                    <div class="article-card-img">
                        <img src="{{ $article->cover_image ?? 'https://picsum.photos/seed/art'.$article->id.'/800/400' }}" alt="{{ $article->title }}" loading="lazy">
                    </div>
                    <div class="article-card-body">
                        <h3>{{ $article->title }}</h3>
                        <p>{{ Str::limit($article->excerpt, 120) }}</p>
                        <span class="article-card-date">{{ $article->published_at->format('d M Y') }}</span>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="pagination">{{ $articles->links() }}</div>
        @else
            <div style="text-align: center; padding: 60px 0; color: var(--text-muted);">
                <p style="font-size: 3rem;">📝</p>
                <h3>Belum ada artikel</h3>
            </div>
        @endif
    </div>
</section>
@endsection
