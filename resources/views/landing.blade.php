@extends('layouts.app')

@section('title', 'Zahra Nurizza Afifah - Multimedia & Design')

@section('content')

<!-- HERO -->
<section class="hero">
    @if(optional($profile)->photo_url)
        <div style="position:absolute; top:0; right:0; bottom:0; width:65%; z-index:0; pointer-events:none; opacity:0.40; background: url('{{ $profile->photo_url }}') no-repeat right 30% / cover; -webkit-mask-image: linear-gradient(to left, rgba(0,0,0,1) 20%, transparent 100%); mask-image: linear-gradient(to left, rgba(0,0,0,1) 20%, transparent 100%); mix-blend-mode: multiply;"></div>
    @endif
    <div class="hero-inner">
        <div>
            <div class="hero-badge">
                <span></span>
                Tersedia untuk Kolaborasi
            </div>
            <h1 class="hero-title">
                {{ optional($profile)->name ?? 'Zahra Nurizza Afifah' }}<br>
                <em>Creative</em> Designer
            </h1>
            <p class="hero-lead">{{ optional($profile)->bio ?? 'Mahasiswa Teknologi Multimedia Broadcasting yang bersemangat dalam desain grafis, fotografi, dan produksi media digital.' }}</p>
            <div class="hero-actions">
                <a class="btn btn-primary" href="{{ route('portfolio') }}">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                    Lihat Portfolio
                </a>
                <a class="btn btn-outline" href="{{ route('contact') }}">Hubungi Saya →</a>
            </div>

            <!-- Info chips -->
            <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:32px; margin-bottom:32px;">
                <div style="display:flex;align-items:center;gap:8px;padding:8px 14px;border-radius:999px;background:#fff;border:1px solid #e2e8f0;font-size:13px;font-weight:600;color:#64748b;box-shadow:0 2px 8px rgba(0,0,0,.06);">
                    🎓 {{ optional($profile)->program ?? 'Multimedia Broadcasting' }}
                </div>
                <div style="display:flex;align-items:center;gap:8px;padding:8px 14px;border-radius:999px;background:#fff;border:1px solid #e2e8f0;font-size:13px;font-weight:600;color:#64748b;box-shadow:0 2px 8px rgba(0,0,0,.06);">
                    📍 Surabaya, Indonesia
                </div>
            </div>

            <!-- Stats -->
            <div style="display:flex; gap:36px; align-items:center; border-top:1px solid var(--border); padding-top:24px;">
                <div class="hero-stat" style="text-align:left;">
                    <div class="hero-stat-num">{{ $portfolios->count() ?? 3 }}+</div>
                    <div class="hero-stat-label">Portfolio</div>
                </div>
                <div class="hero-stat" style="text-align:left;">
                    <div class="hero-stat-num">2+</div>
                    <div class="hero-stat-label">Tahun Exp</div>
                </div>
                <div class="hero-stat" style="text-align:left;">
                    <div class="hero-stat-num">6+</div>
                    <div class="hero-stat-label">Skills</div>
                </div>
            </div>
        </div>

        <!-- Profile Visual -->
        <div class="hero-visual">
            @if(!optional($profile)->photo_url)
            <div style="position:relative; display:flex; justify-content:flex-end;">
                <div class="hero-float-badge" style="z-index: 10;">
                    <div class="dot"></div>
                    <span>Open to Work</span>
                </div>
                
                <!-- Simplified Fallback Card -->
                <div class="hero-card" style="max-width:380px;">
                    <div class="hero-card-header" style="min-height:240px;">
                        <div class="hero-card-avatar">✨</div>
                        <div class="hero-card-name">{{ optional($profile)->name ?? 'Zahra Nurizza Afifah' }}</div>
                        <div class="hero-card-role">Creative Designer & Multimedia</div>
                    </div>
                    <div class="hero-card-body">
                        <div class="hero-card-tags">
                            @foreach(array_slice(optional($profile)->skills ?? ['Desain Grafis','Fotografi','Video Editing'], 0, 3) as $skill)
                                <span class="tag-chip">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- SKILLS SECTION -->
