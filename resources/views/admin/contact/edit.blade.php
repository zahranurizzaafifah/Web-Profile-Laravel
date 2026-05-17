@extends('layouts.app')

@section('title', 'Admin Contact')

@section('content')
    <section class="section">
        <h2>Admin Contact</h2>
        <p class="muted">Kelola detail contact utama yang ditampilkan di halaman publik.</p>

        @if(session('success'))
            <div class="card" style="margin:18px 0; border-color: rgba(124,247,212,.35);">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="card" style="border-color: rgba(255,123,213,.45); margin:18px 0;">
                <strong>Periksa input:</strong>
                <ul class="clean" style="margin: 10px 0 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.contact.update') }}" class="card" style="display:grid; gap:14px;">
            @csrf
            @method('PUT')
            <div class="grid-2">
                <div>
                    <label class="muted">Email</label>
                    <input name="email" value="{{ old('email', $contact->email ?? '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
                </div>
                <div>
                    <label class="muted">Phone</label>
                    <input name="phone" value="{{ old('phone', $contact->phone ?? '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
                </div>
            </div>
            <div class="grid-2">
                <div>
                    <label class="muted">Instagram</label>
                    <input name="instagram" value="{{ old('instagram', $contact->instagram ?? '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
                </div>
                <div>
                    <label class="muted">GitHub</label>
                    <input name="github" value="{{ old('github', $contact->github ?? '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
                </div>
            </div>
            <div>
                <label class="muted">Location</label>
                <input name="location" value="{{ old('location', $contact->location ?? '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
            </div>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a class="btn btn-soft" href="{{ route('admin.portfolios.index') }}">Ke Portfolio Admin</a>
            </div>
        </form>
    </section>
@endsection
