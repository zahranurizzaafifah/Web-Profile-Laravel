@extends('layouts.admin')

@section('title', 'Kontak - Admin Zahra')
@section('page-title', 'Info Kontak')
@section('page-sub', 'Kelola detail kontak yang ditampilkan di website')

@section('topbar-actions')
    <a href="{{ route('contact') }}" target="_blank" class="topbar-btn btn-outline"> Lihat di Website</a>
@endsection

@section('content')
<div style="max-width:640px;">
    @if($errors->any())
        <div class="alert alert-danger">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <div>@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.contact.update') }}">
        @csrf @method('PUT')

        <div class="card" style="margin-bottom:20px;">
            <div class="card-title"> Detail Kontak</div>
            <div class="form-grid" style="gap:18px;">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-input" name="email" type="email" placeholder="email@example.com" value="{{ old('email', $contact->email ?? '') }}">
                </div>
                <div class="form-grid form-grid-2" style="gap:16px;">
                    <div class="form-group">
                        <label class="form-label">Instagram</label>
                        <input class="form-input" name="instagram" type="text" placeholder="@username" value="{{ old('instagram', $contact->instagram ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">GitHub</label>
                        <input class="form-input" name="github" type="text" placeholder="github.com/username" value="{{ old('github', $contact->github ?? '') }}">
                    </div>
                </div>
            </div>
        </div>

        <div style="display:flex;gap:12px;">
            <button type="submit" class="topbar-btn btn-primary" style="padding:12px 28px;font-size:14px;"> Simpan Kontak</button>
            <a href="{{ route('admin.portfolios.index') }}" class="topbar-btn btn-outline" style="padding:12px 22px;font-size:14px;">Batal</a>
        </div>
    </form>
</div>
@endsection
