<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Zahra Profile</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f5f3ff 0%, #faf5ff 50%, #f0f9ff 100%);
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* LEFT PANEL */
        .left-panel {
            background: linear-gradient(160deg, #1e1b4b 0%, #3730a3 60%, #7c3aed 100%);
            display: flex; flex-direction: column;
            justify-content: center; align-items: center;
            padding: 60px;
            position: relative; overflow: hidden;
        }
        .left-panel::before {
            content: '';
            position: absolute; top: -100px; right: -100px;
            width: 400px; height: 400px; border-radius: 50%;
            background: rgba(255,255,255,.05);
        }
        .left-panel::after {
            content: '';
            position: absolute; bottom: -80px; left: -80px;
            width: 300px; height: 300px; border-radius: 50%;
            background: rgba(255,255,255,.04);
        }
        .left-content { position: relative; z-index: 1; color: #fff; max-width: 380px; }
        .left-logo {
            display: inline-flex; align-items: center; gap: 12px;
            margin-bottom: 48px;
        }
        .left-logo-mark {
            width: 44px; height: 44px; border-radius: 12px;
            background: rgba(255,255,255,.15); backdrop-filter: blur(8px);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; border: 1px solid rgba(255,255,255,.2);
        }
        .left-logo-text { font-size: 1.1rem; font-weight: 800; }
        .left-title { font-size: clamp(1.8rem,3vw,2.6rem); font-weight: 800; line-height: 1.15; letter-spacing: -.03em; margin-bottom: 16px; }
        .left-title em { color: #a78bfa; font-style: normal; }
        .left-desc { font-size: 15px; color: rgba(255,255,255,.65); line-height: 1.75; margin-bottom: 40px; }
        .left-features { display: flex; flex-direction: column; gap: 14px; }
        .feat {
            display: flex; align-items: center; gap: 12px;
            padding: 14px 18px; border-radius: 14px;
            background: rgba(255,255,255,.08); border: 1px solid rgba(255,255,255,.12);
            backdrop-filter: blur(8px);
        }
        .feat-icon { font-size: 20px; flex-shrink: 0; }
        .feat-text { font-size: 14px; font-weight: 600; color: rgba(255,255,255,.9); }
        .feat-sub { font-size: 12px; color: rgba(255,255,255,.5); margin-top: 2px; }

        /* RIGHT PANEL */
        .right-panel {
            display: flex; flex-direction: column;
            justify-content: center; align-items: center;
            padding: 60px;
        }
        .login-box { width: 100%; max-width: 400px; }
        .login-header { margin-bottom: 36px; }
        .login-header h1 { font-size: 1.7rem; font-weight: 800; letter-spacing: -.03em; color: #1e293b; margin-bottom: 6px; }
        .login-header p { font-size: 14px; color: #64748b; }

        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 13px; font-weight: 700; color: #374151; margin-bottom: 8px; }
        .form-input {
            width: 100%; padding: 13px 16px;
            border-radius: 12px; border: 1.5px solid #e2e8f0;
            font-family: inherit; font-size: 14px; color: #1e293b;
            background: #fff; transition: 180ms ease; outline: none;
        }
        .form-input:focus { border-color: #7c3aed; box-shadow: 0 0 0 3px rgba(124,58,237,.12); }
        .form-input::placeholder { color: #94a3b8; }

        .form-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
        .remember { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #64748b; cursor: pointer; }
        .remember input { accent-color: #7c3aed; width: 15px; height: 15px; cursor: pointer; }

        .btn-login {
            width: 100%; padding: 14px;
            background: linear-gradient(135deg, #7c3aed, #a78bfa);
            color: #fff; border: none; border-radius: 12px;
            font-family: inherit; font-size: 15px; font-weight: 700;
            cursor: pointer; transition: 200ms ease; letter-spacing: -.01em;
        }
        .btn-login:hover { transform: translateY(-1px); box-shadow: 0 8px 24px rgba(124,58,237,.4); }
        .btn-login:active { transform: translateY(0); }

        .divider { text-align: center; margin: 24px 0; position: relative; }
        .divider::before { content: ''; position: absolute; top: 50%; left: 0; right: 0; height: 1px; background: #e2e8f0; }
        .divider span { background: #f8fafc; padding: 0 12px; font-size: 12px; color: #94a3b8; position: relative; z-index: 1; font-weight: 600; }

        .back-link { display: flex; align-items: center; justify-content: center; gap: 6px; font-size: 13px; color: #64748b; transition: color 180ms; }
        .back-link:hover { color: #7c3aed; }

        .alert-error {
            background: #fef2f2; color: #991b1b; border: 1px solid #fecaca;
            border-radius: 10px; padding: 12px 16px; font-size: 13px;
            margin-bottom: 20px; display: flex; align-items: center; gap: 8px;
        }

        @media (max-width: 768px) {
            body { grid-template-columns: 1fr; }
            .left-panel { display: none; }
            .right-panel { padding: 40px 24px; }
        }
    </style>
</head>
<body>

<!-- LEFT PANEL -->
<div class="left-panel">
    <div class="left-content">
        <div class="left-logo">
            <div class="left-logo-mark">Z</div>
            <div class="left-logo-text">Zahra Profile</div>
        </div>
        <h1 class="left-title">Kelola <em>Portfolio</em> & Kontenmu</h1>
        <p class="left-desc">Panel admin untuk mengelola portfolio, profil, dan informasi kontak yang tampil di website pribadimu.</p>
        <div class="left-features">
            <div class="feat">
                <div class="feat-icon">-</div>
                <div>
                    <div class="feat-text">Manajemen Portfolio</div>
                    <div class="feat-sub">Tambah, edit, dan hapus karya dengan mudah</div>
                </div>
            </div>
            <div class="feat">
                <div class="feat-icon"></div>
                <div>
                    <div class="feat-text">Profil Dinamis</div>
                    <div class="feat-sub">Update bio dan informasi pribadimu</div>
                </div>
            </div>
            <div class="feat">
                <div class="feat-icon"></div>
                <div>
                    <div class="feat-text">Info Kontak</div>
                    <div class="feat-sub">Atur cara audiens menghubungimu</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- RIGHT PANEL -->
<div class="right-panel">
    <div class="login-box">
        <div class="login-header">
            <h1>Selamat Datang </h1>
            <p>Masuk untuk mengelola website profilmu</p>
        </div>

        @if($errors->any())
            <div class="alert-error">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Alamat Email</label>
                <input class="form-input" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input class="form-input" type="password" id="password" name="password" placeholder="********" required>
            </div>
            <div class="form-row">
                <label class="remember">
                    <input type="checkbox" name="remember"> Ingat saya
                </label>
            </div>
            <button type="submit" class="btn-login">Masuk ke Dashboard -></button>
        </form>

        <div class="divider"><span>atau</span></div>
        <a href="{{ route('landing') }}" class="back-link">
            <- Kembali ke Website
        </a>
    </div>
</div>

</body>
</html>
