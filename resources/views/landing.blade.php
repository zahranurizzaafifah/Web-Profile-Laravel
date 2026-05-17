@extends('layouts.app')

@section('title', 'Landing - Zahra')

@section('content')
    <section class="hero">
        <div class="hero-grid">
            <div>
                <span class="eyebrow">Personal Web Profile</span>
                <h1 class="title">{{ $profile->name }}</h1>
                <p class="lead">{{ $profile->bio }}</p>
                <div class="actions">
                    <a class="btn btn-primary" href="{{ route('portfolio') }}">Lihat Portofolio</a>
                    <a class="btn btn-soft" href="{{ route('contact') }}">Kontak Langsung</a>
                </div>
            </div>
            <div class="model-card">
                <span class="label">Karakter 3D AI</span>
                <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
                <model-viewer src="https://modelviewer.dev/shared-assets/models/Astronaut.glb" alt="3D character" camera-controls auto-rotate shadow-intensity="1" style="width:100%;height:100%;min-height:460px;background:transparent;"></model-viewer>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Tentang Singkat</h2>
        <p class="muted">Program Studi: <strong>{{ $profile->program }}</strong> · Kelas: <strong>{{ $profile->class_name }}</strong></p>
        <div class="grid-3" style="margin-top:18px;">
            <div class="card">
                <div class="tag">Hobi</div>
                <ul class="clean">
                    @foreach(($profile->hobbies ?? []) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card">
                <div class="tag">Skill</div>
                <ul class="clean">
                    @foreach(($profile->skills ?? []) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card">
                <div class="tag">Highlight</div>
                <p class="muted">Kreativitas, visual storytelling, editing multimedia, dan presentasi yang rapi untuk kebutuhan tugas maupun proyek kampus.</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Portofolio Pilihan</h2>
        <div class="grid-3" style="margin-top:18px;">
            @forelse($portfolios as $index => $portfolio)
                <article class="card">
                    <div class="portfolio-thumb {{ $index === 1 ? 'alt' : ($index === 2 ? 'alt2' : '') }}"></div>
                    <div class="tag">{{ $portfolio->category }}</div>
                    <h3 style="margin:0 0 10px;font-size:1.25rem;">{{ $portfolio->title }}</h3>
                    <p class="muted">{{ $portfolio->description }}</p>
                </article>
            @empty
                <article class="card"><div class="portfolio-thumb"></div><div class="tag">Desain Visual</div><h3 style="margin:0 0 10px;font-size:1.25rem;">Mockup Konten Multimedia</h3><p class="muted">Portofolio akan muncul otomatis setelah data seed ditambahkan.</p></article>
                <article class="card"><div class="portfolio-thumb alt"></div><div class="tag">Fotografi</div><h3 style="margin:0 0 10px;font-size:1.25rem;">Story Photo Project</h3><p class="muted">Karya fotografi dengan visual yang bersih dan konsisten.</p></article>
                <article class="card"><div class="portfolio-thumb alt2"></div><div class="tag">Video Editing</div><h3 style="margin:0 0 10px;font-size:1.25rem;">Short Reel Campaign</h3><p class="muted">Editing video untuk media sosial dan presentasi tugas.</p></article>
            @endforelse
        </div>
    </section>
@endsection
