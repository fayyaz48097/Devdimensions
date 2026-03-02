{{--
    SAVE AS: resources/views/pages/admin/sections/home/portfolio_admin.blade.php

    Admin panel for the Portfolio / "Discover What's Possible" section.
    Follows the exact same dark-theme custom CSS pattern as findtalent_admin.blade.php.
--}}

@extends('admin.admin')

@section('title', 'Home › Portfolio Section')
@section('page-title', 'Portfolio Section')

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

        /* ── Add button ── */
        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 600;
            color: #fff;
            border: none;
            cursor: pointer;
            background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
            transition: background .2s;
        }

        .btn-add:hover {
            background: rgba(181, 30, 23, 1);
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

        .step-count {
            font-size: 11px;
            font-weight: 600;
            color: #444;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .07);
            padding: 2px 9px;
            border-radius: 20px;
        }

        /* ── Project list ── */
        .project-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .project-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .04);
            transition: background .15s;
        }

        .project-row:last-child {
            border-bottom: none;
        }

        .project-row:hover {
            background: rgba(255, 255, 255, .018);
        }

        .project-row.is-deleted {
            opacity: .45;
        }

        .project-row.is-deleted .proj-title {
            text-decoration: line-through;
            color: #555;
        }

        .project-row.sortable-chosen {
            background: rgba(181, 30, 23, .06);
            cursor: grabbing;
        }

        .project-row.sortable-ghost {
            opacity: .3;
        }

        /* Drag handle */
        .drag-handle {
            color: #252525;
            cursor: grab;
            flex-shrink: 0;
            transition: color .2s;
        }

        .drag-handle:hover {
            color: #555;
        }

        /* Row number */
        .proj-num {
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

        /* Thumbnails */
        .proj-thumbs {
            display: flex;
            gap: 5px;
            flex-shrink: 0;
        }

        .proj-thumb {
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid rgba(255, 255, 255, .07);
        }

        .proj-thumb-desk {
            width: 52px;
            height: 38px;
        }

        .proj-thumb-mob {
            width: 26px;
            height: 38px;
        }

        .proj-thumb-empty {
            background: rgba(255, 255, 255, .04);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #252525;
        }

        /* Info */
        .proj-info {
            flex: 1;
            min-width: 0;
        }

        .proj-title {
            font-size: 13px;
            font-weight: 600;
            color: #C8C8C8;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .proj-slug {
            font-size: 11.5px;
            color: #333;
            margin-top: 2px;
        }

        /* Category badges */
        .proj-cats {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            flex-shrink: 0;
        }

        .cat-pill {
            display: inline-flex;
            align-items: center;
            padding: 2px 9px;
            border-radius: 20px;
            font-size: 10.5px;
            font-weight: 600;
            color: #FBBF24;
            background: rgba(251, 191, 36, .08);
            border: 1px solid rgba(251, 191, 36, .18);
            white-space: nowrap;
        }

        /* Status pills */
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

        /* Action icon buttons */
        .item-actions {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }

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

        /* Empty state */
        .empty-items {
            padding: 40px 20px;
            text-align: center;
            color: #2A2A2A;
            font-size: 13px;
        }

        .empty-items a {
            color: #FC3F37;
            text-decoration: none;
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
            line-height: 1.55;
            color: #4A4A4A;
            background: rgba(255, 255, 255, .025);
            border: 1px solid rgba(255, 255, 255, .06);
        }

        .note-banner svg {
            flex-shrink: 0;
            margin-top: 1px;
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

        textarea.fi {
            resize: vertical;
            min-height: 90px;
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

        /* File upload */
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
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Submit btn */
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

        /* ── Modal ── */
        .modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 200;
            background: rgba(0, 0, 0, .75);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
        }

        .modal-backdrop.is-open {
            display: flex;
        }

        .modal {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, .09);
            border-radius: 16px;
            width: 100%;
            max-width: 520px;
            max-height: 92vh;
            overflow-y: auto;
            margin: 16px;
        }

        .modal-head {
            padding: 18px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-title {
            font-size: 15px;
            font-weight: 600;
            color: #D8D8D8;
        }

        .modal-close {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .04);
            border: none;
            color: #444;
            cursor: pointer;
            transition: all .15s;
        }

        .modal-close:hover {
            background: rgba(252, 63, 55, .1);
            color: #FC3F37;
        }

        .modal-body {
            padding: 22px;
        }

        /* Current thumb pair in edit modal */
        .modal-thumb-pair {
            display: flex;
            gap: 12px;
            margin-bottom: 18px;
        }

        .modal-thumb-wrap {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
        }

        .modal-thumb-wrap img {
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, .08);
            object-fit: cover;
        }

        .modal-thumb-label {
            font-size: 10px;
            color: #333;
        }

        /* 2-col image grid */
        .img-pair {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        @media(max-width:540px) {
            .img-pair {
                grid-template-columns: 1fr;
            }
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
            <span class="sep">›</span><span class="current">Portfolio Section</span>
        </div>

        {{-- Page header --}}
        <div class="sec-header">
            <div>
                <h1>Portfolio Projects</h1>
                <p>Manage the "Discover What's Possible" slider cards on the home page. Drag to reorder.</p>
            </div>
            <button class="btn-add" onclick="openCreateModal()">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2.5" stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Add Project
            </button>
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

        {{-- Info note --}}
        <div class="note-banner">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2"
                stroke-linecap="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            <span>
                Only <strong style="color:#666;">active</strong> projects appear on the public page.
                Drag the ⠿ handle to reorder the slider. Deleted projects can be restored at any time.
            </span>
        </div>

        {{-- Project list card --}}
        <div class="fc">
            <div class="fc-head">
                <div class="fc-head-left">
                    <div class="fc-head-icon">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">Projects</div>
                        <div class="fc-subtitle">Drag to change slider order</div>
                    </div>
                </div>
                <span class="step-count">{{ $projects->whereNull('deleted_at')->count() }} projects</span>
            </div>

            @if ($projects->isEmpty())
                <div class="empty-items">
                    No projects yet — <a href="#" onclick="openCreateModal(); return false;">add the first one</a>.
                </div>
            @else
                <ul class="project-list" id="sortable-projects">
                    @foreach ($projects as $index => $project)
                        <li class="project-row {{ $project->trashed() ? 'is-deleted' : '' }}"
                            data-id="{{ $project->id }}">

                            {{-- Drag handle --}}
                            @if (!$project->trashed())
                                <span class="drag-handle" title="Drag to reorder">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                        <circle cx="9" cy="5" r="1" />
                                        <circle cx="9" cy="12" r="1" />
                                        <circle cx="9" cy="19" r="1" />
                                        <circle cx="15" cy="5" r="1" />
                                        <circle cx="15" cy="12" r="1" />
                                        <circle cx="15" cy="19" r="1" />
                                    </svg>
                                </span>
                            @else
                                <span style="width:14px;flex-shrink:0;"></span>
                            @endif

                            {{-- Row number --}}
                            <div class="proj-num">{{ $index + 1 }}</div>

                            {{-- Thumbnails --}}
                            <div class="proj-thumbs">
                                @if ($project->desktopImageUrl())
                                    <img src="{{ $project->desktopImageUrl() }}" class="proj-thumb proj-thumb-desk"
                                        alt="Desktop" title="Desktop: {{ $project->img_desktop_original_name }}">
                                @else
                                    <div class="proj-thumb proj-thumb-desk proj-thumb-empty">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5">
                                            <rect x="3" y="3" width="18" height="18" rx="2" />
                                            <circle cx="8.5" cy="8.5" r="1.5" />
                                            <polyline points="21 15 16 10 5 21" />
                                        </svg>
                                    </div>
                                @endif
                                @if ($project->mobileImageUrl())
                                    <img src="{{ $project->mobileImageUrl() }}" class="proj-thumb proj-thumb-mob"
                                        alt="Mobile" title="Mobile: {{ $project->img_mobile_original_name }}">
                                @else
                                    <div class="proj-thumb proj-thumb-mob proj-thumb-empty">
                                        <svg width="9" height="9" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.5">
                                            <rect x="5" y="2" width="14" height="20" rx="2" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            {{-- Title + slug --}}
                            <div class="proj-info">
                                <div class="proj-title">{{ $project->title }}</div>
                                <div class="proj-slug">/{{ $project->slug }}</div>
                            </div>

                            {{-- Categories --}}
                            <div class="proj-cats">
                                @foreach ($project->categories as $cat)
                                    <span class="cat-pill">{{ $cat }}</span>
                                @endforeach
                            </div>

                            {{-- Status pill --}}
                            @if ($project->trashed())
                                <span class="pill pill-deleted">Deleted</span>
                            @else
                                <span class="pill pill-{{ $project->status }}">{{ ucfirst($project->status) }}</span>
                            @endif

                            {{-- Actions --}}
                            <div class="item-actions">
                                @if ($project->trashed())
                                    <form action="{{ route('admin.sections.home.portfolio.restore', $project->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="icon-btn btn-restore" title="Restore">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                <polyline points="1 4 1 10 7 10" />
                                                <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    {{-- Toggle status --}}
                                    <form action="{{ route('admin.sections.home.portfolio.toggleStatus', $project) }}"
                                        method="POST">
                                        @csrf @method('PATCH')
                                        @if ($project->isActive())
                                            <button type="submit" class="icon-btn btn-toggle-on" title="Set Inactive">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                    <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                                    <line x1="12" y1="2" x2="12" y2="12" />
                                                </svg>
                                            </button>
                                        @else
                                            <button type="submit" class="icon-btn btn-toggle-off" title="Set Active">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                    <polyline points="20 6 9 17 4 12" />
                                                </svg>
                                            </button>
                                        @endif
                                    </form>

                                    {{-- Edit --}}
                                    <button type="button" class="icon-btn btn-edit" title="Edit"
                                        onclick="openEditModal(
                                            {{ $project->id }},
                                            '{{ addslashes($project->title) }}',
                                            '{{ addslashes($project->slug) }}',
                                            '{{ addslashes(implode(', ', $project->categories)) }}',
                                            '{{ addslashes($project->description) }}',
                                            '{{ addslashes($project->project_url ?? '') }}',
                                            '{{ $project->status }}',
                                            {{ $project->desktopImageUrl() ? "'" . addslashes($project->desktopImageUrl()) . "'" : 'null' }},
                                            {{ $project->mobileImageUrl() ? "'" . addslashes($project->mobileImageUrl()) . "'" : 'null' }},
                                            '{{ addslashes($project->img_desktop_original_name ?? '') }}',
                                            '{{ addslashes($project->img_mobile_original_name ?? '') }}'
                                        )">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>
                                    </button>

                                    {{-- Delete --}}
                                    <form action="{{ route('admin.sections.home.portfolio.destroy', $project) }}"
                                        method="POST"
                                        onsubmit="return confirm('Soft-delete \'{{ addslashes($project->title) }}\'?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="icon-btn btn-delete" title="Delete">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                                <path d="M10 11v6" />
                                                <path d="M14 11v6" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>


    {{-- ════════════════════════════════════════════════════════════
         CREATE MODAL
    ════════════════════════════════════════════════════════════ --}}
    <div class="modal-backdrop" id="create-modal-backdrop">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title">Add Portfolio Project</span>
                <button type="button" class="modal-close" onclick="closeCreateModal()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-form" method="POST" action="{{ route('admin.sections.home.portfolio.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @include('pages.admin.sections.home._portfolio-form', ['project' => null])
                    <div style="margin-top:22px;">
                        <button type="submit" class="btn-primary">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Create Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ════════════════════════════════════════════════════════════
         EDIT MODAL  (single reusable modal, populated via JS)
    ════════════════════════════════════════════════════════════ --}}
    <div class="modal-backdrop" id="edit-modal-backdrop">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title">Edit Project</span>
                <button type="button" class="modal-close" onclick="closeEditModal()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">

                {{-- Current image previews --}}
                <div class="modal-thumb-pair" id="modal-thumb-pair">
                    <div class="modal-thumb-wrap">
                        <img id="modal-desk-thumb" src="" style="width:90px;height:66px;display:none;"
                            alt="Desktop">
                        <div class="modal-thumb-label" id="modal-desk-name" style="color:#444;"></div>
                        <div class="modal-thumb-label">Desktop image</div>
                    </div>
                    <div class="modal-thumb-wrap">
                        <img id="modal-mob-thumb" src="" style="width:44px;height:66px;display:none;"
                            alt="Mobile">
                        <div class="modal-thumb-label" id="modal-mob-name" style="color:#444;"></div>
                        <div class="modal-thumb-label">Mobile image</div>
                    </div>
                </div>

                <form id="edit-modal-form" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="field">
                        <label>Project Title <span class="req">*</span></label>
                        <input type="text" name="title" id="modal-title" class="fi"
                            placeholder="e.g. Vanrock Holdings" required maxlength="150">
                    </div>

                    {{-- Slug --}}
                    <div class="field">
                        <label>Slug <span class="hint">(auto-generated if blank)</span></label>
                        <input type="text" name="slug" id="modal-slug" class="fi"
                            placeholder="e.g. vanrock-holdings" maxlength="160">
                    </div>

                    {{-- Categories --}}
                    <div class="field">
                        <label>Categories <span class="req">*</span> <span
                                class="hint">comma-separated</span></label>
                        <input type="text" name="categories" id="modal-categories" class="fi"
                            placeholder="e.g. Design, Development" required maxlength="255">
                    </div>

                    {{-- Description --}}
                    <div class="field">
                        <label>Description <span class="req">*</span></label>
                        <textarea name="description" id="modal-description" class="fi" required maxlength="2000"
                            placeholder="Short project description shown on the card..."></textarea>
                    </div>

                    {{-- Project URL --}}
                    <div class="field">
                        <label>Project / Case-study URL <span class="hint">(optional)</span></label>
                        <input type="text" name="project_url" id="modal-project-url" class="fi"
                            placeholder="/project/vanrock-holdings" maxlength="255">
                    </div>

                    {{-- Replace images --}}
                    <div class="img-pair">
                        <div class="field" style="margin-bottom:0;">
                            <label>Replace Desktop Image <span class="hint">optional</span></label>
                            <label class="file-upload-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <polyline points="17 8 12 3 7 8" />
                                    <line x1="12" y1="3" x2="12" y2="15" />
                                </svg>
                                <span id="edit-desk-text">PNG, WebP, JPG (4 MB)</span>
                                <span class="file-name" id="edit-desk-name"></span>
                                <input type="file" name="img_desktop"
                                    accept="image/jpeg,image/png,image/webp,image/gif"
                                    onchange="handleFileChange(this,'edit-desk-name','edit-desk-text'); previewModalThumb(this,'modal-desk-thumb')">
                            </label>
                        </div>
                        <div class="field" style="margin-bottom:0;">
                            <label>Replace Mobile Image <span class="hint">optional</span></label>
                            <label class="file-upload-label">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <polyline points="17 8 12 3 7 8" />
                                    <line x1="12" y1="3" x2="12" y2="15" />
                                </svg>
                                <span id="edit-mob-text">PNG, WebP, JPG (4 MB)</span>
                                <span class="file-name" id="edit-mob-name"></span>
                                <input type="file" name="img_mobile"
                                    accept="image/jpeg,image/png,image/webp,image/gif"
                                    onchange="handleFileChange(this,'edit-mob-name','edit-mob-text'); previewModalThumb(this,'modal-mob-thumb')">
                            </label>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="field" style="margin-top:16px;">
                        <label>Status <span class="req">*</span></label>
                        <select name="status" id="modal-status" class="fi fi-select">
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

            // ── Drag-and-drop sort ──────────────────────────────────────
            var list = document.getElementById('sortable-projects');
            if (list) {
                Sortable.create(list, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    onEnd: function() {
                        var ids = Array.from(list.querySelectorAll('.project-row[data-id]'))
                            .map(function(el) {
                                return el.dataset.id;
                            });
                        fetch('{{ route('admin.sections.home.portfolio.sort') }}', {
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
            }

            // ── File name display ───────────────────────────────────────
            window.handleFileChange = function(input, nameId, textId) {
                if (input.files && input.files[0]) {
                    var el = document.getElementById(nameId);
                    var tx = document.getElementById(textId);
                    if (el) el.textContent = input.files[0].name;
                    if (tx) tx.textContent = 'Selected:';
                }
            };

            // ── Live thumb preview in edit modal ────────────────────────
            window.previewModalThumb = function(input, imgId) {
                if (!input.files || !input.files[0]) return;
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById(imgId);
                    if (img) {
                        img.src = e.target.result;
                        img.style.display = '';
                    }
                };
                reader.readAsDataURL(input.files[0]);
            };

            // ── Create modal ────────────────────────────────────────────
            window.openCreateModal = function() {
                document.getElementById('create-modal-backdrop').classList.add('is-open');
            };
            window.closeCreateModal = function() {
                document.getElementById('create-modal-backdrop').classList.remove('is-open');
            };
            document.getElementById('create-modal-backdrop').addEventListener('click', function(e) {
                if (e.target === this) closeCreateModal();
            });

            // ── Edit modal ──────────────────────────────────────────────
            window.openEditModal = function(id, title, slug, categories, description, projectUrl, status, deskUrl,
                mobUrl, deskName, mobName) {
                var form = document.getElementById('edit-modal-form');
                var baseUrl =
                    '{{ rtrim(route('admin.sections.home.portfolio.update', ['portfolioProject' => '__ID__']), '/') }}';
                form.action = baseUrl.replace('__ID__', id);

                document.getElementById('modal-title').value = title;
                document.getElementById('modal-slug').value = slug;
                document.getElementById('modal-categories').value = categories;
                document.getElementById('modal-description').value = description;
                document.getElementById('modal-project-url').value = projectUrl;
                document.getElementById('modal-status').value = status;

                // Desktop thumb
                var deskImg = document.getElementById('modal-desk-thumb');
                if (deskUrl) {
                    deskImg.src = deskUrl;
                    deskImg.style.display = '';
                } else {
                    deskImg.style.display = 'none';
                }
                document.getElementById('modal-desk-name').textContent = deskName || '';

                // Mobile thumb
                var mobImg = document.getElementById('modal-mob-thumb');
                if (mobUrl) {
                    mobImg.src = mobUrl;
                    mobImg.style.display = '';
                } else {
                    mobImg.style.display = 'none';
                }
                document.getElementById('modal-mob-name').textContent = mobName || '';

                // Reset file UI
                document.getElementById('edit-desk-name').textContent = '';
                document.getElementById('edit-desk-text').textContent = 'PNG, WebP, JPG (4 MB)';
                document.getElementById('edit-mob-name').textContent = '';
                document.getElementById('edit-mob-text').textContent = 'PNG, WebP, JPG (4 MB)';

                document.getElementById('edit-modal-backdrop').classList.add('is-open');
            };

            window.closeEditModal = function() {
                document.getElementById('edit-modal-backdrop').classList.remove('is-open');
            };
            document.getElementById('edit-modal-backdrop').addEventListener('click', function(e) {
                if (e.target === this) closeEditModal();
            });

        })();
    </script>
@endpush
