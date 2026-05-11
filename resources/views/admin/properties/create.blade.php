@extends('layouts.admin')
@section('title', 'Tambah Hunian')
@section('content')
<div class="admin-header"><h1>+ Tambah Hunian</h1></div>
<div class="sidebar-card admin-form" style="background: var(--bg-card);">
    <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group"><label>Nama Hunian *</label><input type="text" name="name" value="{{ old('name') }}" required>@error('name')<div class="form-error">{{ $message }}</div>@enderror</div>
        <div class="form-row">
            <div class="form-group"><label>Kategori *</label><select name="category_id" required><option value="">Pilih</option>@foreach($categories as $cat)<option value="{{ $cat->id }}">{{ $cat->name }}</option>@endforeach</select></div>
            <div class="form-group"><label>Area Kampus</label><select name="campus_id"><option value="">Pilih</option>@foreach($campuses as $campus)<option value="{{ $campus->id }}">{{ $campus->name }}</option>@endforeach</select></div>
        </div>
        <div class="form-group"><label>Deskripsi *</label><textarea name="description" required>{{ old('description') }}</textarea></div>
        <div class="form-group"><label>Alamat *</label><input type="text" name="address" value="{{ old('address') }}" required></div>
        <div class="form-row">
            <div class="form-group"><label>Latitude</label><input type="number" step="any" name="latitude" value="{{ old('latitude') }}"></div>
            <div class="form-group"><label>Longitude</label><input type="number" step="any" name="longitude" value="{{ old('longitude') }}"></div>
        </div>
        <div class="form-row">
            <div class="form-group"><label>Harga Bulanan (Rp) *</label><input type="number" name="price_monthly" value="{{ old('price_monthly') }}" required></div>
            <div class="form-group"><label>Harga Tahunan (Rp)</label><input type="number" name="price_yearly" value="{{ old('price_yearly') }}"></div>
        </div>
        <div class="form-row">
            <div class="form-group"><label>Nama Pemilik *</label><input type="text" name="owner_name" value="{{ old('owner_name') }}" required></div>
            <div class="form-group"><label>No. WhatsApp Pemilik *</label><input type="text" name="owner_phone" value="{{ old('owner_phone') }}" required></div>
        </div>
        <div class="form-group"><label>Status *</label><select name="status"><option value="available">Tersedia</option><option value="full">Penuh</option><option value="inactive">Nonaktif</option></select></div>
        <div class="form-row">
            <div class="form-group"><label><input type="checkbox" name="is_featured" value="1"> Rekomendasi (Featured)</label></div>
            <div class="form-group"><label><input type="checkbox" name="is_promo" value="1"> Promo</label></div>
        </div>
        <div class="form-group">
            <label>Fasilitas</label>
            <div class="checkbox-group">
                @foreach($facilities as $fac)
                <label class="checkbox-item"><input type="checkbox" name="facilities[]" value="{{ $fac->id }}"> {{ $fac->icon }} {{ $fac->name }}</label>
                @endforeach
            </div>
        </div>
        <div class="form-group"><label>Foto Hunian</label><input type="file" name="images[]" multiple accept="image/*" style="color: var(--text-muted);"></div>
        <button type="submit" class="btn btn-primary btn-lg">Simpan Hunian</button>
    </form>
</div>
@endsection
