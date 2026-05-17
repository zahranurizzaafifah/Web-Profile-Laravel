@extends('layouts.app')

@section('title', 'Tentang Zahra')

@section('content')
    <section class="section">
        <h2>Tentang Diri</h2>
        <p class="lead" style="margin-top:0;">{{ optional($profile)->bio }}</p>
        <div class="grid-2" style="margin-top:18px;">
            <div class="card">
                <div class="tag">Identitas</div>
                <p><strong>Nama:</strong> {{ optional($profile)->name }}</p>
                <p><strong>Program:</strong> {{ optional($profile)->program }}</p>
                <p><strong>Kelas:</strong> {{ optional($profile)->class_name }}</p>
            </div>
            <div class="card">
                <div class="tag">Minat</div>
                <ul class="clean">
                    @foreach((optional($profile)->hobbies ?? []) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
