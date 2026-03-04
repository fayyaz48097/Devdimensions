{{-- SAVE AS: resources/views/pages/admin/footer/_office-form.blade.php --}}

<div class="field">
    <label>Country / Label <span class="req">*</span></label>
    <input type="text" name="country" class="fi {{ $errors->has('country') ? 'is-error' : '' }}"
        placeholder="e.g. United States" value="{{ old('country', $office?->country) }}">
    @error('country')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label>Address</label>
    <input type="text" name="address" class="fi {{ $errors->has('address') ? 'is-error' : '' }}"
        placeholder="10788 Lake Wynds, Boynton Beach, FL" value="{{ old('address', $office?->address) }}">
    @error('address')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label>Address Link URL <span class="hint">Optional Google Maps link</span></label>
    <input type="text" name="address_url" class="fi {{ $errors->has('address_url') ? 'is-error' : '' }}"
        placeholder="https://maps.google.com/... or #" value="{{ old('address_url', $office?->address_url ?? '#') }}">
    @error('address_url')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label>Phone</label>
    <input type="text" name="phone" class="fi {{ $errors->has('phone') ? 'is-error' : '' }}"
        placeholder="+1 (561) 336-0919" value="{{ old('phone', $office?->phone) }}">
    @error('phone')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label>Email</label>
    <input type="email" name="email" class="fi {{ $errors->has('email') ? 'is-error' : '' }}"
        placeholder="info@example.com" value="{{ old('email', $office?->email) }}">
    @error('email')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label>Flag Image <span class="hint">PNG/WebP, ~40×28px</span></label>
    <div class="img-upload-wrap">
        <div class="img-preview" style="min-height:60px;">
            @if (!empty($office?->flag_path) && $office->flagUrl())
                <img src="{{ $office->flagUrl() }}" alt="Flag" style="height:28px;border-radius:3px;"
                    id="flag-preview-{{ $office->id ?? 'new' }}">
            @else
                <div class="no-img" id="flag-preview-{{ $office->id ?? 'new' }}" style="padding:14px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round">
                        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z" />
                        <line x1="4" y1="22" x2="4" y2="15" />
                    </svg>
                    <span>No flag uploaded</span>
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
            Choose flag image (PNG/WebP, max 1 MB)
            <input type="file" name="flag" accept="image/png,image/jpeg,image/webp"
                onchange="previewFlag(this, 'flag-preview-{{ $office->id ?? 'new' }}')">
        </label>
        @error('flag')
            <div class="field-error" style="padding:8px 14px;">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="field" style="margin-bottom:0;">
    <label>Status <span class="req">*</span></label>
    <select name="status" class="fi fi-select">
        <option value="active" {{ old('status', $office?->status ?? 'active') === 'active' ? 'selected' : '' }}>
            Active</option>
        <option value="inactive" {{ old('status', $office?->status) === 'inactive' ? 'selected' : '' }}>
            Inactive</option>
    </select>
</div>

@push('scripts')
    <script>
        function previewFlag(input, previewId) {
            if (!input.files || !input.files[0]) return;
            var r = new FileReader();
            r.onload = function(e) {
                var el = document.getElementById(previewId);
                if (!el) return;
                if (el.tagName === 'DIV') {
                    var img = document.createElement('img');
                    img.id = previewId;
                    img.src = e.target.result;
                    img.style.cssText = 'height:28px;border-radius:3px;display:block;';
                    el.parentNode.replaceChild(img, el);
                } else {
                    el.src = e.target.result;
                }
            };
            r.readAsDataURL(input.files[0]);
        }
    </script>
@endpush
