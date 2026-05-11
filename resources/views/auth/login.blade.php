<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - The Finder Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .login-page { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, var(--bg-dark), var(--primary-dark)); }
        .login-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 40px; width: 100%; max-width: 420px; margin: 20px; }
        .login-card h1 { text-align: center; font-size: 1.5rem; margin-bottom: 8px; }
        .login-card p { text-align: center; color: var(--text-muted); margin-bottom: 32px; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="login-card">
            <div style="text-align: center; margin-bottom: 24px; font-size: 1.5rem; font-weight: 800;">🏠 The<span style="color: var(--accent);">Finder</span></div>
            <h1>Login Admin</h1>
            <p>Masuk ke panel admin</p>

            @if($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                        <input type="checkbox" name="remember" style="accent-color: var(--primary);"> Ingat saya
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg">Masuk</button>
            </form>
            <p style="margin-top: 24px;"><a href="{{ route('home') }}">← Kembali ke beranda</a></p>
        </div>
    </div>
</body>
</html>
