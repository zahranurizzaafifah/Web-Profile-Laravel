@php
    $isEdit = isset($portfolio) && $portfolio;
@endphp

@if ($errors->any())
    <div class="card" style="border-color: rgba(255,123,213,.45); margin-bottom: 18px;">
        <strong>Periksa input:</strong>
        <ul class="clean" style="margin: 10px 0 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST" class="card" style="display:grid; gap:14px;">
    @csrf
    @if(($method ?? 'POST') !== 'POST')
        @method($method)
    @endif
    <div>
        <label class="muted">Title</label>
        <input name="title" value="{{ old('title', $isEdit ? $portfolio->title : '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
    </div>
    <div>
        <label class="muted">Category</label>
        <input name="category" value="{{ old('category', $isEdit ? $portfolio->category : '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
    </div>
    <div>
        <label class="muted">Description</label>
        <textarea name="description" rows="5" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">{{ old('description', $isEdit ? $portfolio->description : '') }}</textarea>
    </div>
    <div class="grid-2">
        <div>
            <label class="muted">Image URL</label>
            <input name="image_url" value="{{ old('image_url', $isEdit ? $portfolio->image_url : '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
        </div>
        <div>
            <label class="muted">Project URL</label>
            <input name="project_url" value="{{ old('project_url', $isEdit ? $portfolio->project_url : '') }}" style="width:100%; margin-top:6px; padding:14px 16px; border-radius:16px; border:1px solid rgba(255,255,255,.12); background: rgba(255,255,255,.05); color: var(--text);">
        </div>
    </div>
    <div style="display:flex; gap:10px; flex-wrap:wrap;">
        <button class="btn btn-primary" type="submit">Simpan</button>
        <a class="btn btn-soft" href="{{ route('admin.portfolios.index') }}">Kembali</a>
    </div>
</form>
