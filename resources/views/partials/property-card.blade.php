<a href="{{ route('properties.show', $property->slug) }}" class="property-card">
    <div class="property-card-img">
        <img src="{{ $property->primaryImage?->image_path ?? 'https://picsum.photos/seed/'.$property->id.'/800/600' }}" alt="{{ $property->name }}" loading="lazy">
        @if($property->is_featured)
            <span class="property-card-badge badge-featured">⭐ Rekomendasi</span>
        @elseif($property->is_promo)
            <span class="property-card-badge badge-promo">🔥 Promo</span>
        @endif
        <span class="badge-category">{{ $property->category->name }}</span>
    </div>
    <div class="property-card-body">
        <h3>{{ $property->name }}</h3>
        <div class="property-card-location">📍 {{ Str::limit($property->address, 40) }}</div>
        <div class="property-card-facilities">
            @foreach($property->facilities->take(4) as $facility)
                <span class="facility-tag">{{ $facility->icon }} {{ $facility->name }}</span>
            @endforeach
            @if($property->facilities->count() > 4)
                <span class="facility-tag">+{{ $property->facilities->count() - 4 }}</span>
            @endif
        </div>
        <div class="property-card-footer">
            <div class="property-price">{{ $property->formatted_price }} <small>/bulan</small></div>
        </div>
    </div>
</a>
