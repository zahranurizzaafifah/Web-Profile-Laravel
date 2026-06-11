<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Web Profile - Zahra Nurizza Afifah')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,700;0,800;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #7c3aed;
            --primary-light: #ede9fe;
            --primary-dark: #5b21b6;
            --accent: #f59e0b;
            --accent2: #06b6d4;
            --bg: #ffffff;
            --bg2: #f8fafc;
            --surface: #ffffff;
            --border: #e2e8f0;
            --text: #1e293b;
            --muted: #64748b;
            --shadow-sm: 0 1px 3px rgba(0,0,0,.06);
            --shadow: 0 4px 20px rgba(0,0,0,.08);
            --shadow-lg: 0 20px 60px rgba(0,0,0,.12);
            --radius: 16px;
            --radius-sm: 10px;
            --nav-h: 72px;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Plus Jakarta Sans','Inter',sans-serif; color: var(--text); background: var(--bg); line-height: 1.6; }
        a { color: inherit; text-decoration: none; }
        img { max-width: 100%; height: auto; display: block; }

        /* ── NAV ── */
        .nav {
            position: sticky; top: 0; z-index: 100;
            background: rgba(255,255,255,.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            height: var(--nav-h);
        }
        .nav-inner {
            max-width: 1100px; margin: 0 auto; padding: 0 28px;
            height: 100%; display: flex; align-items: center; justify-content: space-between; gap: 20px;
        }
        .nav-brand {
            display: flex; align-items: center; gap: 12px;
            font-weight: 800; font-size: 1.1rem; letter-spacing: -.02em;
        }
        .nav-brand-dot {
            width: 36px; height: 36px; border-radius: 10px;
            background: linear-gradient(135deg, var(--primary), #a78bfa);
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; color: #fff;
        }
        .nav-links { display: flex; align-items: center; gap: 4px; }
        .nav-links a {
            padding: 8px 16px; border-radius: 999px;
            font-size: 14px; font-weight: 500; color: var(--muted);
            transition: 180ms ease;
        }
        .nav-links a:hover, .nav-links a.active { color: var(--text); background: var(--bg2); }
        .nav-links a.active { font-weight: 700; color: var(--primary); }
        .nav-cta {
            padding: 9px 20px; border-radius: 999px;
            background: var(--primary); color: #fff;
            font-size: 13px; font-weight: 700;
            transition: 180ms ease;
        }
        .nav-cta:hover { background: var(--primary-dark); box-shadow: 0 4px 14px rgba(124,58,237,.35); color: #fff; }

        /* ── WRAP ── */
        .wrap { max-width: 1100px; margin: 0 auto; padding: 0 28px; }

        /* ── HERO ── */
        .hero {
            padding: 80px 0 60px;
            background: linear-gradient(135deg, #faf5ff 0%, #f0f9ff 50%, #fff7ed 100%);
            position: relative; overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute; top: -120px; right: -120px;
            width: 500px; height: 500px; border-radius: 50%;
            background: radial-gradient(circle, rgba(124,58,237,.12), transparent 70%);
        }
        .hero::after {
            content: '';
            position: absolute; bottom: -80px; left: -80px;
            width: 360px; height: 360px; border-radius: 50%;
            background: radial-gradient(circle, rgba(6,182,212,.1), transparent 70%);
        }
        .hero-inner {
            max-width: 1100px; margin: 0 auto; padding: 0 28px;
            display: grid; grid-template-columns: 1fr 420px; gap: 60px; align-items: center;
            position: relative; z-index: 1;
        }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 14px; border-radius: 999px;
            background: var(--primary-light); color: var(--primary);
            font-size: 12px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase;
            margin-bottom: 20px;
        }
        .hero-badge span { width: 6px; height: 6px; border-radius: 50%; background: var(--primary); animation: pulse-dot 2s ease infinite; }
        @keyframes pulse-dot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.8)} }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.4rem, 5vw, 3.6rem);
            line-height: 1.1; font-weight: 800;
            letter-spacing: -.02em; margin-bottom: 20px;
        }
        .hero-title em { font-style: italic; color: var(--primary); }
        .hero-lead { font-size: 1.05rem; color: var(--muted); line-height: 1.8; max-width: 52ch; margin-bottom: 32px; }
        .hero-actions { display: flex; flex-wrap: wrap; gap: 12px; }
        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 13px 26px; border-radius: 999px;
            font-size: 14px; font-weight: 700;
            transition: 200ms ease; cursor: pointer; border: none; font-family: inherit;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); box-shadow: 0 6px 20px rgba(124,58,237,.35); }
        .btn-outline { background: #fff; color: var(--text); border: 2px solid var(--border); }
        .btn-outline:hover { border-color: var(--primary); color: var(--primary); transform: translateY(-1px); }

        /* Hero visual card */
        .hero-visual { position: relative; }
        .hero-card {
            background: #fff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border);
        }
        .hero-card-header {
            background: linear-gradient(135deg, var(--primary), #a78bfa);
            padding: 32px 28px;
            color: #fff;
            min-height: 200px;
            display: flex; flex-direction: column; justify-content: flex-end;
        }
        .hero-card-avatar {
            width: 64px; height: 64px; border-radius: 16px;
            background: rgba(255,255,255,.25);
            display: flex; align-items: center; justify-content: center;
            font-size: 28px; margin-bottom: 16px;
            backdrop-filter: blur(8px);
        }
        .hero-card-name { font-size: 1.25rem; font-weight: 800; }
        .hero-card-role { font-size: 13px; opacity: .8; margin-top: 4px; }
        .hero-card-body { padding: 20px 28px; }
        .hero-card-tags { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 18px; }
        .tag-chip {
            padding: 5px 12px; border-radius: 999px; font-size: 12px; font-weight: 600;
            background: var(--primary-light); color: var(--primary);
        }
        .tag-chip.amber { background: #fef3c7; color: #b45309; }
        .tag-chip.cyan { background: #cffafe; color: #0e7490; }
        .hero-stat-row { display: flex; gap: 20px; }
        .hero-stat { text-align: center; }
        .hero-stat-num { font-size: 1.4rem; font-weight: 800; color: var(--text); }
        .hero-stat-label { font-size: 11px; color: var(--muted); text-transform: uppercase; letter-spacing: .06em; }
        .hero-float-badge {
            position: absolute; top: -16px; right: -16px;
            background: #fff; border: 2px solid var(--border);
            border-radius: 14px; padding: 12px 16px;
            box-shadow: var(--shadow);
            display: flex; align-items: center; gap: 10px;
            font-size: 13px; font-weight: 600;
            animation: float 4s ease-in-out infinite;
        }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }
        .hero-float-badge .dot { width: 10px; height: 10px; border-radius: 50%; background: #10b981; }

        /* ── SECTION ── */
        .section { padding: 72px 0; }
        .section-alt { background: var(--bg2); }
        .section-label {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 12px; font-weight: 700; color: var(--primary);
            letter-spacing: .08em; text-transform: uppercase;
            margin-bottom: 12px;
        }
        .section-label::before { content: ''; width: 18px; height: 2px; background: var(--primary); border-radius: 1px; }
        .section-title { font-family: 'Playfair Display', serif; font-size: clamp(1.6rem, 3vw, 2.2rem); font-weight: 800; letter-spacing: -.02em; margin-bottom: 12px; }
        .section-lead { color: var(--muted); font-size: 1rem; max-width: 54ch; }

        /* ── GRID ── */
        .grid-2 { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }

        /* ── CARD ── */
        .card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius); padding: 26px;
            box-shadow: var(--shadow-sm); transition: 250ms ease;
        }
        .card:hover { box-shadow: var(--shadow); transform: translateY(-2px); }
        .card-icon {
            width: 48px; height: 48px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 16px; font-size: 20px;
        }

        /* ── PORTFOLIO THUMB ── */
        .port-thumb {
            height: 180px; border-radius: 12px; margin-bottom: 16px; overflow: hidden;
            background: linear-gradient(135deg, rgba(124,58,237,.35), rgba(167,139,250,.25)),
                url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80') center/cover;
        }
        .port-thumb.alt { background: linear-gradient(135deg, rgba(6,182,212,.35), rgba(124,58,237,.25)),
            url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80') center/cover; }
        .port-thumb.alt2 { background: linear-gradient(135deg, rgba(245,158,11,.3), rgba(6,182,212,.25)),
            url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=800&q=80') center/cover; }

        /* ── SKILL BAR ── */
        .skill-item { margin-bottom: 18px; }
        .skill-top { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 14px; font-weight: 600; }
        .skill-pct { font-size: 13px; color: var(--primary); font-weight: 700; }
        .skill-bar { height: 8px; background: var(--border); border-radius: 999px; overflow: hidden; }
        .skill-fill { height: 100%; border-radius: 999px; background: linear-gradient(90deg, var(--primary), #a78bfa); transition: width 1s ease; }

        /* ── TIMELINE ── */
        .timeline { position: relative; padding-left: 28px; }
        .timeline::before { content: ''; position: absolute; left: 7px; top: 0; bottom: 0; width: 2px; background: var(--border); }
        .tl-item { position: relative; padding-bottom: 28px; }
        .tl-item:last-child { padding-bottom: 0; }
        .tl-dot { position: absolute; left: -24px; top: 4px; width: 16px; height: 16px; border-radius: 50%; background: var(--primary); border: 3px solid #fff; box-shadow: 0 0 0 2px var(--primary); }
        .tl-date { font-size: 12px; color: var(--muted); font-weight: 600; margin-bottom: 4px; }
        .tl-title { font-size: 15px; font-weight: 700; margin-bottom: 4px; }
        .tl-org { font-size: 13px; color: var(--primary); font-weight: 600; }
        .tl-desc { font-size: 13px; color: var(--muted); margin-top: 6px; line-height: 1.6; }

        /* ── CONTACT ── */
        .contact-grid { display: grid; grid-template-columns: 1fr 360px; gap: 32px; align-items: start; }
        .contact-item { display: flex; align-items: center; gap: 16px; padding: 18px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); margin-bottom: 12px; transition: 200ms; }
        .contact-item:hover { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(124,58,237,.08); }
        .contact-icon { width: 44px; height: 44px; border-radius: 12px; background: var(--primary-light); color: var(--primary); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .contact-label { font-size: 12px; color: var(--muted); margin-bottom: 2px; }
        .contact-val { font-size: 14px; font-weight: 600; }

        /* ── FOOTER ── */
        footer { background: var(--text); color: rgba(255,255,255,.6); text-align: center; padding: 28px; font-size: 13px; }
        footer span { color: var(--primary); font-weight: 700; }

        /* ── MODEL VIEWER ── */
        model-viewer { width: 100%; height: 100%; min-height: 460px; background: transparent; }

        /* Responsive */
        @media (max-width: 960px) {
            .hero-inner { grid-template-columns: 1fr; }
            .hero-visual { display: none; }
            .grid-2, .grid-3 { grid-template-columns: 1fr; }
            .contact-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 640px) {
            .hero { padding: 48px 0 40px; }
            .wrap { padding: 0 18px; }
            .nav-inner { padding: 0 18px; }
            .hero-inner { padding: 0 18px; }
        }
    </style>
</head>
<body>

<!-- NAV -->
<nav class="nav">
    <div class="nav-inner">
        <a class="nav-brand" href="{{ route('landing') }}">
            <div class="nav-brand-dot">✦</div>
            <span>Zahra Profile</span>
        </a>
        <div class="nav-links">
            <a href="{{ route('landing') }}" class="{{ request()->routeIs('landing') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
            <a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">Portfolio</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a>
        </div>
        <a href="{{ route('login') }}" class="nav-cta">Admin ↗</a>
    </div>
</nav>

<main>@yield('content')</main>

<footer>
    <p>© 2026 <span>Zahra Nurizza Afifah</span> · Teknologi Multimedia Broadcasting · PENS</p>
</footer>

<!-- AI CHAT WIDGET -->
<style>
    .ai-chat-btn {
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), #a78bfa);
        color: white;
        border: none;
        box-shadow: 0 4px 20px rgba(124, 58, 237, 0.4);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        z-index: 999;
        transition: 250ms ease;
    }
    .ai-chat-btn:hover {
        transform: scale(1.1);
    }
    .ai-chat-window {
        position: fixed;
        bottom: 100px;
        right: 24px;
        width: 340px;
        height: 480px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        display: none;
        flex-direction: column;
        z-index: 999;
        border: 1px solid var(--border);
        overflow: hidden;
        font-family: 'Inter', sans-serif;
    }
    .ai-chat-header {
        background: linear-gradient(135deg, var(--primary), #a78bfa);
        color: white;
        padding: 16px 20px;
        font-weight: 700;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .ai-chat-close {
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        cursor: pointer;
        opacity: 0.8;
    }
    .ai-chat-close:hover { opacity: 1; }
    .ai-chat-body {
        flex: 1;
        padding: 16px;
        overflow-y: auto;
        background: var(--bg2);
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .chat-bubble {
        max-width: 80%;
        padding: 12px 16px;
        border-radius: 16px;
        font-size: 14px;
        line-height: 1.5;
        word-wrap: break-word;
    }
    .chat-user {
        background: var(--primary);
        color: white;
        align-self: flex-end;
        border-bottom-right-radius: 4px;
    }
    .chat-bot {
        background: white;
        color: var(--text);
        align-self: flex-start;
        border-bottom-left-radius: 4px;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border);
    }
    .ai-chat-input-area {
        padding: 16px;
        background: white;
        border-top: 1px solid var(--border);
        display: flex;
        gap: 10px;
    }
    .ai-chat-input {
        flex: 1;
        padding: 10px 14px;
        border-radius: 999px;
        border: 1px solid var(--border);
        font-size: 14px;
        outline: none;
        transition: 200ms;
    }
    .ai-chat-input:focus {
        border-color: var(--primary);
    }
    .ai-chat-send {
        background: var(--primary);
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 18px;
    }
    .ai-chat-send:disabled {
        background: var(--muted);
        cursor: not-allowed;
    }
    /* Loading dot animation */
    .typing-indicator {
        display: none;
        align-items: center;
        gap: 4px;
        padding: 12px 16px;
        background: white;
        border-radius: 16px;
        border-bottom-left-radius: 4px;
        align-self: flex-start;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--border);
    }
    .typing-indicator span {
        width: 6px;
        height: 6px;
        background: var(--muted);
        border-radius: 50%;
        animation: typing 1.4s infinite ease-in-out both;
    }
    .typing-indicator span:nth-child(1) { animation-delay: -0.32s; }
    .typing-indicator span:nth-child(2) { animation-delay: -0.16s; }
    @keyframes typing {
        0%, 80%, 100% { transform: scale(0); }
        40% { transform: scale(1); }
    }
</style>

<button class="ai-chat-btn" onclick="toggleChat()">
    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
</button>

<div class="ai-chat-window" id="ai-chat-window">
    <div class="ai-chat-header">
        <span>Tanya AI Asisten</span>
        <button class="ai-chat-close" onclick="toggleChat()">✕</button>
    </div>
    <div class="ai-chat-body" id="ai-chat-body">
        <div class="chat-bubble chat-bot">Halo! Saya asisten virtual Zahra. Ada yang ingin ditanyakan tentang profil, pengalaman, atau karya Zahra?</div>
        <div class="typing-indicator" id="ai-typing">
            <span></span><span></span><span></span>
        </div>
    </div>
    <form class="ai-chat-input-area" id="ai-chat-form" onsubmit="sendChatMessage(event)">
        <input type="text" id="ai-chat-input" class="ai-chat-input" placeholder="Tulis pertanyaan..." required autocomplete="off">
        <button type="submit" id="ai-chat-send" class="ai-chat-send">➤</button>
    </form>
</div>

<script>
    function toggleChat() {
        const win = document.getElementById('ai-chat-window');
        win.style.display = win.style.display === 'flex' ? 'none' : 'flex';
        if(win.style.display === 'flex') {
            document.getElementById('ai-chat-input').focus();
        }
    }

    async function sendChatMessage(e) {
        e.preventDefault();
        const inputField = document.getElementById('ai-chat-input');
        const sendBtn = document.getElementById('ai-chat-send');
        const message = inputField.value.trim();
        if(!message) return;

        // Add user bubble
        addBubble(message, 'user');
        inputField.value = '';
        inputField.disabled = true;
        sendBtn.disabled = true;

        // Show typing indicator
        const typingIndicator = document.getElementById('ai-typing');
        const chatBody = document.getElementById('ai-chat-body');
        chatBody.appendChild(typingIndicator); // move to bottom
        typingIndicator.style.display = 'flex';
        chatBody.scrollTop = chatBody.scrollHeight;

        try {
            const response = await fetch('/chat/ask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();
            typingIndicator.style.display = 'none';
            addBubble(data.reply, 'bot');
        } catch (err) {
            typingIndicator.style.display = 'none';
            addBubble('Maaf, terjadi kesalahan koneksi. Silakan coba lagi.', 'bot');
        }

        inputField.disabled = false;
        sendBtn.disabled = false;
        inputField.focus();
    }

    function addBubble(text, sender) {
        const chatBody = document.getElementById('ai-chat-body');
        const bubble = document.createElement('div');
        bubble.className = 'chat-bubble ' + (sender === 'user' ? 'chat-user' : 'chat-bot');
        
        // simple formatting for bot response (bold)
        if(sender === 'bot') {
            bubble.innerHTML = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>').replace(/\n/g, '<br>');
        } else {
            bubble.textContent = text;
        }

        const typingIndicator = document.getElementById('ai-typing');
        chatBody.insertBefore(bubble, typingIndicator);
        chatBody.scrollTop = chatBody.scrollHeight;
    }
</script>
</body>
</html>