<section class="section section-alt">
    <div class="wrap">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:start;">
            <div>
                <div class="section-label">Kemampuan</div>
                <h2 class="section-title">Skill & Keahlian</h2>
                <p class="section-lead" style="margin-bottom:32px;">Tools dan kemampuan yang saya kuasai untuk menciptakan karya visual yang berkualitas.</p>

                @php
                    $skills = [
                        ['name' => 'Desain Grafis & Visual', 'pct' => 90],
                        ['name' => 'Editing Video & Foto', 'pct' => 85],
                        ['name' => 'Fotografi', 'pct' => 80],
                        ['name' => 'Public Speaking', 'pct' => 75],
                        ['name' => 'Microsoft 365', 'pct' => 85],
                    ];
                @endphp
                @foreach($skills as $skill)
                <div class="skill-item">
                    <div class="skill-top">
                        <span>{{ $skill['name'] }}</span>
                        <span class="skill-pct">{{ $skill['pct'] }}%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-fill" style="width:{{ $skill['pct'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>

            <div>
                <div class="section-label">Tentang</div>
                <h2 class="section-title">Tentang Singkat</h2>
                <p style="color:#64748b;margin-bottom:20px;line-height:1.8;font-size:15px;">
                    Program Studi: <strong>{{ optional($profile)->program ?? 'Teknologi Multimedia Broadcasting' }}</strong><br>
                    Kelas: <strong>{{ optional($profile)->class_name ?? '2 Multimedia Broadcasting A' }}</strong>
                </p>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    @php
                        $hobbies = optional($profile)->hobbies ?? ['Desain Grafis','Fotografi','Videografi','Editing'];
                    @endphp
                    @foreach($hobbies as $h)
                    <div style="display:flex;align-items:center;gap:10px;padding:14px 16px;background:#fff;border:1px solid #e2e8f0;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.05);">
                        <span style="font-size:20px;">
                            @if($loop->index==0)🎨@elseif($loop->index==1)📷@elseif($loop->index==2)🎬@else✂️@endif
                        </span>
                        <span style="font-size:14px;font-weight:600;">{{ $h }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PORTFOLIO PILIHAN -->
<section class="section">
    <div class="wrap">
        <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:32px;flex-wrap:wrap;gap:16px;">
            <div>
                <div class="section-label">Karya</div>
                <h2 class="section-title" style="margin-bottom:0;">Portfolio Pilihan</h2>
            </div>
            <a href="{{ route('portfolio') }}" class="btn btn-outline" style="padding:10px 22px;font-size:13px;">Lihat Semua →</a>
        </div>

        <div class="grid-3">
            @forelse($portfolios as $index => $portfolio)
            <article class="card" style="padding:0;overflow:hidden;">
                @if($portfolio->image_url)
                    <div style="height:180px;overflow:hidden;position:relative;">
                        <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" style="width:100%;height:100%;object-fit:cover;transition:transform 400ms;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                @else
                    <div class="port-thumb {{ $index === 1 ? 'alt' : ($index === 2 ? 'alt2' : '') }}"></div>
                @endif
                <div style="padding:20px;">
                    <span style="display:inline-flex;padding:4px 12px;border-radius:999px;background:#ede9fe;color:#7c3aed;font-size:12px;font-weight:700;margin-bottom:12px;">{{ $portfolio->category }}</span>
                    <h3 style="font-size:1.05rem;font-weight:800;margin-bottom:8px;">{{ $portfolio->title }}</h3>
                    <p style="font-size:13px;color:#64748b;line-height:1.6;">{{ Str::limit($portfolio->description, 90) }}</p>
                </div>
            </article>
            @empty
            @foreach([
                ['title'=>'Brand Visual Identity','cat'=>'Design','desc'=>'Perancangan identitas visual untuk kebutuhan kampus.','cls'=>''],
                ['title'=>'Cinematic Short Reel','cat'=>'Video','desc'=>'Editing short reel dengan pacing dinamis.','cls'=>'alt'],
                ['title'=>'Editorial Photo Series','cat'=>'Photography','desc'=>'Seri foto editorial dengan komposisi & tone warna.','cls'=>'alt2'],
            ] as $item)
            <article class="card" style="padding:0;overflow:hidden;">
                <div class="port-thumb {{ $item['cls'] }}"></div>
                <div style="padding:20px;">
                    <span style="display:inline-flex;padding:4px 12px;border-radius:999px;background:#ede9fe;color:#7c3aed;font-size:12px;font-weight:700;margin-bottom:12px;">{{ $item['cat'] }}</span>
                    <h3 style="font-size:1.05rem;font-weight:800;margin-bottom:8px;">{{ $item['title'] }}</h3>
                    <p style="font-size:13px;color:#64748b;line-height:1.6;">{{ $item['desc'] }}</p>
                </div>
            </article>
            @endforeach
            @endforelse
        </div>
    </div>
</section>

<!-- 3D CHARACTER SECTION -->
<section class="section section-alt">
    <div class="wrap">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:48px;align-items:center;">
            <div>
                <div class="section-label">Interaktif</div>
                <h2 class="section-title">Karakter 3D Zahra</h2>
                <p style="color:#64748b;line-height:1.8;margin-bottom:24px;">Model 3D interaktif yang menggambarkan karakter personal. Putar dan eksplorasi karakter ini menggunakan mouse!</p>
                <div style="display:flex;flex-direction:column;gap:12px;">
                    <div style="display:flex;align-items:center;gap:12px;"><span style="font-size:18px;">🖱️</span><span style="font-size:14px;color:#64748b;">Drag untuk memutar karakter</span></div>
                    <div style="display:flex;align-items:center;gap:12px;"><span style="font-size:18px;">🔍</span><span style="font-size:14px;color:#64748b;">Scroll untuk zoom in/out</span></div>
                    <div style="display:flex;align-items:center;gap:12px;"><span style="font-size:18px;">✨</span><span style="font-size:14px;color:#64748b;">Auto-rotate aktif secara default</span></div>
                </div>
            </div>
            <div style="background:#fff;border-radius:24px;overflow:hidden;border:1px solid #e2e8f0;box-shadow:0 20px 60px rgba(0,0,0,.1);">
                <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
                <model-viewer src="{{ asset('models/karakter_zahra.glb') }}" alt="3D character Zahra" camera-controls auto-rotate shadow-intensity="1" style="width:100%;height:460px;background:linear-gradient(135deg,#faf5ff,#f0f9ff);"></model-viewer>
            </div>
        </div>
    </div>
</section>

@endsection
