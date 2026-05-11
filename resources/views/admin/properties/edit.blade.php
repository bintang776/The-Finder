@extends('layouts.admin')
@section('title', 'Edit Hunian')
@section('content')
<div class="admin-header"><h1>✏️ Edit Hunian</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.properties.update', $property) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-group"><label>Nama Hunian *</label><input type="text" name="name" value="{{ old('name', $property->name) }}" required></div>
        <div class="form-row">
            <div class="form-group"><label>Kategori *</label><select name="category_id" required>@foreach($categories as $cat)<option value="{{ $cat->id }}" {{ $property->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>@endforeach</select></div>
            <div class="form-group"><label>Area Kampus</label><select name="campus_id"><option value="">Pilih</option>@foreach($campuses as $campus)<option value="{{ $campus->id }}" {{ $property->campus_id == $campus->id ? 'selected' : '' }}>{{ $campus->name }}</option>@endforeach</select></div>
        </div>
        <div class="form-group"><label>Deskripsi *</label><textarea name="description" required>{{ old('description', $property->description) }}</textarea></div>
        <div class="form-group"><label>Alamat *</label><input type="text" name="address" value="{{ old('address', $property->address) }}" required></div>
        <div class="form-row">
            <div class="form-group"><label>Latitude</label><input type="number" step="any" name="latitude" value="{{ old('latitude', $property->latitude) }}"></div>
            <div class="form-group"><label>Longitude</label><input type="number" step="any" name="longitude" value="{{ old('longitude', $property->longitude) }}"></div>
        </div>
        <div class="form-row">
            <div class="form-group"><label>Harga Bulanan *</label><input type="number" name="price_monthly" value="{{ old('price_monthly', $property->price_monthly) }}" required></div>
            <div class="form-group"><label>Harga Tahunan</label><input type="number" name="price_yearly" value="{{ old('price_yearly', $property->price_yearly) }}"></div>
        </div>
        <div class="form-row">
            <div class="form-group"><label>Nama Pemilik *</label><input type="text" name="owner_name" value="{{ old('owner_name', $property->owner_name) }}" required></div>
            <div class="form-group"><label>No. WhatsApp *</label><input type="text" name="owner_phone" value="{{ old('owner_phone', $property->owner_phone) }}" required></div>
        </div>
        <div class="form-group"><label>Status *</label><select name="status"><option value="available" {{ $property->status == 'available' ? 'selected' : '' }}>Tersedia</option><option value="full" {{ $property->status == 'full' ? 'selected' : '' }}>Penuh</option><option value="inactive" {{ $property->status == 'inactive' ? 'selected' : '' }}>Nonaktif</option></select></div>
        <div class="form-row">
            <div class="form-group"><label><input type="checkbox" name="is_featured" value="1" {{ $property->is_featured ? 'checked' : '' }}> Rekomendasi</label></div>
            <div class="form-group"><label><input type="checkbox" name="is_promo" value="1" {{ $property->is_promo ? 'checked' : '' }}> Promo</label></div>
        </div>
        <div class="form-group">
            <label>Fasilitas</label>
            <div class="checkbox-group">
                @foreach($facilities as $fac)
                <label class="checkbox-item"><input type="checkbox" name="facilities[]" value="{{ $fac->id }}" {{ $property->facilities->contains($fac->id) ? 'checked' : '' }}> {{ $fac->icon }} {{ $fac->name }}</label>
                @endforeach
            </div>
        </div>
        <div class="form-group"><label>Tambah Foto Baru</label><input type="file" name="images[]" multiple accept="image/*" style="color: var(--text-muted);"></div>
        <button type="submit" class="btn btn-primary btn-lg">Update Hunian</button>
    </form>
</div>
@endsection
