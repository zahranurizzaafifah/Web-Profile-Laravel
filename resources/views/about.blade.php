@extends('layouts.app')

@section('title', 'Tentang - ' . ($profile->name ?? 'Zahra Nurizza Afifah'))

@section('content')

<!-- PAGE HEADER -->
<div style="background:linear-gradient(135deg,#faf5ff,#f0f9ff);padding:60px 0 48px;border-bottom:1px solid #e2e8f0;">
    <div class="wrap">
        <div class="section-label">Profil</div>
        <h1 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;letter-spacing:-.02em;margin-bottom:10px;">
            Tentang Saya
        </h1>
        <p style="color:#64748b;font-size:15px;">Kenali lebih dekat tentang perjalanan, pendidikan, dan pengalaman saya.</p>
    </div>
</div>

<div class="wrap" style="padding-top:48px;padding-bottom:72px;">
    <div style="display:grid;grid-template-columns:300px 1fr;gap:40px;align-items:start;">

        <!-- LEFT: Profile Card -->
        <div style="position:sticky;top:88px;">
            <div class="card" style="text-align:center;padding:32px 24px;">
                @if($profile->photo_url)
                    <img src="{{ $profile->photo_url }}" alt="{{ $profile->name }}"
                         style="width:100px;height:100px;border-radius:50%;object-fit:cover;border:3px solid #ede9fe;box-shadow:0 4px 20px rgba(124,58,237,.25);margin:0 auto 20px;display:block;">
                @else
                    <div style="width:80px;height:80px;border-radius:20px;background:linear-gradient(135deg,#7c3aed,#a78bfa);display:flex;align-items:center;justify-content:center;font-size:36px;margin:0 auto 20px;box-shadow:0 8px 24px rgba(124,58,237,.3);">
                        👩‍🎨
                    </div>
                @endif
                <h2 style="font-size:1.1rem;font-weight:800;margin-bottom:4px;">{{ $profile->name }}</h2>
                <p style="font-size:13px;color:#7c3aed;font-weight:600;margin-bottom:16px;">Creative Designer & Multimedia</p>
                <div style="background:#f8fafc;border-radius:12px;padding:16px;text-align:left;margin-bottom:16px;">
                    <div style="display:flex;flex-direction:column;gap:10px;">
                        <div>
                            <div style="font-size:11px;color:#94a3b8;font-weight:700;text-transform:uppercase;letter-spacing:.06em;">Program Studi</div>
                            <div style="font-size:13px;font-weight:600;margin-top:2px;">{{ $profile->program }}</div>
                        </div>
                        <div>
                            <div style="font-size:11px;color:#94a3b8;font-weight:700;text-transform:uppercase;letter-spacing:.06em;">Kelas</div>
                            <div style="font-size:13px;font-weight:600;margin-top:2px;">{{ $profile->class_name }}</div>
                        </div>
                    </div>
                </div>
                @if(!empty($profile->skills))
                <div style="display:flex;flex-wrap:wrap;gap:6px;justify-content:center;">
                    @foreach(array_slice($profile->skills, 0, 6) as $s)
                        <span style="padding:4px 10px;border-radius:999px;background:#ede9fe;color:#7c3aed;font-size:11px;font-weight:700;">{{ $s }}</span>
                    @endforeach
                </div>
                @endif
            </div>

            @if(!empty($profile->hobbies))
            <div class="card" style="margin-top:16px;">
                <div class="card-title">🎯 Hobi & Minat</div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                    @php $hobbyIcons = ['🎨','📷','🎬','✂️','🖌️','🎵','📝','🎮']; @endphp
                    @foreach($profile->hobbies as $i => $h)
                    <div style="display:flex;align-items:center;gap:8px;padding:10px 12px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;">
                        <span style="font-size:16px;">{{ $hobbyIcons[$i % count($hobbyIcons)] }}</span>
                        <span style="font-size:12px;font-weight:600;">{{ $h }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- RIGHT: Content -->
        <div>
            <!-- Bio -->
            @if($profile->bio)
            <div class="card" style="margin-bottom:24px;">
                <div class="card-title">👋 Bio Singkat</div>
                <p style="color:#475569;line-height:1.85;font-size:15px;">{{ $profile->bio }}</p>
            </div>
            @endif

            <!-- Skills -->
            @if(!empty($profile->skills))
            <div class="card" style="margin-bottom:24px;">
                <div class="card-title">⚡ Kemampuan & Skill</div>
                @php
                    $skillPcts = [90, 85, 80, 85, 85, 75, 80, 70];
                @endphp
                @foreach($profile->skills as $i => $skill)
                <div style="margin-bottom:16px;">
                    <div style="display:flex;justify-content:space-between;margin-bottom:6px;font-size:14px;font-weight:600;">
                        <span>{{ $skill }}</span>
                        <span style="color:#7c3aed;font-weight:700;">{{ $skillPcts[$i % count($skillPcts)] }}%</span>
                    </div>
                    <div style="height:8px;background:#e2e8f0;border-radius:999px;overflow:hidden;">
                        <div style="height:100%;border-radius:999px;background:linear-gradient(90deg,#7c3aed,#a78bfa);width:{{ $skillPcts[$i % count($skillPcts)] }}%;transition:width 1s ease;"></div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Pendidikan -->
            @if(!empty($profile->education))
            <div class="card" style="margin-bottom:24px;">
                <div class="card-title">🎓 Pendidikan</div>
                <div class="timeline">
                    @foreach($profile->education as $i => $edu)
                    <div class="tl-item">
                        <div class="tl-dot" style="{{ $i > 0 ? 'background:#a78bfa;box-shadow:0 0 0 2px #a78bfa;' : '' }}"></div>
                        @if(!empty($edu['period']))<div class="tl-date">{{ $edu['period'] }}</div>@endif
                        <div class="tl-title">{{ $edu['title'] }}</div>
                        @if(!empty($edu['org']))<div class="tl-org">{{ $edu['org'] }}</div>@endif
                        @if(!empty($edu['desc']))<div class="tl-desc">{{ $edu['desc'] }}</div>@endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Pengalaman -->
            @if(!empty($profile->experience))
            <div class="card" style="margin-bottom:24px;">
                <div class="card-title">💼 Pengalaman Kerja</div>
                <div class="timeline">
                    @foreach($profile->experience as $i => $exp)
                    <div class="tl-item">
                        <div class="tl-dot" style="{{ $i > 0 ? 'background:#a78bfa;box-shadow:0 0 0 2px #a78bfa;' : '' }}"></div>
                        @if(!empty($exp['period']))<div class="tl-date">{{ $exp['period'] }}</div>@endif
                        <div class="tl-title">{{ $exp['title'] }}</div>
                        @if(!empty($exp['org']))<div class="tl-org">{{ $exp['org'] }}</div>@endif
                        @if(!empty($exp['desc']))<div class="tl-desc">{{ $exp['desc'] }}</div>@endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Organisasi -->
            @if(!empty($profile->organizations))
            <div class="card">
                <div class="card-title">🏆 Organisasi & Kegiatan</div>
                <div style="display:flex;flex-direction:column;gap:12px;">
                    @foreach($profile->organizations as $org)
                    <div style="display:flex;gap:14px;padding:14px;background:#f8fafc;border-radius:12px;border:1px solid #e2e8f0;">
                        <span style="font-size:22px;flex-shrink:0;margin-top:2px;">{{ $org['icon'] ?? '🏆' }}</span>
                        <div>
                            <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:4px;">
                                <span style="font-size:14px;font-weight:700;">{{ $org['title'] }}</span>
                                @if(!empty($org['year']))
                                <span style="padding:2px 8px;border-radius:999px;background:#ede9fe;color:#7c3aed;font-size:11px;font-weight:700;">{{ $org['year'] }}</span>
                                @endif
                            </div>
                            @if(!empty($org['desc']))
                            <p style="font-size:13px;color:#64748b;line-height:1.6;margin:0;">{{ $org['desc'] }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
