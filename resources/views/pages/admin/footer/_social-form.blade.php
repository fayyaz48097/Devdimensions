{{-- SAVE AS: resources/views/pages/admin/footer/_social-form.blade.php --}}

<div class="field">
    <label>Platform Name <span class="req">*</span></label>
    <input type="text" name="platform" class="fi {{ $errors->has('platform') ? 'is-error' : '' }}"
        placeholder="e.g. Facebook" value="{{ old('platform', $social?->platform) }}">
    @error('platform')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label>URL <span class="req">*</span></label>
    <input type="url" name="url" class="fi {{ $errors->has('url') ? 'is-error' : '' }}"
        placeholder="https://facebook.com/..." value="{{ old('url', $social?->url) }}">
    @error('url')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label>Icon <span class="req">*</span> <span class="hint">Choose the matching icon</span></label>
    <select name="icon_key" class="fi fi-select {{ $errors->has('icon_key') ? 'is-error' : '' }}">
        @php
            $icons = ['facebook', 'linkedin', 'instagram', 'twitter', 'youtube', 'tiktok', 'github', 'link'];
            $current = old('icon_key', $social?->icon_key ?? 'link');
        @endphp
        @foreach ($icons as $icon)
            <option value="{{ $icon }}" {{ $current === $icon ? 'selected' : '' }}>
                {{ ucfirst($icon) }}
            </option>
        @endforeach
    </select>
    @error('icon_key')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field" style="margin-bottom:0;">
    <label>Status <span class="req">*</span></label>
    <select name="status" class="fi fi-select">
        <option value="active" {{ old('status', $social?->status ?? 'active') === 'active' ? 'selected' : '' }}>
            Active</option>
        <option value="inactive" {{ old('status', $social?->status) === 'inactive' ? 'selected' : '' }}>
            Inactive</option>
    </select>
</div>
