@extends('layouts.admin')

@section('title', 'Portfolio - Admin Zahra')
@section('page-title', 'Portfolio')
@section('page-sub', 'Kelola semua karya dan proyek kamu')

@section('topbar-actions')
    <a href="{{ route('admin.portfolios.create') }}" class="topbar-btn btn-primary">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Tambah Portfolio
    </a>
@endsection

@section('content')
<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul Karya</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $i => $portfolio)
                <tr>
                    <td style="color:#94a3b8;font-size:13px;">{{ $i + 1 }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:12px;">
                            <div style="width:42px;height:42px;border-radius:10px;background:linear-gradient(135deg,#7c3aed,#a78bfa);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:14px;flex-shrink:0;">
                                {{ strtoupper(substr($portfolio->title, 0, 1)) }}
                            </div>
                            <span style="font-weight:700;font-size:14px;">{{ $portfolio->title }}</span>
                        </div>
                    </td>
                    <td>
                        @php $colors = ['Design'=>'purple','Video'=>'blue','Photography'=>'amber','default'=>'green']; $c = $colors[$portfolio->category] ?? $colors['default']; @endphp
                        <span class="badge badge-{{ $c }}">{{ $portfolio->category ?? 'Umum' }}</span>
                    </td>
                    <td style="max-width:260px;color:#64748b;font-size:13px;">{{ Str::limit($portfolio->description, 70) }}</td>
                    <td>
                        <div class="actions-row">
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="topbar-btn btn-outline" style="padding:7px 16px;font-size:13px;">
                                 Edit
                            </a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Yakin hapus portfolio ini?')">
                                @csrf @method('DELETE')
                                <button class="topbar-btn btn-danger" type="submit" style="padding:7px 16px;font-size:13px;">- Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:48px 20px;">
                        <div style="font-size:40px;margin-bottom:12px;">-</div>
                        <div style="font-weight:700;font-size:15px;margin-bottom:6px;">Belum ada portfolio</div>
                        <div style="color:#94a3b8;font-size:13px;margin-bottom:16px;">Mulai tambahkan karya pertamamu</div>
                        <a href="{{ route('admin.portfolios.create') }}" class="topbar-btn btn-primary">+ Tambah Portfolio</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
