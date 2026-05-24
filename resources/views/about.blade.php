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

        <h2 style="margin-top: 40px;">Pendidikan</h2>
        <div class="card" style="margin-top: 18px;">
            <h3 style="margin: 0; font-size: 1.1rem;">Program Studi Multimedia Broadcasting</h3>
            <p class="muted" style="margin: 5px 0 10px;">Politeknik Elektronika Negeri Surabaya (2024 - Sekarang)</p>
            <p style="margin: 0;">Panitia personal branding di dunia kreatif dan berkarya menggunakan software berperan aktif dalam pengembangan koordinasi acara komunitas.</p>
            
            <hr style="border: 0; border-top: 1px solid #ddd; margin: 15px 0;">
            
            <h3 style="margin: 0; font-size: 1.1rem;">Desain Komunikasi Visual</h3>
            <p class="muted" style="margin: 5px 0 10px;">SMK Negeri 13 Surabaya (2021 - 2024)</p>
            <p style="margin: 0;">Competency assessment test membuat alat promosi untuk festival wisata daerah berupa karya sketsa desain, poster 3D brosur paket wisata.</p>
        </div>

        <h2 style="margin-top: 40px;">Pengalaman</h2>
        <div class="card" style="margin-top: 18px;">
            <h3 style="margin: 0; font-size: 1.1rem;">Vector Designer (Biro Reklame Surabaya)</h3>
            <p class="muted" style="margin: 5px 0 10px;">Surabaya, Jawa Timur, Indonesia (Feb 2022 - April 2026)</p>
            <ul style="margin: 0; padding-left: 20px;">
                <li>Merancang dan membuat konsep logo, desain stempel, dan aset grafis dasar lainnya menggunakan CorelDRAW untuk berbagai kebutuhan klien dan internal.</li>
                <li>Berkolaborasi dengan anggota tim untuk memastikan output desain sesuai dengan spesifikasi yang diminta dan persyaratan fungsional.</li>
                <li>Desain yang disesuaikan dan disempurnakan berdasarkan umpan balik klien untuk meningkatkan kejelasan, dampak visual, dan kegunaan.</li>
                <li>Memanfaatkan alat CorelDRAW untuk menyiapkan file siap cetak, memastikan tata letak, ukuran, dan konsistensi warna yang akurat.</li>
                <li>Mendukung produksi dengan mengatur aset desain dan mengoptimalkan alur kerja untuk waktu penyelesaian yang lebih cepat.</li>
            </ul>

            <hr style="border: 0; border-top: 1px solid #ddd; margin: 15px 0;">

            <h3 style="margin: 0; font-size: 1.1rem;">PKL Di Bidang Photographer (Studio Photo Silver)</h3>
            <p class="muted" style="margin: 5px 0 10px;">Surabaya (2022 - 2023)</p>
            <p style="margin: 0;">Selama PKL, saya belajar cara mengatur pencahayaan, mengambil foto, dan mengedit gambar dengan perangkat lunak khusus. Saya juga belajar tentang komposisi foto dan menghasilkan yang mereka inginkan.</p>
        </div>

        <h2 style="margin-top: 40px;">Organisasi & Kegiatan</h2>
        <div class="card" style="margin-top: 18px;">
            <ul class="clean" style="gap: 15px; display: flex; flex-direction: column;">
                <li>
                    <strong>Divisi Acara – Project Multimedia (Kelas)</strong> <span class="muted">(2024)</span>
                    <div style="color: #ffffff; margin-top: 5px; line-height: 1.6;">Berperan dalam perencanaan dan pelaksanaan konsep acara multimedia, mengatur alur kegiatan agar berjalan sesuai rundown, dan bekerja sama dalam tim untuk memastikan acara berjalan lancar.</div>
                </li>
                <li>
                    <strong>Tim Kreatif – MMBFEST (Multimedia Festival)</strong> <span class="muted">(2026)</span>
                    <div style="color: #ffffff; margin-top: 5px; line-height: 1.6;">Mengembangkan ide kreatif untuk konsep acara dan visual, berkontribusi dalam pembuatan desain dan konten promosi, serta bekerja sama dalam tim untuk menghasilkan konsep acara yang menarik.</div>
                </li>
                <li>
                    <strong>Lab Tour – DTMK Expo 2026</strong> <span class="muted">(2026)</span>
                    <div style="color: #ffffff; margin-top: 5px; line-height: 1.6;">Bertugas sebagai pemandu dalam kegiatan lab tour, menjelaskan fasilitas dan kegiatan di laboratorium kepada pengunjung, dan membantu membangun komunikasi yang baik dengan peserta acara.</div>
                </li>
            </ul>
        </div>
    </section>
@endsection
