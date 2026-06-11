@extends('layouts.app')

@section('title', 'Portfolio - Zahra Nurizza Afifah')

@section('content')

<!-- PAGE HEADER -->
<div style="background:linear-gradient(135deg,#faf5ff,#f0f9ff);padding:60px 0 48px;border-bottom:1px solid #e2e8f0;">
    <div class="wrap">
        <div class="section-label">Karya</div>
        <h1 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;letter-spacing:-.02em;margin-bottom:10px;">
            Portfolio Lengkap
        </h1>
        <p style="color:#64748b;font-size:15px;">Kumpulan karya desain, fotografi, dan multimedia yang telah saya buat.</p>
    </div>
</div>

<!-- FILTER + GRID -->
<div class="wrap" style="padding-top:48px;padding-bottom:72px;">

    <!-- Category Filter -->
    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:36px;" id="filter-bar">
        <button class="filter-btn active" data-cat="all" onclick="filterPortfolio('all',this)">Semua</button>
        <button class="filter-btn" data-cat="Design" onclick="filterPortfolio('Design',this)">Design</button>
        <button class="filter-btn" data-cat="Video" onclick="filterPortfolio('Video',this)">Video</button>
        <button class="filter-btn" data-cat="Photography" onclick="filterPortfolio('Photography',this)">Photography</button>
    </div>

    <style>
        .filter-btn { padding:9px 20px;border-radius:999px;border:1.5px solid #e2e8f0;background:#fff;font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:700;color:#64748b;cursor:pointer;transition:180ms ease; }
        .filter-btn:hover { border-color:#7c3aed;color:#7c3aed; }
        .filter-btn.active { background:#7c3aed;border-color:#7c3aed;color:#fff; }
        .port-card { transition:all 300ms ease; }
        .port-card.hidden { display:none; }
    </style>

    <div class="grid-3" id="portfolio-grid">
        @php $thumbClasses = ['','alt','alt2']; @endphp
        @forelse($portfolios as $i => $portfolio)
        @php $thumbClasses = ['','alt','alt2']; @endphp
        <article class="card port-card" data-cat="{{ $portfolio->category }}" style="padding:0;overflow:hidden;cursor:pointer;" onclick="openModal('{{ addslashes($portfolio->title) }}','{{ addslashes($portfolio->category) }}','{{ addslashes($portfolio->description) }}','{{ addslashes($portfolio->image_url ?? '') }}')">
            @if($portfolio->image_url)
                <div style="height:180px;overflow:hidden;position:relative;">
                    <img src="{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}" style="width:100%;height:100%;object-fit:cover;transition:transform 400ms;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;top:12px;right:12px;padding:4px 10px;background:rgba(255,255,255,.9);border-radius:999px;font-size:11px;font-weight:700;color:#7c3aed;">{{ $portfolio->category }}</div>
                </div>
            @else
                <div class="port-thumb {{ $thumbClasses[$i % 3] }}" style="position:relative;">
                    <div style="position:absolute;top:12px;right:12px;padding:4px 10px;background:rgba(255,255,255,.9);border-radius:999px;font-size:11px;font-weight:700;color:#7c3aed;">{{ $portfolio->category }}</div>
                </div>
            @endif
            <div style="padding:20px;">
                <h3 style="font-size:1rem;font-weight:800;margin-bottom:8px;letter-spacing:-.01em;">{{ $portfolio->title }}</h3>
                <p style="font-size:13px;color:#64748b;line-height:1.6;margin-bottom:14px;">{{ Str::limit($portfolio->description, 90) }}</p>
                <span style="font-size:12px;font-weight:700;color:#7c3aed;">Lihat Detail -></span>
            </div>
        </article>
        @empty
        @foreach([
            ['t'=>'Brand Visual Identity','c'=>'Design','d'=>'Perancangan identitas visual dan template media sosial untuk kebutuhan kampus.','cls'=>''],
            ['t'=>'Cinematic Short Reel','c'=>'Video','d'=>'Editing short reel dengan pacing dinamis untuk promosi acara kampus.','cls'=>'alt'],
            ['t'=>'Editorial Photo Series','c'=>'Photography','d'=>'Seri foto editorial dengan fokus pada komposisi dan tone warna.','cls'=>'alt2'],
        ] as $item)
        <article class="card port-card" data-cat="{{ $item['c'] }}" style="padding:0;overflow:hidden;">
            <div class="port-thumb {{ $item['cls'] }}" style="position:relative;">
                <div style="position:absolute;top:12px;right:12px;padding:4px 10px;background:rgba(255,255,255,.9);border-radius:999px;font-size:11px;font-weight:700;color:#7c3aed;">{{ $item['c'] }}</div>
            </div>
            <div style="padding:20px;">
                <h3 style="font-size:1rem;font-weight:800;margin-bottom:8px;">{{ $item['t'] }}</h3>
                <p style="font-size:13px;color:#64748b;line-height:1.6;">{{ $item['d'] }}</p>
            </div>
        </article>
        @endforeach
        @endforelse
    </div>
</div>

<!-- MODAL -->
<div id="port-modal" style="display:none;position:fixed;inset:0;z-index:200;background:rgba(0,0,0,.55);backdrop-filter:blur(6px);align-items:center;justify-content:center;padding:24px;">
    <div style="background:#fff;border-radius:20px;overflow:hidden;max-width:520px;width:100%;box-shadow:0 30px 80px rgba(0,0,0,.25);position:relative;">
        <div id="modal-img-wrap" style="display:none;height:220px;overflow:hidden;">
            <img id="modal-img" src="" alt="" style="width:100%;height:100%;object-fit:cover;">
        </div>
        <div style="padding:28px 28px 24px;">
            <button onclick="closeModal()" style="position:absolute;top:14px;right:14px;width:32px;height:32px;border-radius:999px;border:1px solid rgba(255,255,255,.5);background:rgba(255,255,255,.9);cursor:pointer;font-size:16px;display:flex;align-items:center;justify-content:center;z-index:2;">x</button>
            <div id="modal-cat" style="display:inline-flex;padding:4px 12px;border-radius:999px;background:#ede9fe;color:#7c3aed;font-size:12px;font-weight:700;margin-bottom:12px;"></div>
            <h2 id="modal-title" style="font-size:1.25rem;font-weight:800;margin-bottom:10px;letter-spacing:-.02em;"></h2>
            <p id="modal-desc" style="color:#64748b;line-height:1.8;font-size:14px;"></p>
        </div>
    </div>
</div>

<script>
function filterPortfolio(cat, btn) {
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.port-card').forEach(card => {
        card.classList.toggle('hidden', cat !== 'all' && card.dataset.cat !== cat);
    });
}
function openModal(t, c, d, img) {
    document.getElementById('modal-title').textContent = t;
    document.getElementById('modal-cat').textContent = c;
    document.getElementById('modal-desc').textContent = d;
    const imgWrap = document.getElementById('modal-img-wrap');
    const imgEl   = document.getElementById('modal-img');
    if (img && img.length > 0) {
        imgEl.src = img;
        imgEl.alt = t;
        imgWrap.style.display = 'block';
    } else {
        imgWrap.style.display = 'none';
    }
    const m = document.getElementById('port-modal');
    m.style.display = 'flex';
}
function closeModal() {
    document.getElementById('port-modal').style.display = 'none';
}
document.getElementById('port-modal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});
</script>

@endsection
