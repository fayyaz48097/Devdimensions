{{--
    SAVE AS: resources/views/pages/admin/sections/casestudy/_project-form.blade.php

    Shared partial used by both the Add modal and each Edit modal in projects.blade.php.
    Variables available: $project (null for new, CaseStudyProject for edit)
--}}

@php
    $pid = $project?->id ?? 'new';
    $imgInputId = 'img_input_' . $pid;
    $previewId = 'img_preview_' . $pid;
    $labelId = 'img_label_' . $pid;
    $nameId = 'img_name_' . $pid;
@endphp

{{-- Hidden: track which project the form belongs to (for error re-opening) --}}
<input type="hidden" name="_project_id" value="{{ $project?->id }}">

{{-- Title --}}
<div class="field">
    <label>Title <span class="req">*</span></label>
    <input type="text" name="title" class="fi {{ $errors->has('title') ? 'is-error' : '' }}"
        placeholder="e.g. Literal Co" value="{{ old('title', $project?->title) }}">
    @error('title')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Categories --}}
<div class="field">
    <label>Categories <span class="req">*</span> <span class="hint">comma-separated — e.g. Design,
            Development</span></label>
    <input type="text" name="categories" class="fi {{ $errors->has('categories') ? 'is-error' : '' }}"
        placeholder="Design, Development"
        value="{{ old('categories', $project ? implode(', ', $project->categories ?? []) : '') }}">
    @error('categories')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Description --}}
<div class="field">
    <label>Description <span class="req">*</span></label>
    <textarea name="description" rows="4" class="fi {{ $errors->has('description') ? 'is-error' : '' }}"
        placeholder="Brief project description shown on the listing…">{{ old('description', $project?->description) }}</textarea>
    @error('description')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Tools --}}
<div class="field">
    <label>Tool Images <span class="hint">upload multiple — JPG/PNG/SVG, max 1 MB each</span></label>

    {{-- Existing tools preview --}}
    @if ($project && $project->toolUrls())
        <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:10px;" id="tools-current-{{ $pid }}">
            @foreach ($project->toolUrls() as $toolUrl)
                <img src="{{ $toolUrl }}" alt="tool"
                    style="height:32px; width:auto; object-fit:contain; background:#111; border-radius:5px; padding:4px 6px; border:1px solid rgba(255,255,255,.07);">
            @endforeach
        </div>
    @endif

    <label class="img-upload-zone" for="tools_input_{{ $pid }}">
        <div class="img-upload-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37" stroke-width="2"
                stroke-linecap="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <polyline points="17 8 12 3 7 8" />
                <line x1="12" y1="3" x2="12" y2="15" />
            </svg>
        </div>
        <div class="img-upload-text">
            <strong id="tools_label_{{ $pid }}">Select tool images</strong><br>
            <span id="tools_name_{{ $pid }}">PNG, SVG or JPG — select multiple</span>
        </div>
    </label>
    <input type="file" id="tools_input_{{ $pid }}" name="tools[]" accept="image/*" multiple
        style="display:none" onchange="handleToolsChange(this, '{{ $pid }}')">

    <div id="tools_preview_{{ $pid }}" style="display:flex; flex-wrap:wrap; gap:8px; margin-top:8px;"></div>
    @error('tools.*')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Project image --}}
<div class="field">
    <label>Project Screenshot <span class="hint">JPG/PNG/WebP, max 4 MB</span></label>
    <label class="img-upload-zone" for="{{ $imgInputId }}">
        <div class="img-upload-icon">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37" stroke-width="2"
                stroke-linecap="round">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
            </svg>
        </div>
        <div class="img-upload-text">
            <strong
                id="{{ $labelId }}">{{ $project?->image_path ? 'Replace image' : 'Upload screenshot' }}</strong><br>
            <span id="{{ $nameId }}">{{ $project?->image_original_name ?? 'JPG, PNG or WebP' }}</span>
        </div>
    </label>
    <input type="file" id="{{ $imgInputId }}" name="image" accept="image/*" style="display:none"
        onchange="handleProjectImageChange(this, '{{ $previewId }}', '{{ $labelId }}', '{{ $nameId }}')">
    @error('image')
        <div class="field-error">{{ $message }}</div>
    @enderror

    <div class="img-current" id="{{ $previewId }}">
        @if ($project?->imageUrl())
            <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}">
            <span>{{ $project->image_original_name ?? 'Current image' }}</span>
        @endif
    </div>
</div>

{{-- Status + Sort order --}}
<div class="two-col">
    <div class="field">
        <label>Status <span class="req">*</span></label>
        <select name="status" class="fi fi-select">
            <option value="active" {{ old('status', $project?->status ?? 'active') === 'active' ? 'selected' : '' }}>
                Active</option>
            <option value="inactive" {{ old('status', $project?->status) === 'inactive' ? 'selected' : '' }}>Inactive
            </option>
        </select>
    </div>
    <div class="field">
        <label>Sort Order <span class="hint">lower = first</span></label>
        <input type="number" name="sort_order" min="0" class="fi"
            value="{{ old('sort_order', $project?->sort_order ?? 0) }}">
    </div>
</div>
