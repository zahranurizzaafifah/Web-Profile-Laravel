@php $isEdit = isset($portfolio) && $portfolio; @endphp
@extends('layouts.admin')

@section('title', ($isEdit ? 'Edit' : 'Tambah') . ' Portfolio - Admin')
@section('page-title', $isEdit ? 'Edit Portfolio' : 'Tambah Portfolio')
@section('page-sub', $isEdit ? 'Perbarui informasi karya ini' : 'Unggah karya atau proyek baru')

@section('topbar-actions')
    <a href="{{ route('admin.portfolios.index') }}" class="topbar-btn btn-outline"><- Kembali</a>
@endsection

@section('content')
<div style="max-width:720px;">
    @if($errors->any())
        <div class="alert alert-danger" style="margin-bottom:24px;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <div>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
    @endif

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(($method ?? 'POST') !== 'POST') @method($method) @endif

        {{-- INFO KARYA --}}
        <div class="card" style="margin-bottom:20px;">
            <div class="card-title"> Informasi Karya</div>
            <div style="display:flex;flex-direction:column;gap:18px;">
                <div class="form-group">
                    <label class="form-label">Judul Karya <span style="color:#ef4444">*</span></label>
                    <input class="form-input" name="title" type="text"
                        placeholder="cth: Brand Visual Identity"
                        value="{{ old('title', $isEdit ? $portfolio->title : '') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="category">
                        @foreach(['Design','Video','Photography','Illustration','Branding','Other'] as $cat)
                            <option value="{{ $cat }}"
                                {{ old('category', $isEdit ? $portfolio->category : '') === $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-textarea" name="description" rows="4"
                        placeholder="Ceritakan tentang karya ini...">{{ old('description', $isEdit ? $portfolio->description : '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- UPLOAD GAMBAR --}}
        <div class="card" style="margin-bottom:20px;">
            <div class="card-title">- Gambar Portfolio</div>
            <p style="font-size:13px;color:#64748b;margin-bottom:16px;">Upload gambar langsung <strong>atau</strong> masukkan URL gambar dari internet.</p>

            {{-- Preview area --}}
            <div id="img-preview-wrap" style="margin-bottom:18px;{{ ($isEdit && $portfolio->image_url) ? '' : 'display:none;' }}">
                <img id="img-preview"
                    src="{{ $isEdit && $portfolio->image_url ? $portfolio->image_url : '' }}"
                    alt="Preview"
                    style="width:100%;max-height:260px;object-fit:cover;border-radius:12px;border:1px solid #e2e8f0;display:block;">
                <button type="button" onclick="clearImage()" style="margin-top:10px;display:inline-flex;align-items:center;gap:6px;padding:6px 14px;border:1px solid #fecaca;background:#fef2f2;border-radius:8px;color:#ef4444;font-size:13px;font-weight:600;cursor:pointer;">
                    - Hapus Gambar
                </button>
            </div>

            {{-- Drop zone upload --}}
            <div id="drop-zone"
                onclick="document.getElementById('image-input').click()"
                ondragover="event.preventDefault();this.style.borderColor='#7c3aed';this.style.background='#faf5ff';"
                ondragleave="this.style.borderColor='#e2e8f0';this.style.background='#fafbfc';"
                ondrop="handleDrop(event)"
                style="border:2px dashed #e2e8f0;border-radius:12px;background:#fafbfc;padding:36px 24px;text-align:center;cursor:pointer;transition:200ms;">
                <div style="font-size:32px;margin-bottom:10px;"></div>
                <div style="font-size:14px;font-weight:700;color:#374151;margin-bottom:4px;">Klik atau drag & drop gambar di sini</div>
                <div style="font-size:12px;color:#94a3b8;">JPG, PNG, WEBP, GIF  Maks 4MB</div>
            </div>
            <input type="file" id="image-input" name="image" accept="image/*" style="display:none;" onchange="previewImage(event)">

            {{-- Divider --}}
            <div style="display:flex;align-items:center;gap:12px;margin:18px 0;">
                <div style="flex:1;height:1px;background:#e2e8f0;"></div>
                <span style="font-size:12px;font-weight:600;color:#94a3b8;">ATAU URL EKSTERNAL</span>
                <div style="flex:1;height:1px;background:#e2e8f0;"></div>
            </div>

            <div class="form-group">
                <label class="form-label">URL Gambar</label>
                <input class="form-input" id="image-url-input" name="image_url" type="url"
                    placeholder="https://images.unsplash.com/..."
                    value="{{ old('image_url', ($isEdit && !str_starts_with($portfolio->image_url ?? '', '/storage/')) ? $portfolio->image_url : '') }}"
                    oninput="previewFromUrl(this.value)">
                <div class="form-hint">Link gambar dari internet (Unsplash, Google Drive, dll)</div>
            </div>
        </div>

        {{-- PROJECT LINK --}}
        <div class="card" style="margin-bottom:24px;">
            <div class="card-title">- Link Project (Opsional)</div>
            <div class="form-group">
                <label class="form-label">URL Project / Demo</label>
                <input class="form-input" name="project_url" type="url"
                    placeholder="https://..."
                    value="{{ old('project_url', $isEdit ? $portfolio->project_url : '') }}">
                <div class="form-hint">Link ke project, demo, atau repository</div>
            </div>
        </div>

        <div style="display:flex;gap:12px;">
            <button type="submit" class="topbar-btn btn-primary" style="padding:12px 28px;font-size:14px;">
                {{ $isEdit ? ' Simpan Perubahan' : ' Tambah Portfolio' }}
            </button>
            <a href="{{ route('admin.portfolios.index') }}" class="topbar-btn btn-outline" style="padding:12px 22px;font-size:14px;">Batal</a>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (!file) return;
    if (file.size > 4 * 1024 * 1024) {
        alert("Ukuran gambar terlalu besar! Maksimal 4MB.");
        event.target.value = '';
        return;
    }
    const dt = new DataTransfer();
    dt.items.add(file);
    document.getElementById('image-input').files = dt.files;
    const reader = new FileReader();
    reader.onload = function(e) { showPreview(e.target.result); };
    reader.readAsDataURL(file);
}

function previewFromUrl(url) {
    if (!url) return;
    showPreview(url);
    // Clear file input when URL typed
    document.getElementById('image-input').value = '';
}

function showPreview(src) {
    const wrap = document.getElementById('img-preview-wrap');
    const img  = document.getElementById('img-preview');
    img.src = src;
    wrap.style.display = 'block';
    document.getElementById('drop-zone').style.display = 'none';
}

function clearImage() {
    document.getElementById('img-preview-wrap').style.display = 'none';
    document.getElementById('drop-zone').style.display = 'block';
    document.getElementById('image-input').value = '';
    document.getElementById('image-url-input').value = '';
    document.getElementById('img-preview').src = '';
}
</script>
@endsection
