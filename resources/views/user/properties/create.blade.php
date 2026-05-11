@extends('layouts.app')
@section('title', 'Daftarkan Kost - The Finder')

@section('content')
<section class="section" style="padding-top: 32px;">
    <div class="container" style="max-width: 800px;">
        <h1 class="section-title" style="margin-bottom: 8px;">Daftarkan <span>Kost</span></h1>
        <p style="color: var(--text-muted); margin-bottom: 32px;">Isi detail kost/kontrakan dengan lengkap. Admin akan mereview kirimanmu sebelum ditampilkan.</p>

        <div class="sidebar-card admin-form" style="background: var(--bg-card);">
            <form action="{{ route('user.properties.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><label>Nama Kost / Hunian *</label><input type="text" name="name" value="{{ old('name') }}" required></div>
                <div class="form-row">
                    <div class="form-group"><label>Kategori *</label><select name="category_id" required><option value="">Pilih</option>@foreach($categories as $cat)<option value="{{ $cat->id }}">{{ $cat->name }}</option>@endforeach</select></div>
                    <div class="form-group"><label>Dekat Kampus Apa?</label><select name="campus_id"><option value="">Pilih (Opsional)</option>@foreach($campuses as $campus)<option value="{{ $campus->id }}">{{ $campus->name }}</option>@endforeach</select></div>
                </div>
                <div class="form-group"><label>Deskripsi *</label><textarea name="description" required placeholder="Ceritakan keunggulan kost ini...">{{ old('description') }}</textarea></div>
                <div class="form-group"><label>Alamat Lengkap *</label><input type="text" name="address" value="{{ old('address') }}" required></div>
                <div class="form-row">
                    <div class="form-group"><label>Harga Per Bulan (Rp) *</label><input type="number" name="price_monthly" value="{{ old('price_monthly') }}" required></div>
                    <div class="form-group"><label>Harga Per Tahun (Rp)</label><input type="number" name="price_yearly" value="{{ old('price_yearly') }}" placeholder="Opsional"></div>
                </div>
                <div class="form-row">
                    <div class="form-group"><label>Nama Pemilik *</label><input type="text" name="owner_name" value="{{ old('owner_name') }}" required></div>
                    <div class="form-group"><label>No. WhatsApp (Mulai dengan 08 / 628) *</label><input type="text" name="owner_phone" value="{{ old('owner_phone') }}" required></div>
                </div>
                <div class="form-group">
                    <label>Fasilitas yang Tersedia</label>
                    <div class="checkbox-group">
                        @foreach($facilities as $fac)
                        <label class="checkbox-item"><input type="checkbox" name="facilities[]" value="{{ $fac->id }}"> {{ $fac->icon }} {{ $fac->name }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="form-group"><label>Upload Foto (Bisa lebih dari 1)</label><input type="file" name="images[]" multiple accept="image/*" style="color: var(--text-muted);"></div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" style="margin-top: 16px;">Kirim Request Kost</button>
            </form>
        </div>
    </div>
</section>
@endsection
