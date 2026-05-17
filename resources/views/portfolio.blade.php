@extends('layouts.app')

@section('title', 'Portofolio')

@section('content')
    <section class="section">
        <h2>Portofolio</h2>
        <p class="muted">Karya yang bisa ditampilkan sebagai hasil pengalaman magang, proyek kuliah, dan eksplorasi kreatif.</p>
        <div class="grid-3" style="margin-top:18px;">
            @forelse($portfolios as $portfolio)
                <article class="card">
                    <div class="portfolio-thumb"></div>
                    <div class="tag">{{ $portfolio->category }}</div>
                    <h3 style="margin:0 0 10px;font-size:1.25rem;">{{ $portfolio->title }}</h3>
                    <p class="muted">{{ $portfolio->description }}</p>
                    @if($portfolio->project_url)
                        <p style="margin-top:12px;"><a class="btn btn-soft" href="{{ $portfolio->project_url }}" target="_blank">Buka Project</a></p>
                    @endif
                </article>
            @empty
                <article class="card"><div class="portfolio-thumb"></div><div class="tag">Poster</div><h3 style="margin:0 0 10px;font-size:1.25rem;">Design Campaign Poster</h3><p class="muted">Poster event kampus dengan komposisi warna kuat.</p></article>
                <article class="card"><div class="portfolio-thumb alt"></div><div class="tag">Foto</div><h3 style="margin:0 0 10px;font-size:1.25rem;">Editorial Photo Series</h3><p class="muted">Seri foto editorial yang menonjolkan storytelling visual.</p></article>
                <article class="card"><div class="portfolio-thumb alt2"></div><div class="tag">Video</div><h3 style="margin:0 0 10px;font-size:1.25rem;">Motion Reel</h3><p class="muted">Reel video singkat untuk promosi dan dokumentasi.</p></article>
            @endforelse
        </div>
    </section>
@endsection
