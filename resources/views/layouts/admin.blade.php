<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - The Finder</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="admin-layout">
        <aside class="admin-sidebar">
            <div class="brand">🏠 The<span>Finder</span></div>
            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">📊 Dashboard</a>
                <a href="{{ route('admin.properties.index') }}" class="{{ request()->routeIs('admin.properties.*') ? 'active' : '' }}">🏠 Hunian</a>
                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">📁 Kategori</a>
                <a href="{{ route('admin.campuses.index') }}" class="{{ request()->routeIs('admin.campuses.*') ? 'active' : '' }}">🎓 Kampus</a>
                <a href="{{ route('admin.facilities.index') }}" class="{{ request()->routeIs('admin.facilities.*') ? 'active' : '' }}">✨ Fasilitas</a>
                <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">📰 Artikel</a>
                <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">📬 Kontak</a>
                <a href="{{ route('home') }}">🌐 Lihat Website</a>
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 16px; padding: 0 20px;">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-sm btn-block">Logout</button>
                </form>
            </nav>
        </aside>

        <main class="admin-main">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
