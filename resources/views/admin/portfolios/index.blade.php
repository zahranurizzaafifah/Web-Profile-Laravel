@extends('layouts.app')

@section('title', 'Admin Portfolio')

@section('content')
    <section class="section">
        <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap;">
            <div>
                <h2 style="margin-bottom:6px;">Admin Portfolio</h2>
                <p class="muted" style="margin:0;">Kelola semua karya portfolio di sini.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('admin.portfolios.create') }}">Tambah Portfolio</a>
        </div>

        @if(session('success'))
            <div class="card" style="margin-top:18px; border-color: rgba(124,247,212,.35);">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid-3" style="margin-top:18px;">
            @forelse($portfolios as $portfolio)
                <article class="card">
                    <div class="tag">{{ $portfolio->category ?? 'General' }}</div>
                    <h3 style="margin:0 0 8px;">{{ $portfolio->title }}</h3>
                    <p class="muted">{{ $portfolio->description }}</p>
                    <p style="display:flex; gap:10px; flex-wrap:wrap; margin-top:14px;">
                        <a class="btn btn-soft" href="{{ route('admin.portfolios.edit', $portfolio) }}">Edit</a>
                        <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Hapus portfolio ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-soft" type="submit">Hapus</button>
                        </form>
                    </p>
                </article>
            @empty
                <div class="card">Belum ada data portfolio.</div>
            @endforelse
        </div>
    </section>
@endsection
