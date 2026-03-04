{{-- SAVE AS: resources/views/pages/admin/footer/_settings-form.blade.php --}}

{{-- Logo --}}
<div class="field">
    <label>Logo <span class="hint">Leave blank to use default SVG</span></label>
    <div class="img-upload-wrap">
        <div class="img-preview">
            @if ($setting?->logo_path)
                <img src="{{ $setting->logoUrl() }}" alt="Logo" id="logo-preview-img" style="max-height:80px;">
            @else
                <div class="no-img" id="logo-preview-img">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <circle cx="8.5" cy="8.5" r="1.5" />
                        <polyline points="21 15 16 10 5 21" />
                    </svg>
                    <span>Uses default logo.svg</span>
                </div>
            @endif
        </div>
        <label class="img-upload-label">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <polyline points="17 8 12 3 7 8" />
                <line x1="12" y1="3" x2="12" y2="15" />
            </svg>
            Choose file (SVG/PNG/WebP, max 2 MB)
            <input type="file" name="logo" accept=".svg,image/svg+xml,image/png,image/jpeg,image/webp"
                onchange="previewLogo(this)">
        </label>
        @error('logo')
            <div class="field-error" style="padding:8px 14px;">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Tagline --}}
<div class="field">
    <label>Tagline</label>
    <textarea name="tagline" class="fi {{ $errors->has('tagline') ? 'is-error' : '' }}" rows="3"
        placeholder="We believe in growing together…">{{ old('tagline', $setting?->tagline) }}</textarea>
    @error('tagline')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Copyright --}}
<div class="field">
    <label>Copyright Text <span class="req">*</span> <span class="hint">Use {year} for auto year</span></label>
    <input type="text" name="copyright_text" class="fi {{ $errors->has('copyright_text') ? 'is-error' : '' }}"
        placeholder="© {year} DevDimensions. All rights reserved."
        value="{{ old('copyright_text', $setting?->copyright_text ?? '© {year} DevDimensions. All rights reserved.') }}">
    @error('copyright_text')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

{{-- Status --}}
<div class="field" style="margin-bottom:0;">
    <label>Status <span class="req">*</span></label>
    <select name="status" class="fi fi-select {{ $errors->has('status') ? 'is-error' : '' }}">
        <option value="active" {{ old('status', $setting?->status ?? 'active') === 'active' ? 'selected' : '' }}>
            Active — visible on site</option>
        <option value="inactive" {{ old('status', $setting?->status) === 'inactive' ? 'selected' : '' }}>
            Inactive — hidden from site</option>
    </select>
    @error('status')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>
