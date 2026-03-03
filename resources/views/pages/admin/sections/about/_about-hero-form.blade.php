@php
    $action = $isNew ? route('admin.sections.about.hero.store') : route('admin.sections.about.hero.update', $hero);
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-grid">

        {{-- LEFT COLUMN --}}
        <div>

            {{-- Heading --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <line x1="17" y1="10" x2="3" y2="10" />
                            <line x1="21" y1="6" x2="3" y2="6" />
                            <line x1="21" y1="14" x2="3" y2="14" />
                            <line x1="17" y1="18" x2="3" y2="18" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Heading</div>
                        <div class="fc-subtitle">The two-part headline shown at the top of the hero</div>
                    </div>
                </div>
                <div class="fc-body">
                    <div class="field">
                        <label>Plain Text <span class="req">*</span> <span class="hint">Shown in
                                white</span></label>
                        <input type="text" name="heading_plain"
                            class="fi {{ $errors->has('heading_plain') ? 'is-error' : '' }}"
                            placeholder="e.g. Discover DevDimensions:"
                            value="{{ old('heading_plain', $hero->heading_plain ?? 'Discover DevDimensions:') }}">
                        @error('heading_plain')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <label>Gradient Text <span class="req">*</span> <span class="hint">Shown in red
                                gradient</span></label>
                        <input type="text" name="heading_gradient"
                            class="fi {{ $errors->has('heading_gradient') ? 'is-error' : '' }}"
                            placeholder="e.g. Your Premier Talent Partner"
                            value="{{ old('heading_gradient', $hero->heading_gradient ?? 'Your Premier Talent Partner') }}">
                        @error('heading_gradient')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Paragraph --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <line x1="21" y1="10" x2="3" y2="10" />
                            <line x1="21" y1="6" x2="3" y2="6" />
                            <line x1="21" y1="14" x2="3" y2="14" />
                            <line x1="17" y1="18" x2="3" y2="18" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Paragraph</div>
                        <div class="fc-subtitle">Body text for the hero</div>
                    </div>
                </div>
                <div class="fc-body">
                    <div class="field">
                        <label>Body Text <span class="req">*</span></label>
                        <textarea name="paragraph_text" class="fi {{ $errors->has('paragraph_text') ? 'is-error' : '' }}" rows="5"
                            placeholder="At DD, we're all about the people...">{{ old('paragraph_text', $hero->paragraph_text ?? '') }}</textarea>
                        @error('paragraph_text')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Get in Touch URL --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <rect x="3" y="3" width="18" height="18" rx="3" />
                            <polyline points="9 12 12 15 15 12" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Get in Touch Link</div>
                    </div>
                </div>
                <div class="fc-body">
                    <div class="field">
                        <label>Button URL <span class="req">*</span></label>
                        <input type="text" name="get_in_touch_url"
                            class="fi {{ $errors->has('get_in_touch_url') ? 'is-error' : '' }}"
                            value="{{ old('get_in_touch_url', $hero->get_in_touch_url ?? '/contact-us') }}">
                        @error('get_in_touch_url')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>

        {{-- RIGHT COLUMN --}}
        <div>

            {{-- Status --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Visibility</div>
                    </div>
                </div>
                <div class="fc-body">
                    <div class="field" style="margin-bottom:0;">
                        <label>Status <span class="req">*</span></label>
                        <select name="status" class="fi fi-select {{ $errors->has('status') ? 'is-error' : '' }}">
                            <option value="active"
                                {{ old('status', $hero->status ?? 'active') === 'active' ? 'selected' : '' }}>
                                Active — visible on site
                            </option>
                            <option value="inactive"
                                {{ old('status', $hero->status ?? 'active') === 'inactive' ? 'selected' : '' }}>
                                Inactive — hidden from site
                            </option>
                        </select>
                        @error('status')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Background Image --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Background Image</div>
                        <div class="fc-subtitle">Full-width backdrop behind the hero</div>
                    </div>
                </div>
                <div class="img-upload-wrap">
                    <div class="img-preview" id="preview-bg_image">
                        @if (!empty($hero->bg_image))
                            <img src="{{ $hero->bgImageUrl() }}" alt="Background" id="preview-img-bg_image">
                        @else
                            <div class="no-img" id="preview-img-bg_image">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <polyline points="21 15 16 10 5 21" />
                                </svg>
                                <span>No image uploaded</span>
                            </div>
                        @endif
                    </div>
                    <label class="img-upload-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>
                        Choose file (JPEG/PNG/WebP, max 4MB)
                        <input type="file" name="bg_image" accept="image/jpeg,image/png,image/webp,image/gif"
                            onchange="previewImage(this, 'preview-img-bg_image')">
                    </label>
                    @error('bg_image')
                        <div class="field-error" style="padding:8px 16px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Get in Touch Circle Image --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Get in Touch Circle</div>
                        <div class="fc-subtitle">Rotating badge image</div>
                    </div>
                </div>
                <div class="img-upload-wrap">
                    <div class="img-preview" id="preview-get_in_touch_image">
                        @if (!empty($hero->get_in_touch_image))
                            <img src="{{ $hero->getInTouchImageUrl() }}" alt="Get in Touch"
                                id="preview-img-get_in_touch_image">
                        @else
                            <div class="no-img" id="preview-img-get_in_touch_image">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                    <polyline points="21 15 16 10 5 21" />
                                </svg>
                                <span>No image uploaded</span>
                            </div>
                        @endif
                    </div>
                    <label class="img-upload-label">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="17 8 12 3 7 8" />
                            <line x1="12" y1="3" x2="12" y2="15" />
                        </svg>
                        Choose file (JPEG/PNG/WebP, max 4MB)
                        <input type="file" name="get_in_touch_image"
                            accept="image/jpeg,image/png,image/webp,image/gif"
                            onchange="previewImage(this, 'preview-img-get_in_touch_image')">
                    </label>
                    @error('get_in_touch_image')
                        <div class="field-error" style="padding:8px 16px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>
    </div>

    {{-- Save button --}}
    <div style="display:flex; justify-content:flex-end; margin-top:4px;">
        <button type="submit" class="btn-primary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2.5" stroke-linecap="round">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                <polyline points="17 21 17 13 7 13 7 21" />
                <polyline points="7 3 7 8 15 8" />
            </svg>
            {{ $isNew ? 'Create About Hero Section' : 'Save Changes' }}
        </button>
    </div>

</form>

@push('scripts')
    <script>
        function previewImage(input, previewId) {
            if (!input.files || !input.files[0]) return;

            var reader = new FileReader();
            reader.onload = function(e) {
                var container = document.getElementById(previewId);
                if (!container) return;

                if (container.tagName === 'DIV') {
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '160px';
                    img.style.objectFit = 'contain';
                    container.parentNode.replaceChild(img, container);
                } else {
                    container.src = e.target.result;
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endpush
