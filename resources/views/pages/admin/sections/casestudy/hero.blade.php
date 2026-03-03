{{--
    SAVE AS: resources/views/pages/admin/sections/casestudy/hero.blade.php
--}}

@extends('admin.admin')
@section('title', 'Case Studies › Hero Section')
@section('page-title', 'Hero Section')

@push('styles')
    <style>
        .sec-wrap {
            padding: 28px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #3A3A3A;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .breadcrumb a {
            color: #3A3A3A;
            text-decoration: none;
            transition: color .2s;
        }

        .breadcrumb a:hover {
            color: #FC3F37;
        }

        .breadcrumb .sep {
            color: #252525;
        }

        .breadcrumb .current {
            color: #666;
        }

        .sec-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 28px;
        }

        .sec-header h1 {
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            letter-spacing: -.4px;
            margin: 0 0 3px;
        }

        .sec-header p {
            font-size: 13px;
            color: #4A4A4A;
            margin: 0;
        }

        .flash {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13px;
            font-weight: 500;
        }

        .flash-success {
            background: rgba(74, 222, 128, .07);
            border: 1px solid rgba(74, 222, 128, .18);
            color: #4ADE80;
        }

        .flash-error {
            background: rgba(252, 63, 55, .07);
            border: 1px solid rgba(252, 63, 55, .18);
            color: #FC3F37;
        }

        .page-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 20px;
            align-items: start;
        }

        @media(max-width:1100px) {
            .page-grid {
                grid-template-columns: 1fr;
            }
        }

        .fc {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, .07);
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .fc-head {
            padding: 14px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .fc-head-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .fc-head-icon {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            background: rgba(181, 30, 23, .12);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .fc-title {
            font-size: 13.5px;
            font-weight: 600;
            color: #C8C8C8;
        }

        .fc-subtitle {
            font-size: 11.5px;
            color: #3A3A3A;
            margin-top: 1px;
        }

        .fc-body {
            padding: 20px;
        }

        .field {
            margin-bottom: 16px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field label {
            display: block;
            font-size: 11.5px;
            font-weight: 600;
            color: #5A5A5A;
            letter-spacing: .5px;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .field label .req {
            color: #FC3F37;
            margin-left: 2px;
        }

        .field label .hint {
            font-size: 11px;
            color: #303030;
            text-transform: none;
            letter-spacing: 0;
            font-weight: 400;
            margin-left: 6px;
        }

        .fi {
            width: 100%;
            background: #0A0A0A;
            border: 1px solid rgba(255, 255, 255, .07);
            border-radius: 9px;
            padding: 10px 14px;
            font-size: 13px;
            color: #C8C8C8;
            outline: none;
            transition: border-color .2s;
            font-family: inherit;
        }

        .fi:focus {
            border-color: rgba(252, 63, 55, .35);
        }

        .fi.is-error {
            border-color: rgba(252, 63, 55, .5);
        }

        .fi-select {
            appearance: none;
            cursor: pointer;
        }

        textarea.fi {
            resize: vertical;
            min-height: 90px;
            line-height: 1.6;
        }

        .field-error {
            font-size: 11.5px;
            color: #FC3F37;
            margin-top: 5px;
        }

        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        @media(max-width:640px) {
            .two-col {
                grid-template-columns: 1fr;
            }
        }

        /* image upload */
        .img-upload-zone {
            border: 1.5px dashed rgba(255, 255, 255, .1);
            border-radius: 10px;
            padding: 18px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            cursor: pointer;
            transition: border-color .2s;
            background: #080808;
        }

        .img-upload-zone:hover {
            border-color: rgba(252, 63, 55, .3);
        }

        .img-upload-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(181, 30, 23, .1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .img-upload-text {
            font-size: 12.5px;
            color: #4A4A4A;
            line-height: 1.5;
        }

        .img-upload-text strong {
            color: #888;
            font-size: 13px;
        }

        .img-current {
            margin-top: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .img-current img {
            max-height: 50px;
            max-width: 120px;
            object-fit: contain;
            border-radius: 6px;
        }

        .img-current span {
            font-size: 11px;
            color: #333;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 20px;
            background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
            border: none;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            transition: opacity .2s;
        }

        .btn-primary:hover {
            opacity: .88;
        }

        .icon-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-delete {
            background: rgba(252, 63, 55, .08);
            color: #FC3F37;
            border: 1px solid rgba(252, 63, 55, .15);
        }

        .btn-delete:hover {
            background: rgba(252, 63, 55, .15);
        }

        .btn-restore {
            background: rgba(74, 222, 128, .08);
            color: #4ADE80;
            border: 1px solid rgba(74, 222, 128, .18);
            padding: 9px 16px;
            font-size: 12.5px;
            font-weight: 600;
            gap: 7px;
        }

        .btn-restore:hover {
            background: rgba(74, 222, 128, .14);
        }

        .meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 9px 0;
            border-bottom: 1px solid rgba(255, 255, 255, .04);
        }

        .meta-row:last-child {
            border-bottom: none;
        }

        .meta-key {
            font-size: 12px;
            color: #333;
        }

        .meta-val {
            font-size: 12px;
            color: #666;
        }

        .pill {
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .pill-active {
            background: rgba(74, 222, 128, .1);
            color: #4ADE80;
        }

        .pill-inactive {
            background: rgba(255, 255, 255, .05);
            color: #555;
        }

        .pill-deleted {
            background: rgba(252, 63, 55, .08);
            color: #FC3F37;
        }

        .restore-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 20px;
            border-radius: 12px;
            background: rgba(252, 63, 55, .06);
            border: 1px solid rgba(252, 63, 55, .15);
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .restore-banner p {
            font-size: 13px;
            color: #888;
            margin: 0;
        }
    </style>
@endpush

@section('content')
    <div class="sec-wrap">

        {{-- Breadcrumb --}}
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="sep">›</span>
            <span>Case Studies</span>
            <span class="sep">›</span>
            <span class="current">Hero Section</span>
        </nav>

        {{-- Page header --}}
        <div class="sec-header">
            <div>
                <h1>Hero Section</h1>
                <p>Manage the Case Studies page hero banner — heading, highlight text, description &amp; background image.
                </p>
            </div>
            @if ($section && !$section->trashed())
                <form action="{{ route('admin.sections.casestudy.hero.toggleStatus', $section) }}" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" class="icon-btn"
                        style="padding:9px 16px; font-size:12.5px; font-weight:600; gap:7px;
                            {{ $section->isActive()
                                ? 'background:rgba(255,255,255,.05); color:#555; border:1px solid rgba(255,255,255,.08);'
                                : 'background:rgba(74,222,128,.08); color:#4ADE80; border:1px solid rgba(74,222,128,.18);' }}">
                        {{ $section->isActive() ? 'Set Inactive' : 'Set Active' }}
                    </button>
                </form>
            @endif
        </div>

        {{-- Flash --}}
        @if (session('success'))
            <div class="flash flash-success">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="flash flash-error">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                Please fix the errors below.
            </div>
        @endif

        {{-- Restore banner --}}
        @if ($section && $section->trashed())
            <div class="restore-banner">
                <p>This section is soft-deleted and hidden from the site.</p>
                <form action="{{ route('admin.sections.casestudy.hero.restore', $section->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="icon-btn btn-restore">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <polyline points="1 4 1 10 7 10" />
                            <path d="M3.51 15a9 9 0 1 0 .49-4.5" />
                        </svg>
                        Restore Section
                    </button>
                </form>
            </div>
        @endif

        {{-- Main grid --}}
        <div class="page-grid">

            {{-- ════ LEFT: Form ════ --}}
            <div>
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                    <path d="M3 9h18M9 21V9" />
                                </svg>
                            </div>
                            <div>
                                <div class="fc-title">Section Content</div>
                                <div class="fc-subtitle">Heading, description &amp; background image</div>
                            </div>
                        </div>
                    </div>
                    <div class="fc-body">

                        <form method="POST"
                            action="{{ $section && !$section->trashed()
                                ? route('admin.sections.casestudy.hero.update', $section)
                                : route('admin.sections.casestudy.hero.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($section && !$section->trashed())
                                @method('PUT')
                            @endif

                            {{-- Heading --}}
                            <div class="two-col">
                                <div class="field">
                                    <label>Main Heading <span class="req">*</span></label>
                                    <input type="text" name="heading"
                                        class="fi {{ $errors->has('heading') ? 'is-error' : '' }}"
                                        placeholder="e.g. We Win," value="{{ old('heading', $section?->heading) }}">
                                    @error('heading')
                                        <div class="field-error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="field">
                                    <label>Gradient Highlight <span class="req">*</span> <span class="hint">shown in
                                            red gradient</span></label>
                                    <input type="text" name="heading_highlight"
                                        class="fi {{ $errors->has('heading_highlight') ? 'is-error' : '' }}"
                                        placeholder="e.g. When You Do."
                                        value="{{ old('heading_highlight', $section?->heading_highlight) }}">
                                    @error('heading_highlight')
                                        <div class="field-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="field">
                                <label>Description <span class="req">*</span></label>
                                <textarea name="description" rows="3" class="fi {{ $errors->has('description') ? 'is-error' : '' }}"
                                    placeholder="Subtitle paragraph below the heading…">{{ old('description', $section?->description) }}</textarea>
                                @error('description')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Background image --}}
                            <div class="field">
                                <label>Background Image <span class="hint">optional — JPG/PNG/WebP, max 4
                                        MB</span></label>
                                <label class="img-upload-zone" for="bg_image_input">
                                    <div class="img-upload-icon">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                            stroke="#FC3F37" stroke-width="2" stroke-linecap="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2"
                                                ry="2" />
                                            <circle cx="8.5" cy="8.5" r="1.5" />
                                            <polyline points="21 15 16 10 5 21" />
                                        </svg>
                                    </div>
                                    <div class="img-upload-text">
                                        <strong id="bg-label-text">Click to upload background image</strong><br>
                                        <span id="bg-file-name">JPG, PNG or WebP up to 4 MB</span>
                                    </div>
                                </label>
                                <input type="file" id="bg_image_input" name="bg_image" accept="image/*"
                                    style="display:none" onchange="handleBgChange(this)">
                                @error('bg_image')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror

                                {{-- Current image preview --}}
                                <div class="img-current" id="bg-preview-wrap">
                                    @if ($section && $section->bg_image_path)
                                        <img src="{{ $section->bgImageUrl() }}" alt="current background">
                                        <span>{{ $section->bg_image_original_name ?? 'Current image' }}</span>
                                    @elseif (!$section || !$section->bg_image_path)
                                        <span style="font-size:11px; color:#2A2A2A;">Default:
                                            assets/images/home-hero-1.png</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="field">
                                <label>Status <span class="req">*</span></label>
                                <select name="status" class="fi fi-select">
                                    <option value="active"
                                        {{ old('status', $section?->status ?? 'active') === 'active' ? 'selected' : '' }}>
                                        Active — visible on site</option>
                                    <option value="inactive"
                                        {{ old('status', $section?->status) === 'inactive' ? 'selected' : '' }}>
                                        Inactive — hidden from site</option>
                                </select>
                            </div>

                            <div style="margin-top:22px; display:flex; gap:10px; align-items:center;">
                                <button type="submit" class="btn-primary">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                        <polyline points="17 21 17 13 7 13 7 21" />
                                        <polyline points="7 3 7 8 15 8" />
                                    </svg>
                                    {{ $section && !$section->trashed() ? 'Save Changes' : 'Create Section' }}
                                </button>

                                @if ($section && !$section->trashed())
                                    <button type="submit" form="delete-hero-form" class="icon-btn btn-delete"
                                        title="Soft-delete section" style="width:40px; height:40px;"
                                        onclick="return confirm('Soft-delete this section? It can be restored.')">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                        </svg>
                                    </button>
                                @endif
                            </div>

                        </form>

                        @if ($section && !$section->trashed())
                            <form id="delete-hero-form"
                                action="{{ route('admin.sections.casestudy.hero.destroy', $section) }}" method="POST"
                                style="display:none;">
                                @csrf @method('DELETE')
                            </form>
                        @endif

                    </div>
                </div>
            </div>

            {{-- ════ RIGHT: Tips + Meta ════ --}}
            <div>
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <line x1="12" y1="8" x2="12" y2="12" />
                                    <line x1="12" y1="16" x2="12.01" y2="16" />
                                </svg>
                            </div>
                            <div class="fc-title">Tips</div>
                        </div>
                    </div>
                    <div class="fc-body"
                        style="font-size:12.5px; color:#333; line-height:1.7; display:flex; flex-direction:column; gap:8px;">
                        <p style="margin:0">• <strong style="color:#555;">Main Heading</strong> is the plain white part
                            (e.g. "We Win,")</p>
                        <p style="margin:0">• <strong style="color:#555;">Gradient Highlight</strong> is rendered in the
                            red gradient (e.g. "When You Do.")</p>
                        <p style="margin:0">• <strong style="color:#555;">Background image</strong> is optional. Leave
                            blank to use the default home-hero image.</p>
                        <p style="margin:0">• Set status to <strong style="color:#555;">Inactive</strong> to hide the
                            section without deleting it.</p>
                    </div>
                </div>

                @if ($section)
                    <div class="fc">
                        <div class="fc-head">
                            <div class="fc-title" style="color:#3A3A3A;">Record Info</div>
                        </div>
                        <div class="fc-body">
                            <div class="meta-row">
                                <span class="meta-key">Status</span>
                                <span class="pill pill-{{ $section->trashed() ? 'deleted' : $section->status }}">
                                    {{ $section->trashed() ? 'Deleted' : ucfirst($section->status) }}
                                </span>
                            </div>
                            <div class="meta-row">
                                <span class="meta-key">Created</span>
                                <span class="meta-val">{{ $section->created_at->format('M d, Y H:i') }}</span>
                            </div>
                            <div class="meta-row">
                                <span class="meta-key">Last Updated</span>
                                <span class="meta-val">{{ $section->updated_at->format('M d, Y H:i') }}</span>
                            </div>
                            @if ($section->trashed())
                                <div class="meta-row">
                                    <span class="meta-key">Deleted At</span>
                                    <span class="meta-val">{{ $section->deleted_at->format('M d, Y H:i') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.handleBgChange = function(input) {
            if (!input.files || !input.files[0]) return;
            var file = input.files[0];
            document.getElementById('bg-file-name').textContent = file.name;
            document.getElementById('bg-label-text').textContent = 'Selected:';
            var reader = new FileReader();
            reader.onload = function(e) {
                var wrap = document.getElementById('bg-preview-wrap');
                wrap.innerHTML = '';
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.cssText = 'max-height:50px; max-width:160px; object-fit:contain; border-radius:6px;';
                wrap.appendChild(img);
            };
            reader.readAsDataURL(file);
        };
    </script>
@endpush
