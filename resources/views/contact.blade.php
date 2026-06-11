@extends('layouts.app')

@section('title', 'Kontak - Zahra Nurizza Afifah')

@section('content')

<!-- PAGE HEADER -->
<div style="background:linear-gradient(135deg,#faf5ff,#f0f9ff);padding:60px 0 48px;border-bottom:1px solid #e2e8f0;">
    <div class="wrap">
        <div class="section-label">Kontak</div>
        <h1 style="font-family:'Playfair Display',serif;font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;letter-spacing:-.02em;margin-bottom:10px;">
            Hubungi Saya
        </h1>
        <p style="color:#64748b;font-size:15px;">Ada pertanyaan atau mau berkolaborasi? Jangan ragu untuk menghubungi saya!</p>
    </div>
</div>

<div class="wrap" style="padding-top:56px;padding-bottom:80px;">
    @if(session('contact_success'))
        <div style="margin-bottom:24px;padding:14px 18px;border-radius:12px;background:#ecfdf5;border:1px solid #bbf7d0;color:#047857;font-size:14px;font-weight:700;">
            {{ session('contact_success') }}
        </div>
    @endif

    @if(session('contact_error'))
        <div style="margin-bottom:24px;padding:14px 18px;border-radius:12px;background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;font-size:14px;font-weight:700;">
            {{ session('contact_error') }}
        </div>
    @endif
    <div class="contact-grid">
        <!-- LEFT: Contact Info -->
        <div>
            <h2 style="font-size:1.3rem;font-weight:800;margin-bottom:8px;">Info Kontak</h2>
            <p style="color:#64748b;font-size:14px;margin-bottom:28px;line-height:1.7;">Tersedia untuk kolaborasi, freelance desain, maupun diskusi kreatif. Pilih platform yang paling nyaman untukmu.</p>

            @if(optional($contact)->email)
            <div class="contact-item">
                <div class="contact-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <div>
                    <div class="contact-label">Email</div>
                    <a href="mailto:{{ $contact->email }}" class="contact-val">{{ $contact->email }}</a>
                </div>
            </div>
            @endif

            @if(optional($contact)->instagram)
            <div class="contact-item">
                <div class="contact-icon" style="background:#fce7f3;color:#db2777;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                </div>
                <div>
                    <div class="contact-label">Instagram</div>
                    <a href="https://instagram.com/{{ ltrim($contact->instagram,'@') }}" class="contact-val" target="_blank">{{ $contact->instagram }}</a>
                </div>
            </div>
            @endif

            @if(optional($contact)->github)
            <div class="contact-item">
                <div class="contact-icon" style="background:#f1f5f9;color:#334155;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"/></svg>
                </div>
                <div>
                    <div class="contact-label">GitHub</div>
                    <a href="https://{{ $contact->github }}" class="contact-val" target="_blank">{{ $contact->github }}</a>
                </div>
            </div>
            @endif

            @if(!optional($contact)->email)
            <div style="text-align:center;padding:48px 20px;border:2px dashed #e2e8f0;border-radius:16px;color:#94a3b8;">
                <div style="font-size:14px;font-weight:600;">Info kontak belum diatur</div>
                <div style="font-size:13px;margin-top:4px;">Admin dapat mengaturnya di panel admin</div>
            </div>
            @endif
        </div>

        <!-- RIGHT: Visual + CTA -->
        <div style="display:flex;flex-direction:column;gap:20px;">
            <div class="card" style="background:linear-gradient(135deg,#7c3aed,#a78bfa);border:none;padding:36px;">
                <h3 style="font-size:1.25rem;font-weight:800;color:#fff;margin-bottom:10px;line-height:1.3;">Siap untuk berkolaborasi?</h3>
                <p style="color:rgba(255,255,255,.75);font-size:14px;line-height:1.8;margin-bottom:24px;">Saya terbuka untuk proyek desain grafis, fotografi, editing video, dan proyek multimedia lainnya.</p>
                <form method="POST" action="{{ route('contact.send') }}" style="display:flex;flex-direction:column;gap:12px;">
                    @csrf
                    <input name="name" type="text" value="{{ old('name') }}" placeholder="Nama kamu" required style="width:100%;padding:12px 14px;border:0;border-radius:12px;background:rgba(255,255,255,.96);font-family:inherit;font-size:14px;outline:none;">
                    @error('name') <div style="color:#fff;font-size:12px;font-weight:700;">{{ $message }}</div> @enderror

                    <input name="email" type="email" value="{{ old('email') }}" placeholder="Email kamu" required style="width:100%;padding:12px 14px;border:0;border-radius:12px;background:rgba(255,255,255,.96);font-family:inherit;font-size:14px;outline:none;">
                    @error('email') <div style="color:#fff;font-size:12px;font-weight:700;">{{ $message }}</div> @enderror

                    <input name="subject" type="text" value="{{ old('subject') }}" placeholder="Subjek (opsional)" style="width:100%;padding:12px 14px;border:0;border-radius:12px;background:rgba(255,255,255,.96);font-family:inherit;font-size:14px;outline:none;">
                    @error('subject') <div style="color:#fff;font-size:12px;font-weight:700;">{{ $message }}</div> @enderror

                    <textarea name="message" rows="5" placeholder="Tulis pesan..." required style="width:100%;padding:12px 14px;border:0;border-radius:12px;background:rgba(255,255,255,.96);font-family:inherit;font-size:14px;line-height:1.6;resize:vertical;outline:none;">{{ old('message') }}</textarea>
                    @error('message') <div style="color:#fff;font-size:12px;font-weight:700;">{{ $message }}</div> @enderror

                    <button type="submit" style="display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:12px 22px;background:#fff;border:0;border-radius:999px;color:#7c3aed;font-size:14px;font-weight:800;cursor:pointer;transition:200ms;font-family:inherit;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='none'">
                        Kirim Pesan
                    </button>
                </form>
            </div>
            <div class="card">
                <div class="card-title">Waktu Respons</div>
                <p style="color:#64748b;font-size:14px;line-height:1.7;">Biasanya saya membalas dalam <strong style="color:#1e293b;">1-2 hari kerja</strong>. Untuk keperluan mendesak, hubungi via WhatsApp.</p>
                <div style="display:flex;gap:10px;margin-top:16px;flex-wrap:wrap;">
                    <div style="padding:10px 14px;background:#f8fafc;border-radius:10px;border:1px solid #e2e8f0;font-size:13px;font-weight:600;color:#475569;">
                        Sen-Jum
                    </div>
                    <div style="padding:10px 14px;background:#f8fafc;border-radius:10px;border:1px solid #e2e8f0;font-size:13px;font-weight:600;color:#475569;">
                        09.00-17.00 WIB
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
