@extends('layouts.app')
@section('title', 'Area Kampus - The Finder')

@section('content')
<section class="section" style="padding-top: 32px;">
    <div class="container">
        <h1 class="section-title" style="margin-bottom: 8px;">🎓 Area <span>Kampus</span></h1>
        <p style="color: var(--text-muted); margin-bottom: 32px;">Pilih kampus untuk menemukan hunian terdekat</p>
        <div class="campus-grid">
            @foreach($campuses as $campus)
            <a href="{{ route('campuses.show', $campus->slug) }}" class="campus-card">
                <div class="campus-icon">🎓</div>
                <div>
                    <h3>{{ $campus->name }}</h3>
                    <p>{{ $campus->properties_count }} hunian tersedia</p>
                    @if($campus->address)
                        <p style="margin-top: 4px;">📍 {{ Str::limit($campus->address, 40) }}</p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
