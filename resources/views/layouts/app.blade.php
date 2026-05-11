<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'The Finder - Cari Kost & Hunian Terbaik')</title>
    <meta name="description" content="@yield('description', 'The Finder - Platform pencarian kost, kontrakan, dan hunian terbaik di Surabaya. Temukan hunian impianmu di dekat kampus!')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>
    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">🏠 The<span>Finder</span></a>
            <button class="nav-toggle" onclick="document.querySelector('.nav-links').classList.toggle('active')">☰</button>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('properties.index') }}" class="{{ request()->routeIs('properties.*') ? 'active' : '' }}">Hunian</a></li>
                <li><a href="{{ route('campuses.index') }}" class="{{ request()->routeIs('campuses.*') ? 'active' : '' }}">Area Kampus</a></li>
                <li><a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.*') ? 'active' : '' }}">Artikel</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a></li>
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" style="padding: 6px 16px; font-size: 0.9rem;">Admin Panel</a>
                        @else
                            <a href="{{ route('user.properties.index') }}" class="btn btn-primary" style="padding: 6px 16px; font-size: 0.9rem;">Dashboard Saya</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" style="background:none; border:none; color:var(--text-muted); cursor:pointer; font-weight:600;">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" style="color: var(--text-muted); font-weight: 600;">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary" style="padding: 6px 16px; font-size: 0.9rem;">Daftar</a>
                    @endauth
            </ul>
        </div>
    </nav>

    {{-- CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div>
                    <div class="footer-brand">🏠 The<span>Finder</span></div>
                    <p class="footer-desc">Platform pencarian kost, kontrakan, dan hunian terbaik di Surabaya. Temukan hunian nyaman dekat kampus impianmu!</p>
                </div>
                <div>
                    <h4>Menu</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('properties.index') }}">Cari Hunian</a></li>
                        <li><a href="{{ route('campuses.index') }}">Area Kampus</a></li>
                        <li><a href="{{ route('articles.index') }}">Artikel</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Kategori</h4>
                    <ul>
                        <li><a href="{{ route('properties.index', ['category' => 'kost-putra']) }}">Kost Putra</a></li>
                        <li><a href="{{ route('properties.index', ['category' => 'kost-putri']) }}">Kost Putri</a></li>
                        <li><a href="{{ route('properties.index', ['category' => 'kontrakan']) }}">Kontrakan</a></li>
                        <li><a href="{{ route('properties.index', ['category' => 'rumah-sewa']) }}">Rumah Sewa</a></li>
                    </ul>
                </div>
                <div>
                    <h4>Kontak</h4>
                    <ul>
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('about') }}">Daftarkan Kost</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; {{ date('Y') }} The Finder. All rights reserved.
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
