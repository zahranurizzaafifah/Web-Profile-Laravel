@extends('layouts.admin')

@section('title', 'Edit Profil - Admin')
@section('page-title', 'Edit Profil')
@section('page-sub', 'Kelola semua informasi profil yang tampil di website')

@section('topbar-actions')
    <a href="{{ route('about') }}" target="_blank" class="topbar-btn btn-outline"> Lihat di Website</a>
@endsection

@section('content')
<style>
    .section-card { background:#fff; border:1px solid #e2e8f0; border-radius:14px; padding:26px; margin-bottom:22px; box-shadow:0 1px 4px rgba(0,0,0,.05); }
    .section-card-title { font-size:15px; font-weight:700; margin-bottom:20px; display:flex; align-items:center; gap:8px; }
    .repeater-row { display:grid; gap:12px; background:#f8fafc; border:1px solid #e2e8f0; border-radius:12px; padding:16px; margin-bottom:12px; position:relative; }
    .repeater-row .remove-btn { position:absolute; top:12px; right:12px; width:28px; height:28px; border-radius:999px; border:1px solid #fecaca; background:#fef2f2; color:#ef4444; cursor:pointer; display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; }
    .repeater-row .remove-btn:hover { background:#ef4444; color:#fff; }
    .add-row-btn { display:inline-flex; align-items:center; gap:6px; padding:9px 18px; border-radius:8px; border:1.5px dashed #7c3aed; background:#faf5ff; color:#7c3aed; font-size:13px; font-weight:700; cursor:pointer; transition:180ms; }
    .add-row-btn:hover { background:#ede9fe; }
    .col-2 { grid-template-columns:1fr 1fr; }
    .col-3 { grid-template-columns:1fr 1fr 1fr; }
</style>

<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    @if($errors->any())
    <div class="alert alert-danger" style="margin-bottom:20px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <div>@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
    </div>
    @endif

    {{--  IDENTITAS  --}}
    <div class="section-card">
        <div class="section-card-title"> Identitas & Foto</div>
        <div style="display:grid;grid-template-columns:160px 1fr;gap:24px;align-items:start;">
            {{-- Photo --}}
            <div style="text-align:center;">
                <div id="photo-preview-wrap" style="{{ optional($profile)->photo_url ? '' : 'display:none;' }}">
                    <img id="photo-preview" src="{{ optional($profile)->photo_url }}" style="width:120px;height:120px;border-radius:50%;object-fit:cover;border:3px solid #ede9fe;box-shadow:0 4px 16px rgba(124,58,237,.2);display:block;margin:0 auto 12px;">
                </div>
                <div id="photo-placeholder" style="{{ optional($profile)->photo_url ? 'display:none;' : '' }}width:120px;height:120px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#a78bfa);display:flex;align-items:center;justify-content:center;font-size:40px;margin:0 auto 12px;">
                    
                </div>
                <button type="button" onclick="document.getElementById('photo-input').click()" class="topbar-btn btn-outline" style="font-size:12px;padding:6px 14px;"> Ganti Foto</button>
                <input type="file" id="photo-input" name="photo" accept="image/*" style="display:none;" onchange="previewPhoto(event)">
            </div>
            {{-- Fields --}}
            <div style="display:flex;flex-direction:column;gap:14px;">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span style="color:#ef4444">*</span></label>
                    <input class="form-input" name="name" type="text" value="{{ old('name', optional($profile)->name ?? 'Zahra Nurizza Afifah') }}" required>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                    <div class="form-group">
                        <label class="form-label">Program Studi</label>
                        <input class="form-input" name="program" type="text" value="{{ old('program', optional($profile)->program ?? 'Teknologi Multimedia Broadcasting') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kelas</label>
                        <input class="form-input" name="class_name" type="text" value="{{ old('class_name', optional($profile)->class_name ?? '2 Multimedia Broadcasting A') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Bio / Deskripsi</label>
                    <textarea class="form-textarea" name="bio" rows="4">{{ old('bio', optional($profile)->bio) }}</textarea>
                </div>
            </div>
        </div>
    </div>

    {{--  SKILLS  --}}
    <div class="section-card">
        <div class="section-card-title"> Skills</div>
        <p style="font-size:13px;color:#64748b;margin-bottom:12px;">Tulis satu skill per baris.</p>
        <textarea class="form-textarea" name="skills_raw" rows="6" placeholder="Desain Grafis&#10;Fotografi&#10;Video Editing&#10;...">{{ old('skills_raw', implode("\n", optional($profile)->skills ?? ['Desain Grafis & Produksi','Editing Video & Foto','Fotografi','Public Speaking','Microsoft 365','Kerja Tim & Komunikasi Efektif'])) }}</textarea>
    </div>

    {{--  HOBBIES  --}}
    <div class="section-card">
        <div class="section-card-title"> Hobi / Minat</div>
        <p style="font-size:13px;color:#64748b;margin-bottom:12px;">Tulis satu hobi per baris.</p>
        <textarea class="form-textarea" name="hobbies_raw" rows="4" placeholder="Desain Grafis&#10;Fotografi&#10;Videografi&#10;...">{{ old('hobbies_raw', implode("\n", optional($profile)->hobbies ?? ['Desain Grafis','Fotografi','Videografi','Editing'])) }}</textarea>
    </div>

    {{--  PENDIDIKAN  --}}
    <div class="section-card">
        <div class="section-card-title"> Pendidikan</div>
        <div id="edu-list">
            @php
                $education = optional($profile)->education ?? [
                    ['title'=>'Teknologi Multimedia Broadcasting','org'=>'PENS','period'=>'2024  Sekarang','desc'=>''],
                    ['title'=>'Desain Komunikasi Visual','org'=>'SMK Negeri 13 Surabaya','period'=>'2021  2024','desc'=>''],
                ];
            @endphp
            @foreach($education as $i => $edu)
            <div class="repeater-row col-2" id="edu-row-{{ $i }}">
                <button type="button" class="remove-btn" onclick="removeRow(this.parentElement)">x</button>
                <div class="form-group">
                    <label class="form-label">Jenjang / Jurusan</label>
                    <input class="form-input" name="edu_title[]" value="{{ $edu['title'] }}" placeholder="cth: Teknologi Multimedia Broadcasting">
                </div>
                <div class="form-group">
                    <label class="form-label">Institusi</label>
                    <input class="form-input" name="edu_org[]" value="{{ $edu['org'] }}" placeholder="cth: PENS">
                </div>
                <div class="form-group">
                    <label class="form-label">Periode</label>
                    <input class="form-input" name="edu_period[]" value="{{ $edu['period'] }}" placeholder="cth: 2024  Sekarang">
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <input class="form-input" name="edu_desc[]" value="{{ $edu['desc'] }}" placeholder="Opsional...">
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="add-row-btn" onclick="addRow('edu-list', eduTemplate())">+ Tambah Pendidikan</button>
    </div>

    {{--  PENGALAMAN KERJA  --}}
    <div class="section-card">
        <div class="section-card-title"> Pengalaman Kerja</div>
        <div id="exp-list">
            @php
                $experience = optional($profile)->experience ?? [
                    ['title'=>'Vector Designer','org'=>'Biro Reklame Surabaya','period'=>'Feb 2022  April 2026','desc'=>'Merancang logo, desain stempel, dan aset grafis menggunakan CorelDRAW'],
                    ['title'=>'PKL  Fotografer','org'=>'Studio Photo Silver','period'=>'2022  2023','desc'=>'Teknik pengambilan foto dan editing gambar'],
                ];
            @endphp
            @foreach($experience as $i => $exp)
            <div class="repeater-row col-2">
                <button type="button" class="remove-btn" onclick="removeRow(this.parentElement)">x</button>
                <div class="form-group">
                    <label class="form-label">Posisi / Jabatan</label>
                    <input class="form-input" name="exp_title[]" value="{{ $exp['title'] }}" placeholder="cth: Vector Designer">
                </div>
                <div class="form-group">
                    <label class="form-label">Perusahaan / Tempat</label>
                    <input class="form-input" name="exp_org[]" value="{{ $exp['org'] }}" placeholder="cth: Biro Reklame Surabaya">
                </div>
                <div class="form-group">
                    <label class="form-label">Periode</label>
                    <input class="form-input" name="exp_period[]" value="{{ $exp['period'] }}" placeholder="cth: 2022  2023">
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <input class="form-input" name="exp_desc[]" value="{{ $exp['desc'] }}" placeholder="Opsional...">
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="add-row-btn" onclick="addRow('exp-list', expTemplate())">+ Tambah Pengalaman</button>
    </div>

    {{--  ORGANISASI  --}}
    <div class="section-card">
        <div class="section-card-title"> Organisasi & Kegiatan</div>
        <div id="org-list">
            @php
                $organizations = optional($profile)->organizations ?? [
                    ['title'=>'Divisi Acara  Project Multimedia','year'=>'2024','icon'=>'','desc'=>'Perencanaan dan pelaksanaan konsep acara multimedia'],
                    ['title'=>'Tim Kreatif  MMBFEST','year'=>'2026','icon'=>'','desc'=>'Mengembangkan ide kreatif untuk konsep acara visual'],
                    ['title'=>'Lab Tour  DTMK Expo 2026','year'=>'2026','icon'=>'','desc'=>'Pemandu kegiatan lab tour'],
                ];
            @endphp
            @foreach($organizations as $i => $org)
            <div class="repeater-row" style="grid-template-columns:60px 1fr 1fr 100px;gap:12px;">
                <button type="button" class="remove-btn" onclick="removeRow(this.parentElement)">x</button>
                <div class="form-group">
                    <label class="form-label">Icon</label>
                    <input class="form-input" name="org_icon[]" value="{{ $org['icon'] }}" placeholder="********" style="text-align:center;font-size:20px;">
                </div>
                <div class="form-group" style="grid-column:span 2;">
                    <label class="form-label">Nama Kegiatan</label>
                    <input class="form-input" name="org_title[]" value="{{ $org['title'] }}" placeholder="cth: Divisi Acara MMBFEST">
                </div>
                <div class="form-group">
                    <label class="form-label">Tahun</label>
                    <input class="form-input" name="org_year[]" value="{{ $org['year'] }}" placeholder="2024">
                </div>
                <div class="form-group" style="grid-column:1/-1;">
                    <label class="form-label">Deskripsi</label>
                    <input class="form-input" name="org_desc[]" value="{{ $org['desc'] }}" placeholder="Opsional...">
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="add-row-btn" onclick="addRow('org-list', orgTemplate())">+ Tambah Organisasi</button>
    </div>

    {{-- SUBMIT --}}
    <div style="display:flex;gap:12px;padding-bottom:20px;">
        <button type="submit" class="topbar-btn btn-primary" style="padding:13px 32px;font-size:15px;"> Simpan Semua Perubahan</button>
        <a href="{{ route('about') }}" target="_blank" class="topbar-btn btn-outline" style="padding:13px 22px;font-size:15px;"> Preview</a>
    </div>
</form>

<script>
function removeRow(el) {
    if (el.parentElement.querySelectorAll('.repeater-row').length <= 1) {
        el.style.display = 'none'; // hide but don't remove if last one
        // clear inputs
        el.querySelectorAll('input,textarea').forEach(i => i.value = '');
        return;
    }
    el.remove();
}
function addRow(listId, html) {
    const list = document.getElementById(listId);
    const div = document.createElement('div');
    div.innerHTML = html;
    list.appendChild(div.firstElementChild);
}
function eduTemplate() {
    return `<div class="repeater-row col-2">
        <button type="button" class="remove-btn" onclick="removeRow(this.parentElement)">x</button>
        <div class="form-group"><label class="form-label">Jenjang / Jurusan</label><input class="form-input" name="edu_title[]" placeholder="cth: Teknologi Multimedia Broadcasting"></div>
        <div class="form-group"><label class="form-label">Institusi</label><input class="form-input" name="edu_org[]" placeholder="cth: PENS"></div>
        <div class="form-group"><label class="form-label">Periode</label><input class="form-input" name="edu_period[]" placeholder="cth: 2024  Sekarang"></div>
        <div class="form-group"><label class="form-label">Deskripsi</label><input class="form-input" name="edu_desc[]" placeholder="Opsional..."></div>
    </div>`;
}
function expTemplate() {
    return `<div class="repeater-row col-2">
        <button type="button" class="remove-btn" onclick="removeRow(this.parentElement)">x</button>
        <div class="form-group"><label class="form-label">Posisi / Jabatan</label><input class="form-input" name="exp_title[]" placeholder="cth: Vector Designer"></div>
        <div class="form-group"><label class="form-label">Perusahaan / Tempat</label><input class="form-input" name="exp_org[]" placeholder="cth: Biro Reklame Surabaya"></div>
        <div class="form-group"><label class="form-label">Periode</label><input class="form-input" name="exp_period[]" placeholder="cth: 2022  2023"></div>
        <div class="form-group"><label class="form-label">Deskripsi</label><input class="form-input" name="exp_desc[]" placeholder="Opsional..."></div>
    </div>`;
}
function orgTemplate() {
    return `<div class="repeater-row" style="grid-template-columns:60px 1fr 1fr 100px;gap:12px;">
        <button type="button" class="remove-btn" onclick="removeRow(this.parentElement)">x</button>
        <div class="form-group"><label class="form-label">Icon</label><input class="form-input" name="org_icon[]" placeholder="********" style="text-align:center;font-size:20px;"></div>
        <div class="form-group" style="grid-column:span 2;"><label class="form-label">Nama Kegiatan</label><input class="form-input" name="org_title[]" placeholder="cth: Divisi Acara MMBFEST"></div>
        <div class="form-group"><label class="form-label">Tahun</label><input class="form-input" name="org_year[]" placeholder="2024"></div>
        <div class="form-group" style="grid-column:1/-1;"><label class="form-label">Deskripsi</label><input class="form-input" name="org_desc[]" placeholder="Opsional..."></div>
    </div>`;
}
function previewPhoto(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('photo-preview').src = e.target.result;
        document.getElementById('photo-preview-wrap').style.display = 'block';
        document.getElementById('photo-placeholder').style.display = 'none';
    };
    reader.readAsDataURL(file);
}
</script>
@endsection
