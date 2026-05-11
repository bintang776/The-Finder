@extends('layouts.app')
@section('title', $category->name . ' - The Finder')

@section('content')
<section class="section" style="padding-top: 32px;">
    <div class="container">
        <h1 class="section-title" style="margin-bottom: 8px;">{{ $category->icon }} {{ $category->name }}</h1>
        @if($category->description)
            <p style="color: var(--text-muted); margin-bottom: 24px;">{{ $category->description }}</p>
        @endif

        @if($properties->count())
            <div class="card-grid">
                @foreach($properties as $property)
                    @include('partials.property-card', ['property' => $property])
                @endforeach
            </div>
            <div class="pagination">{{ $properties->links() }}</div>
        @else
            <div style="text-align: center; padding: 60px 0; color: var(--text-muted);">
                <p style="font-size: 3rem;">🏚️</p>
                <h3>Belum ada hunian di kategori ini</h3>
            </div>
        @endif
    </div>
</section>
@endsection
