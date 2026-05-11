@extends('layouts.app')
@section('title', 'Tentang Kami - The Finder')

@section('content')
<div class="about-hero">
    <div class="container">
        <h1>Tentang <span style="color: var(--accent);">The Finder</span></h1>
        <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto;">Platform terpercaya untuk mencari kost, kontrakan, dan hunian terbaik di Surabaya</p>
    </div>
</div>

<div class="about-content">
    <div class="container">
        <div class="about-grid">
            <div class="about-text">
                <h2>Siapa Kami?</h2>
                <p>The Finder adalah platform digital yang memudahkan mahasiswa dan pekerja untuk menemukan hunian sewa terbaik di Surabaya. Kami hadir karena kami tahu betapa sulitnya mencari kost yang tepat — yang dekat kampus, harganya pas di kantong, dan fasilitasnya sesuai kebutuhan.</p>
                <p>Dengan The Finder, pencarian hunian jadi lebih mudah, cepat, dan transparan. Kami menampilkan foto asli, harga jelas, fasilitas lengkap, dan kontak pemilik yang bisa langsung dihubungi via WhatsApp.</p>

                <h2 style="margin-top: 32px;">Mengapa The Finder?</h2>
                <p>✅ <strong>Gratis</strong> — Pencarian hunian tanpa biaya apapun</p>
                <p>✅ <strong>Terpercaya</strong> — Data hunian terverifikasi</p>
                <p>✅ <strong>Mudah</strong> — Filter berdasarkan kampus, kategori, dan harga</p>
                <p>✅ <strong>Langsung</strong> — Hubungi pemilik via WhatsApp tanpa perantara</p>
            </div>

            <div>
                <div class="sidebar-card" style="background: var(--bg-card);">
                    <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 8px; color: var(--accent);">📋 Daftarkan Kost Anda</h3>
                    <p style="color: var(--text-muted); font-size: 0.88rem; margin-bottom: 20px;">Punya kost atau kontrakan? Daftarkan gratis dan jangkau ribuan calon penghuni!</p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Lengkap *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required>
                            @error('name') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>No. WhatsApp *</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" required>
                            @error('phone') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}">
                            @error('email') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama Kost / Hunian *</label>
                            <input type="text" name="kost_name" value="{{ old('kost_name') }}" required>
                            @error('kost_name') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Alamat Kost *</label>
                            <input type="text" name="kost_address" value="{{ old('kost_address') }}" required>
                            @error('kost_address') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label>Pesan / Keterangan Tambahan *</label>
                            <textarea name="message" required>{{ old('message') }}</textarea>
                            @error('message') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-accent btn-block">Kirim Pendaftaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
