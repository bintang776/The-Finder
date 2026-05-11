@extends('layouts.app')
@section('title', 'Cari Hunian - The Finder')

@section('content')
<section class="section" style="padding-top: 32px;">
    <div class="container">
        <h1 class="section-title" style="margin-bottom: 24px;">🔍 Cari <span>Hunian</span></h1>

        <form action="{{ route('properties.index') }}" method="GET" class="filters-bar">
            <div class="filter-group" style="flex: 2;">
                <label>Kata Kunci</label>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama atau alamat...">
            </div>
            <div class="filter-group">
                <label>Kategori</label>
                <select name="category">
                    <option value="">Semua</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-group">
                <label>Area Kampus</label>
                <select name="campus">
                    <option value="">Semua</option>
                    @foreach($campuses as $campus)
                        <option value="{{ $campus->slug }}" {{ request('campus') == $campus->slug ? 'selected' : '' }}>{{ $campus->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-group">
                <label>Urutkan</label>
                <select name="sort">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                </select>
            </div>
            <div class="filter-group" style="flex: 0;">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>

        @if($properties->count())
            <div class="card-grid">
                @foreach($properties as $property)
                    @include('partials.property-card', ['property' => $property])
                @endforeach
            </div>
            <div class="pagination">{{ $properties->links() }}</div>
        @else
            <div style="text-align: center; padding: 60px 0; color: var(--text-muted);">
                <p style="font-size: 3rem; margin-bottom: 16px;">🏚️</p>
                <h3>Hunian tidak ditemukan</h3>
                <p>Coba ubah filter pencarian Anda</p>
            </div>
        @endif
    </div>
</section>
@endsection
