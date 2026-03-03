{{--
    SAVE AS: resources/views/pages/admin/sections/about/_whatwe-form.blade.php
--}}

@php
    $action = $isNew
        ? route('admin.sections.about.whatwe.store')
        : route('admin.sections.about.whatwe.update', $section);
@endphp

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-grid">

        {{-- ════════════════════════
             LEFT — content fields
        ════════════════════════ --}}
        <div>

            {{-- ── Our Mission ── --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Our Mission</div>
                        <div class="fc-subtitle">Main mission statement block</div>
                    </div>
                </div>
                <div class="fc-body">

                    <div class="field">
                        <label>Title <span class="req">*</span></label>
                        <input type="text" name="mission_title"
                            class="fi {{ $errors->has('mission_title') ? 'is-error' : '' }}"
                            placeholder="e.g. Our Mission"
                            value="{{ old('mission_title', $section?->mission_title ?? 'Our Mission') }}">
                        @error('mission_title')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label>Description <span class="req">*</span></label>
                        <textarea name="mission_description" rows="5"
                            class="fi {{ $errors->has('mission_description') ? 'is-error' : '' }}" placeholder="Describe your mission…">{{ old('mission_description', $section?->mission_description) }}</textarea>
                        @error('mission_description')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Mission Icon — styled upload widget --}}
                    <div class="field" style="margin-bottom:0;">
                        <label>Icon <span class="hint">PNG/SVG/WebP, 50×50 recommended</span></label>
                        <div class="img-upload-wrap">
                            <div class="img-preview">
                                @if (!empty($section?->mission_icon))
                                    <img src="{{ $section->missionIconUrl() }}" alt="Mission icon"
                                        id="preview-img-mission_icon">
                                @else
                                    <div class="no-img" id="preview-img-mission_icon">
                                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2" />
                                            <circle cx="8.5" cy="8.5" r="1.5" />
                                            <polyline points="21 15 16 10 5 21" />
                                        </svg>
                                        <span>No icon uploaded</span>
                                    </div>
                                @endif
                            </div>
                            <label class="img-upload-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <polyline points="17 8 12 3 7 8" />
                                    <line x1="12" y1="3" x2="12" y2="15" />
                                </svg>
                                Choose file (PNG/SVG/WebP, max 2MB)
                                <input type="file" name="mission_icon" accept="image/*,.svg,image/svg+xml"
                                    onchange="previewImage(this, 'preview-img-mission_icon')">
                            </label>
                            @error('mission_icon')
                                <div class="field-error" style="padding:8px 16px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            {{-- ── Our Vision ── --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Our Vision</div>
                        <div class="fc-subtitle">Future vision statement block</div>
                    </div>
                </div>
                <div class="fc-body">

                    <div class="field">
                        <label>Title <span class="req">*</span></label>
                        <input type="text" name="vision_title"
                            class="fi {{ $errors->has('vision_title') ? 'is-error' : '' }}"
                            placeholder="e.g. Our Vision"
                            value="{{ old('vision_title', $section?->vision_title ?? 'Our Vision') }}">
                        @error('vision_title')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label>Description <span class="req">*</span></label>
                        <textarea name="vision_description" rows="5"
                            class="fi {{ $errors->has('vision_description') ? 'is-error' : '' }}" placeholder="Describe your vision…">{{ old('vision_description', $section?->vision_description) }}</textarea>
                        @error('vision_description')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Vision Icon — styled upload widget --}}
                    <div class="field" style="margin-bottom:0;">
                        <label>Icon <span class="hint">PNG/SVG/WebP, 50×50 recommended</span></label>
                        <div class="img-upload-wrap">
                            <div class="img-preview">
                                @if (!empty($section?->vision_icon))
                                    <img src="{{ $section->visionIconUrl() }}" alt="Vision icon"
                                        id="preview-img-vision_icon">
                                @else
                                    <div class="no-img" id="preview-img-vision_icon">
                                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2" />
                                            <circle cx="8.5" cy="8.5" r="1.5" />
                                            <polyline points="21 15 16 10 5 21" />
                                        </svg>
                                        <span>No icon uploaded</span>
                                    </div>
                                @endif
                            </div>
                            <label class="img-upload-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <polyline points="17 8 12 3 7 8" />
                                    <line x1="12" y1="3" x2="12" y2="15" />
                                </svg>
                                Choose file (PNG/SVG/WebP, max 2MB)
                                <input type="file" name="vision_icon" accept="image/*,.svg,image/svg+xml"
                                    onchange="previewImage(this, 'preview-img-vision_icon')">
                            </label>
                            @error('vision_icon')
                                <div class="field-error" style="padding:8px 16px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- ════════════════════════
             RIGHT — visibility + meta
        ════════════════════════ --}}
        <div>

            {{-- Visibility --}}
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
                                {{ old('status', $section?->status ?? 'active') === 'active' ? 'selected' : '' }}>
                                Active — visible on site</option>
                            <option value="inactive"
                                {{ old('status', $section?->status) === 'inactive' ? 'selected' : '' }}>
                                Inactive — hidden from site</option>
                        </select>
                        @error('status')
                            <div class="field-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Record meta (edit only) --}}
            @if (!$isNew && $section)
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-title" style="color:#3A3A3A;">Record Info</div>
                    </div>
                    <div class="fc-body">
                        @php
                            $metaRows = [
                                ['Created', $section->created_at->format('M d, Y H:i')],
                                ['Last Updated', $section->updated_at->format('M d, Y H:i')],
                            ];
                        @endphp
                        @foreach ($metaRows as [$key, $val])
                            <div
                                style="display:flex; align-items:center; justify-content:space-between;
                                    padding:10px 0; border-bottom:1px solid rgba(255,255,255,0.04);">
                                <span style="font-size:12.5px; color:#3A3A3A;">{{ $key }}</span>
                                <span style="font-size:12.5px; color:#666;">{{ $val }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

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
            {{ $isNew ? 'Create Section' : 'Save Changes' }}
        </button>
    </div>

</form>

@push('scripts')
    <script>
        function previewImage(input, previewId) {
            if (!input.files || !input.files[0]) return;

            var reader = new FileReader();
            reader.onload = function(e) {
                var el = document.getElementById(previewId);
                if (!el) return;

                if (el.tagName === 'DIV') {
                    // Replace placeholder <div> with <img>
                    var img = document.createElement('img');
                    img.id = previewId;
                    img.src = e.target.result;
                    img.style.cssText = 'max-width:100%; max-height:160px; object-fit:contain; display:block;';
                    el.parentNode.replaceChild(img, el);
                } else {
                    el.src = e.target.result;
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endpush
