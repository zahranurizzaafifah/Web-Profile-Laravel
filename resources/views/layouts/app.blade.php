<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Web Profile Zahra')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <style>
        :root { --bg:#0b1020; --bg2:#121a33; --panel:rgba(255,255,255,.08); --text:#f5f7ff; --muted:#b9c3e3; --accent:#7cf7d4; --accent2:#7aa8ff; --accent3:#ff7bd5; --shadow:0 25px 80px rgba(0,0,0,.32); }
        *{box-sizing:border-box} html,body{margin:0;min-height:100%} body{font-family:'Inter',sans-serif;color:var(--text);background:radial-gradient(circle at top left,rgba(122,168,255,.24),transparent 35%),radial-gradient(circle at top right,rgba(255,123,213,.18),transparent 28%),linear-gradient(180deg,var(--bg) 0%,var(--bg2) 100%)}
        a{color:inherit;text-decoration:none}.wrap{width:min(1120px,calc(100% - 32px));margin:0 auto}.nav{position:sticky;top:0;z-index:30;backdrop-filter:blur(18px);background:rgba(8,12,24,.72);border-bottom:1px solid rgba(255,255,255,.08)}
        .nav-inner{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:18px 0}.brand{display:flex;align-items:center;gap:12px;font-weight:800;letter-spacing:.02em}.brand-mark{width:42px;height:42px;border-radius:14px;background:linear-gradient(135deg,var(--accent),var(--accent2));box-shadow:0 0 0 6px rgba(255,255,255,.04)}
        .nav-links{display:flex;flex-wrap:wrap;gap:10px}.nav-links a{padding:10px 14px;border-radius:999px;color:var(--muted);border:1px solid transparent;transition:180ms ease}.nav-links a:hover,.nav-links a.active{color:var(--text);background:rgba(255,255,255,.08);border-color:rgba(255,255,255,.08)}
        .hero,.section,.card{border:1px solid rgba(255,255,255,.1);background:var(--panel);box-shadow:var(--shadow);backdrop-filter:blur(18px)}.hero{margin:28px 0 22px;border-radius:30px;overflow:hidden;padding:30px;position:relative}.hero-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:28px;align-items:center}
        .eyebrow{display:inline-flex;gap:8px;align-items:center;color:var(--accent);font-weight:700;letter-spacing:.1em;text-transform:uppercase;font-size:12px}.title{font-family:'Playfair Display',serif;font-size:clamp(2.8rem,6vw,5.4rem);line-height:.95;margin:14px 0 14px}.lead{color:var(--muted);font-size:1.05rem;line-height:1.8;max-width:62ch}
        .actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:22px}.btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;border-radius:999px;padding:13px 18px;border:1px solid transparent;transition:200ms ease;font-weight:700}.btn-primary{background:linear-gradient(135deg,var(--accent),var(--accent2));color:#07111f}.btn-soft{border-color:rgba(255,255,255,.14);background:rgba(255,255,255,.05);color:var(--text)}
        .model-card{border-radius:28px;overflow:hidden;min-height:460px;background:linear-gradient(180deg,rgba(122,168,255,.15),rgba(124,247,212,.08));border:1px solid rgba(255,255,255,.08);position:relative}.model-card .label{position:absolute;top:16px;left:16px;z-index:2;padding:10px 14px;border-radius:999px;background:rgba(8,12,24,.55);border:1px solid rgba(255,255,255,.1);font-size:13px;color:var(--muted)}
        .content{padding:0 0 42px}.section{border-radius:26px;padding:24px;margin-bottom:22px}.section h2{margin:0 0 12px;font-size:1.8rem}.muted{color:var(--muted)}.grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}.grid-3{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}.card{border-radius:22px;padding:20px;min-height:100%}
        .tag{display:inline-flex;margin-bottom:14px;padding:7px 10px;border-radius:999px;background:rgba(124,247,212,.12);color:var(--accent);font-size:12px;font-weight:700}.portfolio-thumb{height:170px;border-radius:18px;margin-bottom:16px;background:linear-gradient(135deg,rgba(122,168,255,.5),rgba(255,123,213,.35)),url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80') center/cover}.portfolio-thumb.alt{background:linear-gradient(135deg,rgba(124,247,212,.45),rgba(122,168,255,.35)),url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80') center/cover}.portfolio-thumb.alt2{background:linear-gradient(135deg,rgba(255,123,213,.42),rgba(124,247,212,.28)),url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=1200&q=80') center/cover}
        .ai-bubble{position:fixed;bottom:18px;right:18px;z-index:40;display:flex;align-items:center;gap:10px;padding:13px 16px;border-radius:999px;background:linear-gradient(135deg,var(--accent2),var(--accent3));color:#07111f;font-weight:800;box-shadow:var(--shadow)}.footer{color:var(--muted);padding:22px 0 28px;text-align:center;font-size:14px} ul.clean{padding-left:18px;color:var(--muted)} ul.clean li{margin:8px 0}
        @media (max-width:960px){.hero-grid,.grid-2,.grid-3{grid-template-columns:1fr}.model-card{min-height:380px}} @media (max-width:640px){.nav-inner{flex-direction:column;align-items:flex-start}.hero,.section{padding:20px;border-radius:22px}.title{font-size:2.6rem}.ai-bubble{left:14px;right:14px;justify-content:center}}
    </style>
</head>
<body>
    <div class="nav"><div class="wrap nav-inner"><a class="brand" href="{{ route('landing') }}"><span class="brand-mark"></span><span>Zahra Profile</span></a><div class="nav-links"><a class="{{ request()->routeIs('landing') ? 'active' : '' }}" href="{{ route('landing') }}">Landing</a><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang</a><a class="{{ request()->routeIs('portfolio') ? 'active' : '' }}" href="{{ route('portfolio') }}">Portofolio</a><a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a><a href="{{ route('admin.dashboard') }}">Admin</a></div></div></div>
+    <main class="wrap content">@yield('content')</main>
+    <div class="ai-bubble">AI by Zahra</div>
+    <div class="footer wrap"><span>Web Profile Pribadi Zahra Nurizza Afifah · Laravel</span></div>
+</body>
+</html>
