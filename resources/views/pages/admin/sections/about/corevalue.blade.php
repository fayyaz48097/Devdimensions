{{--
    SAVE AS: resources/views/pages/admin/sections/about/corevalue.blade.php
--}}

@extends('admin.admin')
@section('title', 'About › Core Values Section')
@section('page-title', 'Core Values Section')

@push('styles')
    <style>
        .sec-wrap {
            padding: 28px;
        }

        /* ── Breadcrumb ── */
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

        /* ── Page header ── */
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

        /* ── Flash ── */
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

        /* ── Layout ── */
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

        /* ── Card ── */
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

        /* ── Form ── */
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
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13.5px;
            color: #D8D8D8;
            outline: none;
            transition: border-color .2s;
            box-sizing: border-box;
            font-family: inherit;
        }

        .fi:focus {
            border-color: rgba(252, 63, 55, .4);
        }

        .fi::placeholder {
            color: #2A2A2A;
        }

        .fi.is-error {
            border-color: rgba(252, 63, 55, .5);
        }

        .field-error {
            font-size: 11.5px;
            color: #FC3F37;
            margin-top: 5px;
        }

        .fi-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23444' stroke-width='2' stroke-linecap='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 38px;
            cursor: pointer;
        }

        /* ── File upload ── */
        .file-upload-label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 8px;
            background: #0A0A0A;
            border: 1px dashed rgba(255, 255, 255, .1);
            cursor: pointer;
            font-size: 12.5px;
            color: #4A4A4A;
            transition: all .2s;
            width: 100%;
            box-sizing: border-box;
        }

        .file-upload-label:hover {
            border-color: rgba(252, 63, 55, .3);
            color: #FC3F37;
        }

        .file-upload-label input[type=file] {
            display: none;
        }

        .file-name {
            font-size: 11.5px;
            color: #555;
            margin-left: auto;
            max-width: 160px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* ── Image preview ── */
        .img-preview-wrap {
            background: rgba(255, 255, 255, .02);
            border: 1px solid rgba(255, 255, 255, .06);
            border-radius: 10px;
            padding: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 160px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .img-preview-wrap img {
            max-width: 100%;
            max-height: 260px;
            object-fit: contain;
            border-radius: 6px;
        }

        .img-preview-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: #2A2A2A;
            font-size: 12px;
        }

        /* ── Buttons ── */
        .btn-primary {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            border: none;
            cursor: pointer;
            background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
            transition: background .2s;
        }

        .btn-primary:hover {
            background: rgba(181, 30, 23, 1);
        }

        .btn-vis {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-vis-on {
            background: rgba(251, 191, 36, .08);
            color: #FBBF24;
            border: 1px solid rgba(251, 191, 36, .2);
        }

        .btn-vis-on:hover {
            background: rgba(251, 191, 36, .14);
        }

        .btn-vis-off {
            background: rgba(74, 222, 128, .08);
            color: #4ADE80;
            border: 1px solid rgba(74, 222, 128, .2);
        }

        .btn-vis-off:hover {
            background: rgba(74, 222, 128, .14);
        }

        /* ── Pill ── */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 9px;
            border-radius: 20px;
            font-size: 10.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        .pill::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .pill-active {
            background: rgba(74, 222, 128, .08);
            color: #4ADE80;
            border: 1px solid rgba(74, 222, 128, .18);
        }

        .pill-active::before {
            background: #4ADE80;
        }

        .pill-inactive {
            background: rgba(251, 191, 36, .08);
            color: #FBBF24;
            border: 1px solid rgba(251, 191, 36, .18);
        }

        .pill-inactive::before {
            background: #FBBF24;
        }

        .pill-deleted {
            background: rgba(252, 63, 55, .08);
            color: #FC3F37;
            border: 1px solid rgba(252, 63, 55, .18);
        }

        .pill-deleted::before {
            background: #FC3F37;
        }

        /* ── Icon action buttons ── */
        .icon-btn {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, .07);
            background: rgba(255, 255, 255, .03);
            color: #444;
            cursor: pointer;
            transition: all .18s;
        }

        .icon-btn:hover {
            background: rgba(255, 255, 255, .07);
            color: #C8C8C8;
            border-color: rgba(255, 255, 255, .14);
        }

        .icon-btn.btn-toggle-on {
            color: #FBBF24;
            border-color: rgba(251, 191, 36, .2);
            background: rgba(251, 191, 36, .06);
        }

        .icon-btn.btn-toggle-on:hover {
            background: rgba(251, 191, 36, .12);
        }

        .icon-btn.btn-toggle-off {
            color: #4ADE80;
            border-color: rgba(74, 222, 128, .2);
            background: rgba(74, 222, 128, .06);
        }

        .icon-btn.btn-toggle-off:hover {
            background: rgba(74, 222, 128, .12);
        }

        .icon-btn.btn-delete:hover {
            color: #FC3F37;
            border-color: rgba(252, 63, 55, .25);
            background: rgba(252, 63, 55, .07);
        }

        .icon-btn.btn-restore {
            color: #4ADE80;
            border-color: rgba(74, 222, 128, .2);
            background: rgba(74, 222, 128, .05);
        }

        .icon-btn.btn-restore:hover {
            background: rgba(74, 222, 128, .12);
        }

        /* ── Meta info ── */
        .meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, .04);
        }

        .meta-row:last-child {
            border-bottom: none;
        }

        .meta-key {
            font-size: 12.5px;
            color: #3A3A3A;
        }

        .meta-val {
            font-size: 12.5px;
            color: #666;
        }

        /* ── Deleted banner ── */
        .deleted-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 12px 20px;
            background: rgba(252, 63, 55, .04);
            border-bottom: 1px solid rgba(252, 63, 55, .1);
            font-size: 12.5px;
            color: #555;
        }
    </style>
