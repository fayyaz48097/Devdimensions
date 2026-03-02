{{--
    SAVE AS: resources/views/pages/admin/sections/home/_portfolio-form.blade.php

    Shared partial for the Create modal in portfolio_admin.blade.php.
    Uses the dark-theme .field / .fi / .file-upload-label classes defined in portfolio_admin.
    $project is null for create (this partial is NOT used in the edit modal —
    the edit modal has its own inline fields populated via JS).
--}}

{{-- Title --}}
<div class="field">
    <label>Project Title <span class="req">*</span></label>
    <input type="text" name="title" class="fi {{ $errors->has('title') ? 'is-error' : '' }}"
        value="{{ old('title') }}" placeholder="e.g. Vanrock Holdings" required maxlength="150">
    @error('title')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Slug --}}
<div class="field">
    <label>Slug <span class="hint">(auto-generated if blank)</span></label>
    <input type="text" name="slug" class="fi {{ $errors->has('slug') ? 'is-error' : '' }}"
        value="{{ old('slug') }}" placeholder="e.g. vanrock-holdings" maxlength="160">
    @error('slug')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Categories --}}
<div class="field">
    <label>Categories <span class="req">*</span> <span class="hint">comma-separated</span></label>
    <input type="text" name="categories" class="fi {{ $errors->has('categories') ? 'is-error' : '' }}"
        value="{{ old('categories') }}" placeholder="e.g. Design, Development" required maxlength="255">
    @error('categories')
        <div class="field-error">{{ $message }}</div>
    @enderror
    <div style="font-size:11px; color:#303030; margin-top:5px;">Each value becomes its own badge on the card.</div>
</div>

{{-- Description --}}
<div class="field">
    <label>Description <span class="req">*</span></label>
    <textarea name="description" class="fi {{ $errors->has('description') ? 'is-error' : '' }}" required maxlength="2000"
        placeholder="Short project description shown on the card...">{{ old('description') }}</textarea>
    @error('description')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Project URL --}}
<div class="field">
    <label>Project / Case-study URL <span class="hint">(optional)</span></label>
    <input type="text" name="project_url" class="fi {{ $errors->has('project_url') ? 'is-error' : '' }}"
        value="{{ old('project_url') }}" placeholder="/project/vanrock-holdings" maxlength="255">
    @error('project_url')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Desktop & Mobile images side by side --}}
<div class="img-pair">

    {{-- Desktop Image --}}
    <div class="field" style="margin-bottom:0;">
        <label>Desktop Image <span class="req">*</span> <span class="hint">PNG, WebP, JPG (4 MB)</span></label>
        <label class="file-upload-label">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <polyline points="17 8 12 3 7 8" />
                <line x1="12" y1="3" x2="12" y2="15" />
            </svg>
            <span id="create-desk-text">Choose file…</span>
            <span class="file-name" id="create-desk-name"></span>
            <input type="file" name="img_desktop" accept="image/jpeg,image/png,image/webp,image/gif" required
                onchange="handleFileChange(this,'create-desk-name','create-desk-text')">
        </label>
        @error('img_desktop')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Mobile Image --}}
    <div class="field" style="margin-bottom:0;">
        <label>Mobile Image <span class="req">*</span> <span class="hint">PNG, WebP, JPG (4 MB)</span></label>
        <label class="file-upload-label">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <polyline points="17 8 12 3 7 8" />
                <line x1="12" y1="3" x2="12" y2="15" />
            </svg>
            <span id="create-mob-text">Choose file…</span>
            <span class="file-name" id="create-mob-name"></span>
            <input type="file" name="img_mobile" accept="image/jpeg,image/png,image/webp,image/gif" required
                onchange="handleFileChange(this,'create-mob-name','create-mob-text')">
        </label>
        @error('img_mobile')
            <div class="field-error">{{ $message }}</div>
        @enderror
    </div>

</div>

{{-- Status --}}
<div class="field" style="margin-top:16px;">
    <label>Status <span class="req">*</span></label>
    <select name="status" class="fi fi-select {{ $errors->has('status') ? 'is-error' : '' }}">
        <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
        <option value="inactive" {{ old('status', 'active') === 'inactive' ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>
