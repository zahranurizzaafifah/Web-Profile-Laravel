@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <section class="section">
        <h2>Detail Contact</h2>
        <p class="muted">Hubungi melalui kanal berikut untuk kerja sama, tugas, atau progres pengumpulan.</p>
        <div class="grid-2" style="margin-top:18px;">
            <div class="card">
                <div class="tag">Info Kontak</div>
                @if($contact)
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                    <p><strong>Instagram:</strong> {{ $contact->instagram }}</p>
                    <p><strong>GitHub:</strong> {{ $contact->github }}</p>
                    <p><strong>Location:</strong> {{ $contact->location }}</p>
                @else
                    <p class="muted">Data contact akan muncul setelah seed ditambahkan.</p>
                @endif
            </div>
            <div class="card">
                <div class="tag">Catatan</div>
                <p class="muted">Untuk pengumpulan progres, nanti akun GitHub masing-masing dapat ditulis di sini atau di README deployment.</p>
                <a class="btn btn-primary" href="mailto:{{ $contact->email ?? 'hello@example.com' }}">Kirim Email</a>
            </div>
        </div>
    </section>
@endsection
