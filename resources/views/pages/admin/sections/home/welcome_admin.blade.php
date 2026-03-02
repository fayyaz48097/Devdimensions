{{--
    SAVE AS: resources/views/pages/admin/sections/home/welcome_admin.blade.php
--}}
@extends('admin.admin')

@section('title', 'Home › Welcome Section')
@section('page-title', 'Welcome Section')

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

        .fc-body {
            padding: 20px;
        }

        /* ── Form fields ── */
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

        textarea.fi {
            resize: vertical;
            min-height: 90px;
        }

        /* ── Field row (two columns) ── */
        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        @media(max-width:680px) {
            .field-row {
                grid-template-columns: 1fr;
            }
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
        .img-preview {
            max-height: 90px;
            max-width: 100%;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, .08);
            display: block;
            margin-bottom: 8px;
        }

        .img-preview-label {
            font-size: 11px;
            color: #3A3A3A;
            margin-bottom: 8px;
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

        /* ── Status/action bar ── */
        .section-status-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            padding: 12px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .05);
        }

        .status-meta {
            font-size: 12px;
            color: #3A3A3A;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ── Accordion (slider lines) ── */
        .accordion {
            border-bottom: 1px solid rgba(255, 255, 255, .04);
        }

        .accordion:last-child {
            border-bottom: none;
        }

        .accordion-head {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 20px;
            cursor: pointer;
            transition: background .15s;
            user-select: none;
        }

        .accordion-head:hover {
            background: rgba(255, 255, 255, .018);
        }

        .accordion-caret {
            color: #333;
            flex-shrink: 0;
            transition: transform .25s;
        }

        .accordion.is-open .accordion-caret {
            transform: rotate(180deg);
        }

        .drag-handle {
            color: #252525;
            cursor: grab;
            flex-shrink: 0;
            transition: color .2s;
        }

        .drag-handle:hover {
            color: #555;
        }

        .sortable-chosen {
            background: rgba(181, 30, 23, .06) !important;
            cursor: grabbing;
        }

        .sortable-ghost {
            opacity: .3;
        }

        .acc-line-num {
            width: 22px;
            height: 22px;
            border-radius: 6px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .07);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
            color: #333;
        }

        .acc-prefix {
            flex: 1;
            font-size: 13px;
            font-weight: 600;
            color: #C8C8C8;
        }

        .acc-prefix.is-deleted {
            text-decoration: line-through;
            color: #555;
        }

        .acc-item-count {
            font-size: 11px;
            color: #333;
            background: rgba(255, 255, 255, .03);
            border: 1px solid rgba(255, 255, 255, .06);
            padding: 2px 8px;
            border-radius: 20px;
        }

        .accordion-body {
            display: none;
            padding: 0 20px 16px;
            border-top: 1px solid rgba(255, 255, 255, .04);
        }

        .accordion.is-open .accordion-body {
            display: block;
        }

        /* ── Item list (inside accordion) ── */
        .item-list {
            list-style: none;
            margin: 0 0 14px;
            padding: 0;
        }

        .item-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, .04);
            margin-bottom: 6px;
            background: rgba(255, 255, 255, .015);
            transition: background .15s;
        }

        .item-row:last-child {
            margin-bottom: 0;
        }

        .item-row.is-deleted {
            opacity: .45;
        }

        .item-row.is-deleted .item-text {
            text-decoration: line-through;
            color: #555;
        }

        .item-text {
            flex: 1;
            font-size: 12.5px;
            color: #C8C8C8;
        }

        /* ── Inline add-item form ── */
        .add-item-form {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-top: 10px;
        }

        .add-item-form .fi {
            flex: 1;
        }

        .btn-add-item {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 0 14px;
            height: 40px;
            border-radius: 7px;
            background: rgba(252, 63, 55, .08);
            border: 1px solid rgba(252, 63, 55, .2);
            color: #FC3F37;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all .18s;
            white-space: nowrap;
        }

        .btn-add-item:hover {
            background: rgba(252, 63, 55, .15);
        }

        /* ── Pills ── */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 9px;
            border-radius: 20px;
            font-size: 10.5px;
            font-weight: 600;
            white-space: nowrap;
            flex-shrink: 0;
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
        .item-actions {
            display: flex;
            align-items: center;
            gap: 5px;
            flex-shrink: 0;
        }

        .icon-btn {
            width: 28px;
            height: 28px;
            border-radius: 6px;
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

        .icon-btn.btn-edit:hover {
            color: #818CF8;
            border-color: rgba(129, 140, 248, .25);
            background: rgba(129, 140, 248, .07);
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

        /* ── Empty ── */
        .empty-items {
            padding: 24px 0 6px;
            text-align: center;
            color: #2A2A2A;
            font-size: 12.5px;
        }

        /* ── Note banner ── */
        .note-banner {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 12.5px;
            color: #3A3A3A;
            background: rgba(255, 255, 255, .02);
            border: 1px solid rgba(255, 255, 255, .05);
            line-height: 1.5;
        }

        /* ── Modal ── */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .75);
            backdrop-filter: blur(4px);
            z-index: 1000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-backdrop.is-open {
            display: flex;
        }

        .modal {
            background: #111;
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
        }

        .modal-title {
            font-size: 15px;
            font-weight: 600;
            color: #C8C8C8;
        }

        .modal-close {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            color: #444;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .18s;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, .08);
            color: #C8C8C8;
        }

        .modal-body {
            padding: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="sec-wrap">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="sep">›</span><span>Pages</span>
            <span class="sep">›</span><span>Home</span>
            <span class="sep">›</span><span class="current">Welcome Section</span>
        </div>

        {{-- Page header --}}
        <div class="sec-header">
            <div>
                <h1>Welcome Section</h1>
                <p>Manage the heading, description, CTA button, hero image, and animated text sliders.</p>
            </div>
        </div>

        {{-- Flash --}}
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

        <div class="note-banner">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2"
                stroke-linecap="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            <span>
                The section hides automatically when <strong style="color:#666;">inactive or deleted</strong>.
                Each slider line shows its active items as cycling animated text.
                Lines and items can be individually toggled or reordered via drag-and-drop.
            </span>
        </div>

        <div class="page-grid">

            {{-- ════ LEFT: Content form + Slider lines ════ --}}
            <div>

                {{-- ── Section Content Card ── --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <path d="M12 20h9" />
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                                </svg>
                            </div>
                            <div>
                                <div class="fc-title">Section Content</div>
                                <div class="fc-subtitle">Heading, description, CTA, and hero image</div>
                            </div>
                        </div>
                        @if ($section)
                            <span class="pill pill-{{ $section->trashed() ? 'deleted' : $section->status }}">
                                {{ $section->trashed() ? 'Deleted' : ucfirst($section->status) }}
                            </span>
                        @endif
                    </div>

                    {{-- Status bar (only when section exists and is not trashed) --}}
                    @if ($section && !$section->trashed())
                        <div class="section-status-bar">
                            <div class="status-meta">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#3A3A3A"
                                    stroke-width="2" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                                Updated {{ $section->updated_at->diffForHumans() }}
                            </div>
                            <div style="display:flex; gap:8px;">
                                <form action="{{ route('admin.sections.home.welcome.toggleStatus', $section) }}"
                                    method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit"
                                        class="icon-btn {{ $section->isActive() ? 'btn-toggle-on' : 'btn-toggle-off' }}"
                                        title="{{ $section->isActive() ? 'Set Inactive' : 'Set Active' }}">
                                        @if ($section->isActive())
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                                <line x1="12" y1="2" x2="12" y2="12" />
                                            </svg>
                                        @else
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                <polyline points="20 6 9 17 4 12" />
                                            </svg>
                                        @endif
                                    </button>
                                </form>
                                <form action="{{ route('admin.sections.home.welcome.destroy', $section) }}" method="POST"
                                    onsubmit="return confirm('Soft-delete this section?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="icon-btn btn-delete" title="Delete">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif

                    {{-- Restore bar --}}
                    @if ($section && $section->trashed())
                        <div
                            style="padding:14px 20px; display:flex; align-items:center; justify-content:space-between; gap:12px; border-bottom:1px solid rgba(255,255,255,.05);">
                            <span style="font-size:12.5px; color:#555;">This section is soft-deleted and hidden from the
                                public site.</span>
                            <form action="{{ route('admin.sections.home.welcome.restore', $section->id) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="icon-btn btn-restore"
                                    style="width:auto; padding:0 14px; font-size:12px; gap:6px;">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                        <polyline points="1 4 1 10 7 10" />
                                        <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                    </svg>
                                    Restore
                                </button>
                            </form>
                        </div>
                    @endif

                    <div class="fc-body">
                        <form
                            action="{{ $section && !$section->trashed()
                                ? route('admin.sections.home.welcome.update', $section)
                                : route('admin.sections.home.welcome.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($section && !$section->trashed())
                                @method('PUT')
                            @endif

                            {{-- Heading --}}
                            <div class="field">
                                <label>Heading <span class="req">*</span></label>
                                <input type="text" name="heading"
                                    class="fi {{ $errors->has('heading') ? 'is-error' : '' }}"
                                    placeholder="e.g. Welcome to DevDimensions"
                                    value="{{ old('heading', $section?->heading) }}">
                                @error('heading')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="field">
                                <label>Description <span class="req">*</span></label>
                                <textarea name="description" class="fi {{ $errors->has('description') ? 'is-error' : '' }}"
                                    placeholder="Body paragraph shown below the heading...">{{ old('description', $section?->description) }}</textarea>
                                @error('description')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- CTA --}}
                            <div class="field">
                                <label>CTA Button <span class="req">*</span></label>
                                <div class="field-row">
                                    <div>
                                        <input type="text" name="cta_text"
                                            class="fi {{ $errors->has('cta_text') ? 'is-error' : '' }}"
                                            placeholder="Button label"
                                            value="{{ old('cta_text', $section?->cta_text) }}">
                                        @error('cta_text')
                                            <div class="field-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="text" name="cta_url"
                                            class="fi {{ $errors->has('cta_url') ? 'is-error' : '' }}"
                                            placeholder="/contact-us" value="{{ old('cta_url', $section?->cta_url) }}">
                                        @error('cta_url')
                                            <div class="field-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Hero Image --}}
                            <div class="field">
                                <label>Hero Image <span class="hint">(leave blank to keep current)</span></label>
                                @if ($section?->heroImageUrl())
                                    <img src="{{ $section->heroImageUrl() }}" class="img-preview" alt="Current">
                                    <div class="img-preview-label">Current image — upload a new one to replace</div>
                                @endif
                                <label class="file-upload-label">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <polyline points="17 8 12 3 7 8" />
                                        <line x1="12" y1="3" x2="12" y2="15" />
                                    </svg>
                                    <span id="hero-file-text">JPEG, PNG, WebP, SVG (max 4 MB)</span>
                                    <span class="file-name" id="hero-file-name"></span>
                                    <input type="file" name="hero_image" accept="image/*"
                                        onchange="handleFileChange(this,'hero-file-name','hero-file-text')">
                                </label>
                                @error('hero_image')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>Image Alt Text <span class="hint">(accessibility)</span></label>
                                <input type="text" name="hero_image_alt" class="fi"
                                    placeholder="Describe the image"
                                    value="{{ old('hero_image_alt', $section?->hero_image_alt) }}">
                            </div>

                            {{-- Status --}}
                            <div class="field">
                                <label>Status <span class="req">*</span></label>
                                <select name="status" class="fi fi-select">
                                    <option value="active"
                                        {{ old('status', $section?->status ?? 'active') === 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive"
                                        {{ old('status', $section?->status) === 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>

                            <div style="margin-top:22px;">
                                <button type="submit" class="btn-primary">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                        <polyline points="17 21 17 13 7 13 7 21" />
                                        <polyline points="7 3 7 8 15 8" />
                                    </svg>
                                    {{ $section && !$section->trashed() ? 'Save Changes' : 'Create Section' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- ── Slider Lines Card ── --}}
                @if ($section && !$section->trashed())
                    <div class="fc">
                        <div class="fc-head">
                            <div class="fc-head-left">
                                <div class="fc-head-icon">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="#FC3F37" stroke-width="2" stroke-linecap="round">
                                        <line x1="8" y1="6" x2="21" y2="6" />
                                        <line x1="8" y1="12" x2="21" y2="12" />
                                        <line x1="8" y1="18" x2="21" y2="18" />
                                        <line x1="3" y1="6" x2="3.01" y2="6" />
                                        <line x1="3" y1="12" x2="3.01" y2="12" />
                                        <line x1="3" y1="18" x2="3.01" y2="18" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="fc-title">Animated Slider Lines</div>
                                    <div class="fc-subtitle">Each line has a prefix + cycling word items. Drag to reorder.
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $allLines = $section
                                ->sliderLines()
                                ->withTrashed()
                                ->with(['items' => fn($q) => $q->withTrashed()->orderBy('sort_order')])
                                ->orderBy('sort_order')
                                ->get();
                        @endphp

                        @if ($allLines->isEmpty())
                            <div class="empty-items">No slider lines yet — add one using the form →</div>
                        @else
                            <div id="sortable-lines">
                                @foreach ($allLines as $lineIdx => $line)
                                    <div class="accordion {{ $line->trashed() ? '' : '' }}"
                                        data-id="{{ $line->id }}" id="accordion-line-{{ $line->id }}">
                                        <div class="accordion-head" onclick="toggleAccordion({{ $line->id }})">

                                            {{-- Drag handle (non-trashed only) --}}
                                            @if (!$line->trashed())
                                                <span class="drag-handle" onclick="event.stopPropagation()"
                                                    title="Drag to reorder">
                                                    <svg width="14" height="14" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round">
                                                        <circle cx="9" cy="5" r="1" />
                                                        <circle cx="9" cy="12" r="1" />
                                                        <circle cx="9" cy="19" r="1" />
                                                        <circle cx="15" cy="5" r="1" />
                                                        <circle cx="15" cy="12" r="1" />
                                                        <circle cx="15" cy="19" r="1" />
                                                    </svg>
                                                </span>
                                            @else
                                                <span style="width:14px; flex-shrink:0;"></span>
                                            @endif

                                            <div class="acc-line-num">{{ $lineIdx + 1 }}</div>

                                            <div class="acc-prefix {{ $line->trashed() ? 'is-deleted' : '' }}">
                                                "{{ $line->prefix_text }}"</div>

                                            <span
                                                class="acc-item-count">{{ $line->items->whereNull('deleted_at')->count() }}
                                                items</span>

                                            @if ($line->trashed())
                                                <span class="pill pill-deleted">Deleted</span>
                                            @else
                                                <span
                                                    class="pill pill-{{ $line->status }}">{{ ucfirst($line->status) }}</span>
                                            @endif

                                            {{-- Line actions --}}
                                            <div class="item-actions" onclick="event.stopPropagation()">
                                                @if ($line->trashed())
                                                    <form
                                                        action="{{ route('admin.sections.home.welcome.lines.restore', [$section->id, $line->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" class="icon-btn btn-restore"
                                                            title="Restore">
                                                            <svg width="12" height="12" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round">
                                                                <polyline points="1 4 1 10 7 10" />
                                                                <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form
                                                        action="{{ route('admin.sections.home.welcome.lines.toggleStatus', [$section, $line]) }}"
                                                        method="POST">
                                                        @csrf @method('PATCH')
                                                        <button type="submit"
                                                            class="icon-btn {{ $line->isActive() ? 'btn-toggle-on' : 'btn-toggle-off' }}"
                                                            title="{{ $line->isActive() ? 'Set Inactive' : 'Set Active' }}">
                                                            @if ($line->isActive())
                                                                <svg width="12" height="12" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round">
                                                                    <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                                                    <line x1="12" y1="2" x2="12"
                                                                        y2="12" />
                                                                </svg>
                                                            @else
                                                                <svg width="12" height="12" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round">
                                                                    <polyline points="20 6 9 17 4 12" />
                                                                </svg>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <button type="button" class="icon-btn btn-edit" title="Edit prefix"
                                                        onclick="openLineEditModal({{ $line->id }}, '{{ addslashes($line->prefix_text) }}', '{{ $line->status }}')">
                                                        <svg width="12" height="12" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round">
                                                            <path
                                                                d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                            <path
                                                                d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                        </svg>
                                                    </button>
                                                    <form
                                                        action="{{ route('admin.sections.home.welcome.lines.destroy', [$section, $line]) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Soft-delete this slider line?')">
                                                        @csrf @method('DELETE')
                                                        <button type="submit" class="icon-btn btn-delete"
                                                            title="Delete">
                                                            <svg width="12" height="12" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round">
                                                                <polyline points="3 6 5 6 21 6" />
                                                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>

                                            <svg class="accordion-caret" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round">
                                                <polyline points="6 9 12 15 18 9" />
                                            </svg>
                                        </div>

                                        <div class="accordion-body">
                                            {{-- Item list --}}
                                            @php $lineItems = $line->items; @endphp

                                            @if ($lineItems->isEmpty())
                                                <div class="empty-items">No items yet.</div>
                                            @else
                                                <ul class="item-list" id="sortable-items-{{ $line->id }}">
                                                    @foreach ($lineItems as $item)
                                                        <li class="item-row {{ $item->trashed() ? 'is-deleted' : '' }}"
                                                            data-id="{{ $item->id }}">
                                                            @if (!$item->trashed())
                                                                <span class="drag-handle" title="Drag">
                                                                    <svg width="12" height="12"
                                                                        viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round">
                                                                        <circle cx="9" cy="5" r="1" />
                                                                        <circle cx="9" cy="12" r="1" />
                                                                        <circle cx="9" cy="19" r="1" />
                                                                        <circle cx="15" cy="5" r="1" />
                                                                        <circle cx="15" cy="12" r="1" />
                                                                        <circle cx="15" cy="19" r="1" />
                                                                    </svg>
                                                                </span>
                                                            @else
                                                                <span style="width:12px;flex-shrink:0;"></span>
                                                            @endif

                                                            <span class="item-text">{{ $item->item_text }}</span>

                                                            @if ($item->trashed())
                                                                <span class="pill pill-deleted">Deleted</span>
                                                            @else
                                                                <span
                                                                    class="pill pill-{{ $item->status }}">{{ ucfirst($item->status) }}</span>
                                                            @endif

                                                            <div class="item-actions">
                                                                @if ($item->trashed())
                                                                    <form
                                                                        action="{{ route('admin.sections.home.welcome.items.restore', [$section->id, $line->id, $item->id]) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="icon-btn btn-restore" title="Restore">
                                                                            <svg width="11" height="11"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round">
                                                                                <polyline points="1 4 1 10 7 10" />
                                                                                <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <form
                                                                        action="{{ route('admin.sections.home.welcome.items.toggleStatus', [$section, $line, $item]) }}"
                                                                        method="POST">
                                                                        @csrf @method('PATCH')
                                                                        <button type="submit"
                                                                            class="icon-btn {{ $item->isActive() ? 'btn-toggle-on' : 'btn-toggle-off' }}"
                                                                            title="{{ $item->isActive() ? 'Set Inactive' : 'Set Active' }}">
                                                                            @if ($item->isActive())
                                                                                <svg width="11" height="11"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round">
                                                                                    <path
                                                                                        d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                                                                    <line x1="12" y1="2"
                                                                                        x2="12" y2="12" />
                                                                                </svg>
                                                                            @else
                                                                                <svg width="11" height="11"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    stroke="currentColor" stroke-width="2"
                                                                                    stroke-linecap="round">
                                                                                    <polyline points="20 6 9 17 4 12" />
                                                                                </svg>
                                                                            @endif
                                                                        </button>
                                                                    </form>
                                                                    <button type="button" class="icon-btn btn-edit"
                                                                        title="Edit"
                                                                        onclick="openItemEditModal({{ $item->id }}, '{{ addslashes($item->item_text) }}', '{{ $item->status }}', {{ $section->id }}, {{ $line->id }})">
                                                                        <svg width="11" height="11"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round">
                                                                            <path
                                                                                d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                                            <path
                                                                                d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                                        </svg>
                                                                    </button>
                                                                    <form
                                                                        action="{{ route('admin.sections.home.welcome.items.destroy', [$section, $line, $item]) }}"
                                                                        method="POST"
                                                                        onsubmit="return confirm('Delete this item?')">
                                                                        @csrf @method('DELETE')
                                                                        <button type="submit" class="icon-btn btn-delete"
                                                                            title="Delete">
                                                                            <svg width="11" height="11"
                                                                                viewBox="0 0 24 24" fill="none"
                                                                                stroke="currentColor" stroke-width="2"
                                                                                stroke-linecap="round">
                                                                                <polyline points="3 6 5 6 21 6" />
                                                                                <path
                                                                                    d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                            {{-- Inline add-item form (non-trashed lines only) --}}
                                            @if (!$line->trashed())
                                                <form
                                                    action="{{ route('admin.sections.home.welcome.items.store', [$section, $line]) }}"
                                                    method="POST" class="add-item-form">
                                                    @csrf
                                                    <input type="text" name="item_text" class="fi"
                                                        placeholder="New cycling word, e.g. DevOps Engineer"
                                                        style="height:40px; padding:0 12px; font-size:13px;">
                                                    <input type="hidden" name="status" value="active">
                                                    <button type="submit" class="btn-add-item">
                                                        <svg width="12" height="12" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.5"
                                                            stroke-linecap="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19" />
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12" />
                                                        </svg>
                                                        Add
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

            </div>

            {{-- ════ RIGHT: Add line form + Tips ════ --}}
            <div>

                @if ($section && !$section->trashed())
                    <div class="fc">
                        <div class="fc-head">
                            <div class="fc-head-left">
                                <div class="fc-head-icon">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="#FC3F37" stroke-width="2.5" stroke-linecap="round">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </div>
                                <div class="fc-title">Add Slider Line</div>
                            </div>
                        </div>
                        <div class="fc-body">
                            <form action="{{ route('admin.sections.home.welcome.lines.store', $section) }}"
                                method="POST">
                                @csrf

                                <div class="field">
                                    <label>Prefix Text <span class="req">*</span></label>
                                    <input type="text" name="prefix_text"
                                        class="fi {{ $errors->has('prefix_text') ? 'is-error' : '' }}"
                                        placeholder="e.g. I need a" value="{{ old('prefix_text') }}">
                                    <div style="font-size:11px; color:#333; margin-top:5px;">The static label shown before
                                        the cycling words.</div>
                                    @error('prefix_text')
                                        <div class="field-error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label>Status <span class="req">*</span></label>
                                    <select name="status" class="fi fi-select">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div style="margin-top:18px;">
                                    <button type="submit" class="btn-primary">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        Add Line
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                {{-- Tips --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-title" style="color:#3A3A3A;">Tips</div>
                    </div>
                    <div
                        style="padding:16px 20px; display:flex; flex-direction:column; gap:9px; font-size:12.5px; color:#333; line-height:1.5;">
                        <p style="margin:0">• Each <strong style="color:#555;">slider line</strong> shows as: <em
                                style="color:#555;">"Prefix [cycling word]"</em>.</p>
                        <p style="margin:0">• Add at least <strong style="color:#555;">2–3 items</strong> per line for the
                            animation to be effective.</p>
                        <p style="margin:0">• The CSS animation speed auto-adjusts to the number of items.</p>
                        <p style="margin:0">• <strong style="color:#555;">Drag</strong> the ⠿ handle to reorder lines or
                            items.</p>
                        <p style="margin:0">• Items can be added directly inside each expanded line — click the row to
                            expand it.</p>
                        <p style="margin:0">• The section hides on the public site when <strong
                                style="color:#555;">inactive or deleted</strong>.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- ══ EDIT LINE MODAL ══ --}}
    <div class="modal-backdrop" id="line-edit-modal-backdrop">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title">Edit Slider Line</span>
                <button type="button" class="modal-close" onclick="closeLineEditModal()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="line-edit-form" method="POST">
                    @csrf @method('PUT')
                    <div class="field">
                        <label>Prefix Text <span class="req">*</span></label>
                        <input type="text" name="prefix_text" id="line-modal-prefix" class="fi"
                            placeholder="e.g. I need a">
                    </div>
                    <div class="field">
                        <label>Status <span class="req">*</span></label>
                        <select name="status" id="line-modal-status" class="fi fi-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div style="margin-top:22px;">
                        <button type="submit" class="btn-primary">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ══ EDIT ITEM MODAL ══ --}}
    <div class="modal-backdrop" id="item-edit-modal-backdrop">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title">Edit Slider Item</span>
                <button type="button" class="modal-close" onclick="closeItemEditModal()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="item-edit-form" method="POST">
                    @csrf @method('PUT')
                    <div class="field">
                        <label>Item Text <span class="req">*</span></label>
                        <input type="text" name="item_text" id="item-modal-text" class="fi"
                            placeholder="e.g. Full Stack Developer">
                    </div>
                    <div class="field">
                        <label>Status <span class="req">*</span></label>
                        <select name="status" id="item-modal-status" class="fi fi-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div style="margin-top:22px;">
                        <button type="submit" class="btn-primary">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>
    <script>
        (function() {

            // ── File name display ──
            window.handleFileChange = function(input, nameId, textId) {
                if (input.files && input.files[0]) {
                    var el = document.getElementById(nameId);
                    var tx = document.getElementById(textId);
                    if (el) el.textContent = input.files[0].name;
                    if (tx) tx.textContent = 'Selected:';
                }
            };

            // ── Accordion toggle ──
            window.toggleAccordion = function(lineId) {
                var acc = document.getElementById('accordion-line-' + lineId);
                if (!acc) return;
                acc.classList.toggle('is-open');
            };

            // ── Drag-and-drop: Lines ──
            var lineList = document.getElementById('sortable-lines');
            if (lineList) {
                Sortable.create(lineList, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    filter: '.accordion-body',
                    onEnd: function() {
                        var ids = Array.from(lineList.querySelectorAll('.accordion[data-id]'))
                            .map(function(el) {
                                return el.dataset.id;
                            });
                        @if ($section)
                            fetch('{{ route('admin.sections.home.welcome.lines.sort', $section) }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    items: ids
                                }),
                            });
                        @endif
                    },
                });
            }

            // ── Drag-and-drop: Items (per line) ──
            @if ($section)
                @foreach ($section->sliderLines()->withTrashed()->get() as $line)
                    @if (!$line->trashed())
                        (function() {
                            var list = document.getElementById('sortable-items-{{ $line->id }}');
                            if (!list) return;
                            Sortable.create(list, {
                                handle: '.drag-handle',
                                animation: 150,
                                ghostClass: 'sortable-ghost',
                                chosenClass: 'sortable-chosen',
                                onEnd: function() {
                                    var ids = Array.from(list.querySelectorAll('.item-row[data-id]'))
                                        .map(function(el) {
                                            return el.dataset.id;
                                        });
                                    fetch('{{ route('admin.sections.home.welcome.items.sort', [$section, $line]) }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({
                                            items: ids
                                        }),
                                    });
                                },
                            });
                        })();
                    @endif
                @endforeach
            @endif

            // ── Line Edit Modal ──
            @if ($section)
                var lineUpdateBase =
                    '{{ rtrim(route('admin.sections.home.welcome.lines.update', [$section->id, '__ID__']), '/') }}';
            @else
                var lineUpdateBase = '';
            @endif

            window.openLineEditModal = function(id, prefix, status) {
                document.getElementById('line-edit-form').action = lineUpdateBase.replace('__ID__', id);
                document.getElementById('line-modal-prefix').value = prefix;
                document.getElementById('line-modal-status').value = status;
                document.getElementById('line-edit-modal-backdrop').classList.add('is-open');
            };

            window.closeLineEditModal = function() {
                document.getElementById('line-edit-modal-backdrop').classList.remove('is-open');
            };

            document.getElementById('line-edit-modal-backdrop').addEventListener('click', function(e) {
                if (e.target === this) closeLineEditModal();
            });

            // ── Item Edit Modal ──
            @if ($section)
                var itemUpdateBase =
                    '{{ rtrim(route('admin.sections.home.welcome.items.update', [$section->id, '__LINE_ID__', '__ITEM_ID__']), '/') }}';
            @else
                var itemUpdateBase = '';
            @endif

            window.openItemEditModal = function(itemId, text, status, sectionId, lineId) {
                var url = itemUpdateBase.replace('__LINE_ID__', lineId).replace('__ITEM_ID__', itemId);
                document.getElementById('item-edit-form').action = url;
                document.getElementById('item-modal-text').value = text;
                document.getElementById('item-modal-status').value = status;
                document.getElementById('item-edit-modal-backdrop').classList.add('is-open');
            };

            window.closeItemEditModal = function() {
                document.getElementById('item-edit-modal-backdrop').classList.remove('is-open');
            };

            document.getElementById('item-edit-modal-backdrop').addEventListener('click', function(e) {
                if (e.target === this) closeItemEditModal();
            });

        })();
    </script>
@endpush
