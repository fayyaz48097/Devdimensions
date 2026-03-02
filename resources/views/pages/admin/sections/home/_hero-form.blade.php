{{--
    SAVE AS: resources/views/pages/admin/sections/home/_hero-form.blade.php
    Partial: shared by hero.blade.php for both create & edit.
--}}

@php
    $action = $isNew ? route('admin.sections.home.hero.store') : route('admin.sections.home.hero.update', $hero);
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-grid">

        {{-- ════════════════════════════════
             LEFT COLUMN — content fields
        ════════════════════════════════ --}}
        <div>

            {{-- ── Heading ── --}}
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
                            placeholder="e.g. Build Your"
                            value="{{ old('heading_plain', $hero->heading_plain ?? 'Build Your') }}">
                        @error('heading_plain')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <label>Gradient Text <span class="req">*</span> <span class="hint">Shown in red
                                gradient</span></label>
                        <input type="text" name="heading_gradient"
                            class="fi {{ $errors->has('heading_gradient') ? 'is-error' : '' }}"
                            placeholder="e.g. Dream Team"
                            value="{{ old('heading_gradient', $hero->heading_gradient ?? 'Dream Team') }}">
                        @error('heading_gradient')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- ── Paragraph ── --}}
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
                        <div class="fc-subtitle">Body text and inline gradient highlights</div>
                    </div>
                </div>
                <div class="fc-body">
                    <div class="field">
                        <label>Body Text <span class="req">*</span></label>
                        <textarea name="paragraph_text" class="fi {{ $errors->has('paragraph_text') ? 'is-error' : '' }}"
                            placeholder="We've scouted and interviewed thousands of game changers…" rows="4">{{ old('paragraph_text', $hero->paragraph_text ?? '') }}</textarea>
                        @error('paragraph_text')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <label>Highlight 1 <span class="hint">Shown in red gradient inline</span></label>
                        <input type="text" name="paragraph_highlight_1"
                            class="fi {{ $errors->has('paragraph_highlight_1') ? 'is-error' : '' }}"
                            placeholder="e.g. cutting costs by 43%"
                            value="{{ old('paragraph_highlight_1', $hero->paragraph_highlight_1 ?? '') }}">
                        @error('paragraph_highlight_1')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <label>Highlight 2 <span class="hint">Second gradient phrase inline</span></label>
                        <input type="text" name="paragraph_highlight_2"
                            class="fi {{ $errors->has('paragraph_highlight_2') ? 'is-error' : '' }}"
                            placeholder="e.g. reducing staffing times by 5x"
                            value="{{ old('paragraph_highlight_2', $hero->paragraph_highlight_2 ?? '') }}">
                        @error('paragraph_highlight_2')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- ── CTA Button ── --}}
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
                        <div class="fc-title">CTA Button</div>
                        <div class="fc-subtitle">Primary call-to-action button below the paragraph</div>
                    </div>
                </div>
                <div class="fc-body">
                    <div class="field">
                        <label>Button Label <span class="req">*</span></label>
                        <input type="text" name="cta_label"
                            class="fi {{ $errors->has('cta_label') ? 'is-error' : '' }}"
                            placeholder="e.g. 7 Days Free Trial"
                            value="{{ old('cta_label', $hero->cta_label ?? '7 Days Free Trial') }}">
                        @error('cta_label')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="field">
                        <label>Button URL <span class="req">*</span></label>
                        <input type="text" name="cta_url"
                            class="fi {{ $errors->has('cta_url') ? 'is-error' : '' }}" placeholder="e.g. /contact-us"
                            value="{{ old('cta_url', $hero->cta_url ?? '/contact-us') }}">
                        @error('cta_url')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>

        {{-- ════════════════════════════════
             RIGHT COLUMN — images & meta
        ════════════════════════════════ --}}
        <div>

            {{-- ── Status ── --}}
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
                                Active — visible on site</option>
                            <option value="inactive"
                                {{ old('status', $hero->status ?? 'active') === 'inactive' ? 'selected' : '' }}>
                                Inactive — hidden from site</option>
                        </select>
                        @error('status')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- ── Background Image ── --}}
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

            {{-- ── Right Image Desktop ── --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" />
                            <line x1="8" y1="21" x2="16" y2="21" />
                            <line x1="12" y1="17" x2="12" y2="21" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Right Image — Desktop</div>
                        <div class="fc-subtitle">Shown on lg+ screens</div>
                    </div>
                </div>
                <div class="img-upload-wrap">
                    <div class="img-preview">
                        @if (!empty($hero->right_image_desktop))
                            <img src="{{ $hero->rightImageDesktopUrl() }}" alt="Desktop"
                                id="preview-img-right_image_desktop">
                        @else
                            <div class="no-img" id="preview-img-right_image_desktop">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                    <rect x="2" y="3" width="20" height="14" rx="2" />
                                    <line x1="8" y1="21" x2="16" y2="21" />
                                    <line x1="12" y1="17" x2="12" y2="21" />
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
                        <input type="file" name="right_image_desktop"
                            accept="image/jpeg,image/png,image/webp,image/gif"
                            onchange="previewImage(this, 'preview-img-right_image_desktop')">
                    </label>
                    @error('right_image_desktop')
                        <div class="field-error" style="padding:8px 16px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- ── Right Image Mobile ── --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <rect x="5" y="2" width="14" height="20" rx="2" />
                            <line x1="12" y1="18" x2="12.01" y2="18" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Right Image — Mobile</div>
                        <div class="fc-subtitle">Shown on smaller screens</div>
                    </div>
                </div>
                <div class="img-upload-wrap">
                    <div class="img-preview">
                        @if (!empty($hero->right_image_mobile))
                            <img src="{{ $hero->rightImageMobileUrl() }}" alt="Mobile"
                                id="preview-img-right_image_mobile">
                        @else
                            <div class="no-img" id="preview-img-right_image_mobile">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                    <rect x="5" y="2" width="14" height="20" rx="2" />
                                    <line x1="12" y1="18" x2="12.01" y2="18" />
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
                        <input type="file" name="right_image_mobile"
                            accept="image/jpeg,image/png,image/webp,image/gif"
                            onchange="previewImage(this, 'preview-img-right_image_mobile')">
                    </label>
                    @error('right_image_mobile')
                        <div class="field-error" style="padding:8px 16px;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- ── Meta info (edit only) ── --}}
            @if (!$isNew && $hero)
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-title">Record Info</div>
                    </div>
                    <div class="fc-body">
                        <div class="meta-row">
                            <span class="meta-key">Status</span>
                            <span class="pill pill-{{ $hero->status }}">{{ ucfirst($hero->status) }}</span>
                        </div>
                        <div class="meta-row">
                            <span class="meta-key">Created</span>
                            <span class="meta-val">{{ $hero->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="meta-row">
                            <span class="meta-key">Last Updated</span>
                            <span class="meta-val">{{ $hero->updated_at->format('M d, Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    {{-- ── Save button ── --}}
    <div style="display:flex; justify-content:flex-end; margin-top:4px;">
        <button type="submit" class="btn-primary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2.5" stroke-linecap="round">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                <polyline points="17 21 17 13 7 13 7 21" />
                <polyline points="7 3 7 8 15 8" />
            </svg>
            {{ $isNew ? 'Create Hero Section' : 'Save Changes' }}
        </button>
    </div>

</form>

@push('scripts')
    <script>
        /**
         * Live image preview before upload.
         * Replaces the placeholder <div> or existing <img> with the chosen file.
         */
        function previewImage(input, previewId) {
            if (!input.files || !input.files[0]) return;

            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var container = document.getElementById(previewId);
                if (!container) return;

                // If the current node is a <div class="no-img"> replace with <img>
                if (container.tagName === 'DIV') {
                    var img = document.createElement('img');
                    img.id = previewId;
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '160px';
                    img.style.objectFit = 'contain';
                    img.style.display = 'block';
                    container.parentNode.replaceChild(img, container);
                } else {
                    container.src = e.target.result;
                }
            };

            reader.readAsDataURL(file);
        }
    </script>
@endpush