@endpush

@section('content')
    <div class="sec-wrap">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="sep">›</span><span>Pages</span>
            <span class="sep">›</span><span>About Us</span>
            <span class="sep">›</span><span class="current">Core Values Section</span>
        </div>

        {{-- Page header + quick-toggle --}}
        <div class="sec-header">
            <div>
                <h1>Core Values Section</h1>
                <p>Manage the section heading and the centre diagram image shown on the About Us page.</p>
            </div>
            @if ($section && !$section->trashed())
                <form method="POST" action="{{ route('admin.sections.about.corevalue.toggleStatus', $section) }}">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn-vis {{ $section->isActive() ? 'btn-vis-on' : 'btn-vis-off' }}">
                        @if ($section->isActive())
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round">
                                <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                <line x1="12" y1="2" x2="12" y2="12" />
                            </svg>
                            Section Active — click to hide
                        @else
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            Section Hidden — click to show
                        @endif
                    </button>
                </form>
            @endif
        </div>

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="flash flash-success">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="flash flash-error">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                {{ $errors->first() }}
            </div>
        @endif

        <div class="page-grid">

            {{-- ════ LEFT: Main form ════ --}}
            <div>
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                </svg>
                            </div>
                            <div>
                                <div class="fc-title">Section Content</div>
                                <div class="fc-subtitle">Title and centre diagram image</div>
                            </div>
                        </div>
                        @if ($section)
                            <span class="pill pill-{{ $section->trashed() ? 'deleted' : $section->status }}">
                                {{ $section->trashed() ? 'Deleted' : ucfirst($section->status) }}
                            </span>
                        @endif
                    </div>

                    {{-- Soft-deleted restore banner --}}
                    @if ($section && $section->trashed())
                        <div class="deleted-banner">
                            <span>This section is soft-deleted and hidden from the public site.</span>
                            <form action="{{ route('admin.sections.about.corevalue.restore', $section->id) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="icon-btn btn-restore"
                                    style="width:auto; padding:0 14px; font-size:12px; gap:6px;">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                        <polyline points="1 4 1 10 7 10" />
                                        <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                    </svg>
                                    Restore Section
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="fc-body">
                        <form
                            action="{{ $section && !$section->trashed()
                                ? route('admin.sections.about.corevalue.update', $section)
                                : route('admin.sections.about.corevalue.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($section && !$section->trashed())
                                @method('PUT')
                            @endif

                            {{-- Title --}}
                            <div class="field">
                                <label>Section Title <span class="req">*</span></label>
                                <input type="text" name="title"
                                    class="fi {{ $errors->has('title') ? 'is-error' : '' }}"
                                    placeholder="e.g. Our Core Values" value="{{ old('title', $section?->title) }}">
                                @error('title')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Diagram image --}}
                            <div class="field">
                                <label>
                                    Diagram Image
                                    <span class="req">{{ $section && !$section->trashed() ? '' : '*' }}</span>
                                    <span class="hint">PNG, WebP, JPG, SVG — max 4 MB</span>
                                </label>

                                {{-- Current image preview --}}
                                <div class="img-preview-wrap" id="img-preview-wrap">
                                    @if ($section?->diagramImageUrl())
                                        <img id="img-preview" src="{{ $section->diagramImageUrl() }}"
                                            alt="{{ $section->diagram_image_alt ?? '' }}">
                                    @else
                                        <div class="img-preview-empty" id="img-preview-empty">
                                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                                <circle cx="8.5" cy="8.5" r="1.5" />
                                                <polyline points="21 15 16 10 5 21" />
                                            </svg>
                                            <span>No image uploaded yet</span>
                                        </div>
                                    @endif
                                </div>

                                <label class="file-upload-label">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <polyline points="17 8 12 3 7 8" />
                                        <line x1="12" y1="3" x2="12" y2="15" />
                                    </svg>
                                    <span id="upload-label-text">
                                        {{ $section?->diagramImageUrl() ? 'Replace current image' : 'Choose image file' }}
                                    </span>
                                    <span class="file-name" id="upload-file-name"></span>
                                    <input type="file" name="diagram_image"
                                        accept="image/jpeg,image/png,image/webp,image/gif,image/svg+xml,.svg"
                                        onchange="handleFileChange(this)">
                                </label>
                                @if ($section?->diagram_image_original_name)
                                    <div style="font-size:11px; color:#333; margin-top:5px;">
                                        Current file: {{ $section->diagram_image_original_name }}
                                    </div>
                                @endif
                                @error('diagram_image')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Alt text --}}
                            <div class="field">
                                <label>Image Alt Text <span class="hint">for accessibility / SEO</span></label>
                                <input type="text" name="diagram_image_alt" class="fi"
                                    placeholder="e.g. Our Core Values Diagram"
                                    value="{{ old('diagram_image_alt', $section?->diagram_image_alt) }}">
                            </div>

                            {{-- Status --}}
                            <div class="field">
                                <label>Status <span class="req">*</span></label>
                                <select name="status" class="fi fi-select">
                                    <option value="active"
                                        {{ old('status', $section?->status ?? 'active') === 'active' ? 'selected' : '' }}>
                                        Active — visible on site</option>
                                    <option value="inactive"
                                        {{ old('status', $section?->status) === 'inactive' ? 'selected' : '' }}>Inactive —
                                        hidden from site</option>
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
                                    {{-- Trash button targets the separate delete form below via form= attribute.
                                         A nested <form> inside the save <form> is invalid HTML — browsers
                                         silently detach it and can fire the wrong submission. --}}
                                    <button type="submit" form="delete-section-form" class="icon-btn btn-delete"
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

                        {{-- Delete form lives OUTSIDE the save form. Nested forms are invalid HTML.
                             The trash button above references this via form="delete-section-form". --}}
                        @if ($section && !$section->trashed())
                            <form id="delete-section-form"
                                action="{{ route('admin.sections.about.corevalue.destroy', $section) }}" method="POST"
                                style="display:none;">
                                @csrf @method('DELETE')
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ════ RIGHT: Tips + Record info ════ --}}
            <div>

                {{-- Tips --}}
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
                        <p style="margin:0">• The <strong style="color:#555;">title</strong> is displayed as the section
                            heading (H1).</p>
                        <p style="margin:0">• The <strong style="color:#555;">diagram image</strong> is used for both
                            desktop and mobile layouts — one image covers both.</p>
                        <p style="margin:0">• Recommended format: <strong style="color:#555;">PNG or WebP</strong> with
                            transparent background.</p>
                        <p style="margin:0">• Set status to <strong style="color:#555;">Inactive</strong> to hide the
                            section without deleting it.</p>
                        <p style="margin:0">• <strong style="color:#555;">Soft-delete</strong> hides the section and can
                            always be undone with Restore.</p>
                        <p style="margin:0">• Max file size: <strong style="color:#555;">4 MB</strong>.</p>
                    </div>
                </div>

                {{-- Record meta --}}
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
        (function() {

            // ── Live file name + image preview on upload ─────────────────────
            window.handleFileChange = function(input) {
                if (!input.files || !input.files[0]) return;

                var file = input.files[0];

                // Update label text
                var nameEl = document.getElementById('upload-file-name');
                var labelEl = document.getElementById('upload-label-text');
                if (nameEl) nameEl.textContent = file.name;
                if (labelEl) labelEl.textContent = 'Selected:';

                // Live preview
                var reader = new FileReader();
                reader.onload = function(e) {
                    var wrap = document.getElementById('img-preview-wrap');
                    if (!wrap) return;

                    // Clear placeholder / existing image
                    wrap.innerHTML = '';

                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.cssText =
                        'max-width:100%; max-height:260px; object-fit:contain; border-radius:6px;';
                    wrap.appendChild(img);
                };
                reader.readAsDataURL(file);
            };

        })();
    </script>
@endpush
