@extends('layouts.admin')

@section('title', 'Dashboard - Admin Zahra')
@section('page-title', 'Dashboard')
@section('page-sub', 'Ringkasan data dan aktivitas website kamu')

@section('content')

<div class="stats-grid" style="grid-template-columns:repeat(4,1fr);">
    <div class="stat-card">
        <div class="stat-icon purple">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        </div>
        <div>
            <div class="stat-num">{{ $portfolioCount ?? 0 }}</div>
            <div class="stat-label">Total Portfolio</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon amber">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </div>
        <div>
            <div class="stat-num">1</div>
            <div class="stat-label">Profil Aktif</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <div>
            <div class="stat-num">1</div>
            <div class="stat-label">Info Kontak</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#cffafe;color:#0e7490;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        </div>
        <div>
            <div class="stat-num">4</div>
            <div class="stat-label">Halaman Publik</div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 340px;gap:24px;align-items:start;">
    <!-- Recent Portfolio -->
    <div class="card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
            <div class="card-title" style="margin:0;">Portfolio Terbaru</div>
            <a href="{{ route('admin.portfolios.create') }}" class="topbar-btn btn-primary" style="font-size:13px;padding:8px 16px;">+ Tambah Baru</a>
        </div>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios ?? [] as $p)
                    <tr>
                        <td style="font-weight:600;">{{ $p->title }}</td>
                        <td><span class="badge badge-purple">{{ $p->category ?? '-' }}</span></td>
                        <td>
                            <div class="actions-row">
                                <a href="{{ route('admin.portfolios.edit', $p) }}" class="topbar-btn btn-outline" style="padding:6px 14px;font-size:12px;">Edit</a>
                                <form action="{{ route('admin.portfolios.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus portfolio ini?')">
                                    @csrf @method('DELETE')
                                    <button class="topbar-btn btn-danger" type="submit" style="padding:6px 14px;font-size:12px;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" style="text-align:center;color:#94a3b8;padding:32px;">Belum ada portfolio. <a href="{{ route('admin.portfolios.create') }}" style="color:#7c3aed;font-weight:600;">Tambah sekarang -></a></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Quick Actions -->
    <div style="display:flex;flex-direction:column;gap:16px;">
        <div class="card">
            <div class="card-title">Aksi Cepat</div>
            <div style="display:flex;flex-direction:column;gap:10px;">
                <a href="{{ route('admin.portfolios.create') }}" style="display:flex;align-items:center;gap:12px;padding:14px;border-radius:10px;border:1px solid #e2e8f0;background:#fafbfc;transition:200ms;" onmouseover="this.style.borderColor='#7c3aed';this.style.background='#faf5ff'" onmouseout="this.style.borderColor='#e2e8f0';this.style.background='#fafbfc'">
                    <span style="font-size:20px;"></span>
                    <div>
                        <div style="font-size:14px;font-weight:700;">Tambah Portfolio</div>
                        <div style="font-size:12px;color:#94a3b8;">Unggah karya baru</div>
                    </div>
                </a>
                <a href="{{ route('admin.contact.edit') }}" style="display:flex;align-items:center;gap:12px;padding:14px;border-radius:10px;border:1px solid #e2e8f0;background:#fafbfc;transition:200ms;" onmouseover="this.style.borderColor='#7c3aed';this.style.background='#faf5ff'" onmouseout="this.style.borderColor='#e2e8f0';this.style.background='#fafbfc'">
                    <span style="font-size:20px;"></span>
                    <div>
                        <div style="font-size:14px;font-weight:700;">Edit Kontak</div>
                        <div style="font-size:12px;color:#94a3b8;">Update info kontak</div>
                    </div>
                </a>
                <a href="{{ route('admin.profile.edit') }}" style="display:flex;align-items:center;gap:12px;padding:14px;border-radius:10px;border:1px solid #e2e8f0;background:#fafbfc;transition:200ms;" onmouseover="this.style.borderColor='#7c3aed';this.style.background='#faf5ff'" onmouseout="this.style.borderColor='#e2e8f0';this.style.background='#fafbfc'">
                    <span style="font-size:20px;"></span>
                    <div>
                        <div style="font-size:14px;font-weight:700;">Edit Profil</div>
                        <div style="font-size:12px;color:#94a3b8;">Bio, skill, pendidikan</div>
                    </div>
                </a>
                <a href="{{ route('landing') }}" target="_blank" style="display:flex;align-items:center;gap:12px;padding:14px;border-radius:10px;border:1px solid #e2e8f0;background:#fafbfc;transition:200ms;" onmouseover="this.style.borderColor='#7c3aed';this.style.background='#faf5ff'" onmouseout="this.style.borderColor='#e2e8f0';this.style.background='#fafbfc'">
                    <span style="font-size:20px;"></span>
                    <div>
                        <div style="font-size:14px;font-weight:700;">Lihat Website</div>
                        <div style="font-size:12px;color:#94a3b8;">Buka halaman publik</div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Info Card -->
        <div class="card" style="background:linear-gradient(135deg,#7c3aed,#a78bfa);border:none;">
            <div style="color:#fff;">
                <div style="font-size:24px;margin-bottom:10px;">Info</div>
                <div style="font-weight:800;font-size:15px;margin-bottom:6px;">Website Aktif!</div>
                <div style="font-size:13px;opacity:.8;line-height:1.6;">Portfolio kamu bisa dilihat oleh siapapun melalui link website.</div>
                <a href="{{ route('landing') }}" target="_blank" style="display:inline-flex;align-items:center;gap:6px;margin-top:14px;padding:8px 16px;background:rgba(255,255,255,.2);border:1px solid rgba(255,255,255,.3);border-radius:999px;color:#fff;font-size:13px;font-weight:700;">
                    Buka Website-
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
