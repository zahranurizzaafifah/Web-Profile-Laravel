<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin - Zahra Profile')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-w: 260px;
            --primary: #7c3aed;
            --primary-light: #ede9fe;
            --primary-dark: #5b21b6;
            --accent: #f59e0b;
            --danger: #ef4444;
            --success: #10b981;
            --bg: #f8fafc;
            --surface: #ffffff;
            --border: #e2e8f0;
            --text: #1e293b;
            --muted: #64748b;
            --muted-light: #94a3b8;
            --sidebar-bg: #1e1b4b;
            --sidebar-text: #c4b5fd;
            --sidebar-active: #7c3aed;
            --sidebar-hover: rgba(124,58,237,.15);
            --shadow-sm: 0 1px 3px rgba(0,0,0,.08);
            --shadow: 0 4px 16px rgba(0,0,0,.08);
            --shadow-lg: 0 10px 40px rgba(0,0,0,.12);
            --radius: 12px;
            --radius-sm: 8px;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; color: var(--text); background: var(--bg); }
        a { text-decoration: none; color: inherit; }

        /*  LAYOUT  */
        .admin-wrap { display: flex; min-height: 100vh; }

        /*  SIDEBAR  */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 50;
            overflow-y: auto;
        }
        .sidebar-logo {
            padding: 28px 24px 20px;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }
        .sidebar-logo-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -.02em;
        }
        .sidebar-logo-name span { color: #a78bfa; }
        .sidebar-logo-sub {
            font-size: 11px;
            color: var(--sidebar-text);
            margin-top: 3px;
            letter-spacing: .04em;
            text-transform: uppercase;
        }
        .sidebar-nav { padding: 16px 12px; flex: 1; }
        .sidebar-section-label {
            font-size: 10px;
            font-weight: 700;
            color: rgba(196,181,253,.45);
            letter-spacing: .1em;
            text-transform: uppercase;
            padding: 8px 12px 6px;
            margin-top: 8px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            color: var(--sidebar-text);
            font-size: 14px;
            font-weight: 500;
            transition: 180ms ease;
            margin-bottom: 2px;
        }
        .sidebar-link:hover { background: var(--sidebar-hover); color: #fff; }
        .sidebar-link.active { background: var(--sidebar-active); color: #fff; box-shadow: 0 4px 14px rgba(124,58,237,.4); }
        .sidebar-link svg { width: 18px; height: 18px; flex-shrink: 0; opacity: .8; }
        .sidebar-link.active svg, .sidebar-link:hover svg { opacity: 1; }
        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,.08);
        }
        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            background: rgba(255,255,255,.06);
        }
        .sidebar-avatar {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: linear-gradient(135deg, #7c3aed, #a78bfa);
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; color: #fff; font-size: 14px; flex-shrink: 0;
        }
        .sidebar-user-name { font-size: 13px; font-weight: 600; color: #fff; }
        .sidebar-user-role { font-size: 11px; color: var(--sidebar-text); margin-top: 1px; }

        /*  MAIN  */
        .main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

        /*  TOPBAR  */
        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 40;
            box-shadow: var(--shadow-sm);
        }
        .topbar-title { font-size: 18px; font-weight: 700; color: var(--text); }
        .topbar-sub { font-size: 13px; color: var(--muted); margin-top: 1px; }
        .topbar-right { display: flex; align-items: center; gap: 12px; }
        .topbar-btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 18px;
            border-radius: var(--radius-sm);
            font-size: 13px; font-weight: 600;
            border: none; cursor: pointer;
            transition: 160ms ease;
            font-family: inherit;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-dark); box-shadow: 0 4px 14px rgba(124,58,237,.35); }
        .btn-outline { background: transparent; color: var(--muted); border: 1px solid var(--border); }
        .btn-outline:hover { background: var(--bg); color: var(--text); }
        .btn-danger { background: #fef2f2; color: var(--danger); border: 1px solid #fecaca; }
        .btn-danger:hover { background: var(--danger); color: #fff; }

        /*  PAGE CONTENT  */
        .page { padding: 32px; flex: 1; }
        .page-header { margin-bottom: 28px; }
        .page-header h1 { font-size: 1.6rem; font-weight: 800; letter-spacing: -.02em; }
        .page-header p { color: var(--muted); margin-top: 4px; font-size: 14px; }

        /*  CARDS  */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow-sm);
        }
        .card-title { font-size: 15px; font-weight: 700; margin-bottom: 16px; }
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; margin-bottom: 28px; }
        .stat-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 22px;
            box-shadow: var(--shadow-sm);
            display: flex; align-items: center; gap: 16px;
        }
        .stat-icon {
            width: 48px; height: 48px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .stat-icon.purple { background: var(--primary-light); color: var(--primary); }
        .stat-icon.amber { background: #fef3c7; color: #d97706; }
        .stat-icon.green { background: #d1fae5; color: var(--success); }
        .stat-num { font-size: 1.8rem; font-weight: 800; letter-spacing: -.03em; }
        .stat-label { font-size: 13px; color: var(--muted); margin-top: 2px; }

        /*  TABLE  */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px 16px; font-size: 12px; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: .06em; border-bottom: 2px solid var(--border); }
        td { padding: 14px 16px; border-bottom: 1px solid var(--border); font-size: 14px; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #fafbfc; }
        .badge { display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; }
        .badge-purple { background: var(--primary-light); color: var(--primary); }
        .badge-amber { background: #fef3c7; color: #b45309; }
        .badge-green { background: #d1fae5; color: #065f46; }
        .badge-blue { background: #dbeafe; color: #1e40af; }

        /*  FORM  */
        .form-grid { display: grid; gap: 20px; }
        .form-grid-2 { grid-template-columns: 1fr 1fr; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-label { font-size: 13px; font-weight: 600; color: var(--text); }
        .form-input, .form-textarea, .form-select {
            width: 100%;
            padding: 11px 14px;
            border-radius: var(--radius-sm);
            border: 1.5px solid var(--border);
            font-family: inherit;
            font-size: 14px;
            color: var(--text);
            background: var(--surface);
            transition: 180ms ease;
            outline: none;
        }
        .form-input:focus, .form-textarea:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(124,58,237,.12);
        }
        .form-textarea { resize: vertical; min-height: 110px; }
        .form-hint { font-size: 12px; color: var(--muted-light); }
        .form-error { font-size: 12px; color: var(--danger); }

        /*  ALERT  */
        .alert { padding: 14px 18px; border-radius: var(--radius-sm); font-size: 14px; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-danger { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

        /*  ACTIONS  */
        .actions-row { display: flex; align-items: center; gap: 10px; }

        /* Mobile */
        @media (max-width: 900px) {
            .sidebar { transform: translateX(-100%); }
            .main { margin-left: 0; }
            .stats-grid { grid-template-columns: 1fr; }
            .form-grid-2 { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="admin-wrap">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-logo-name">Zahra<span>Admin</span></div>
            <div class="sidebar-logo-sub">Dashboard Panel</div>
        </div>

        <nav class="sidebar-nav">
            <div class="sidebar-section-label">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.portfolios.index') }}" class="sidebar-link {{ request()->routeIs('admin.portfolios*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                Portfolio
            </a>

            <a href="{{ route('admin.contact.edit') }}" class="sidebar-link {{ request()->routeIs('admin.contact*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                Kontak
            </a>

            <a href="{{ route('admin.profile.edit') }}" class="sidebar-link {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                Profil Saya
            </a>

            <div class="sidebar-section-label">Lainnya</div>

            <a href="{{ route('landing') }}" target="_blank" class="sidebar-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                Lihat Website
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'Z', 0, 1)) }}</div>
                <div>
                    <div class="sidebar-user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="sidebar-user-role">Administrator</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="margin-top:10px;">
                @csrf
                <button type="submit" class="sidebar-link" style="width:100%; border:none; cursor:pointer; font-family:inherit; background:rgba(239,68,68,.15); color:#fca5a5; text-align:left;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="main">
        <header class="topbar">
            <div>
                <div class="topbar-title">@yield('page-title', 'Dashboard')</div>
                <div class="topbar-sub">@yield('page-sub', 'Selamat datang di panel admin')</div>
            </div>
            <div class="topbar-right">
                @yield('topbar-actions')
            </div>
        </header>

        <main class="page">
            @if(session('success'))
                <div class="alert alert-success">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 13.01 9 10.01"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
