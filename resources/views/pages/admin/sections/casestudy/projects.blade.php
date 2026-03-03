{{--
    SAVE AS: resources/views/pages/admin/sections/casestudy/projects.blade.php
--}}

@extends('admin.admin')
@section('title', 'Case Studies › Projects')
@section('page-title', 'Projects')

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
            grid-template-columns: 1fr 360px;
            gap: 20px;
            align-items: start;
        }

        @media(max-width:1200px) {
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
            box-sizing: border-box;
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
            padding: 14px 16px;
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
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: rgba(181, 30, 23, .1);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .img-upload-text {
            font-size: 12px;
            color: #4A4A4A;
            line-height: 1.5;
        }

        .img-upload-text strong {
            color: #888;
            font-size: 12.5px;
        }

        .img-current {
            margin-top: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .img-current img {
            max-height: 44px;
            max-width: 100px;
            object-fit: contain;
            border-radius: 5px;
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

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 18px;
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 9px;
            font-size: 13px;
            font-weight: 600;
            color: #888;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, .09);
            color: #ccc;
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
        }

        .btn-restore:hover {
            background: rgba(74, 222, 128, .14);
        }

        /* project list table */
        .proj-table {
            width: 100%;
            border-collapse: collapse;
        }

        .proj-table thead th {
            font-size: 11px;
            font-weight: 600;
            color: #333;
            text-transform: uppercase;
            letter-spacing: .5px;
            padding: 10px 14px;
            border-bottom: 1px solid rgba(255, 255, 255, .05);
            text-align: left;
        }

        .proj-table tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, .04);
            transition: background .15s;
        }

        .proj-table tbody tr:last-child {
            border-bottom: none;
        }

        .proj-table tbody tr:hover {
            background: rgba(255, 255, 255, .02);
        }

        .proj-table td {
            padding: 12px 14px;
            font-size: 13px;
            color: #888;
            vertical-align: middle;
        }

        .proj-table td.title-col {
            color: #C8C8C8;
            font-weight: 500;
        }

        .proj-thumb {
            width: 52px;
            height: 38px;
            object-fit: cover;
            object-position: top;
            border-radius: 5px;
        }

        .proj-thumb-placeholder {
            width: 52px;
            height: 38px;
            background: #111;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cat-badge {
            display: inline-flex;
            align-items: center;
            height: 20px;
            padding: 0 8px;
            font-size: 10.5px;
            font-weight: 500;
            border-radius: 4px;
            background: rgba(255, 212, 60, .12);
            color: rgba(255, 212, 60, .8);
            margin-right: 3px;
            margin-bottom: 2px;
            white-space: nowrap;
        }

        .status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .status-dot.active {
            background: #4ADE80;
        }

        .status-dot.inactive {
            background: #555;
        }

        .status-dot.deleted {
            background: #FC3F37;
        }

        .drag-handle {
            cursor: grab;
            color: #2A2A2A;
            padding: 4px 6px;
        }

        .drag-handle:hover {
            color: #555;
        }

        .sortable-ghost {
            opacity: .4;
            background: rgba(252, 63, 55, .08) !important;
        }

        /* Edit modal */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .75);
            z-index: 900;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 16px;
            width: 100%;
            max-width: 680px;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-head {
            padding: 18px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-head h3 {
            font-size: 15px;
            font-weight: 700;
            color: #E0E0E0;
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            color: #555;
            cursor: pointer;
            padding: 4px;
            border-radius: 6px;
            transition: color .2s;
        }

        .modal-close:hover {
            color: #FC3F37;
        }

        .modal-body {
            padding: 22px;
        }

        .modal-footer {
            padding: 16px 22px;
            border-top: 1px solid rgba(255, 255, 255, .06);
            display: flex;
            gap: 10px;
            align-items: center;
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
            <span class="current">Projects</span>
        </nav>

        {{-- Page header --}}
        <div class="sec-header">
            <div>
                <h1>Case Study Projects</h1>
                <p>Add, edit, reorder and manage all projects shown on the Case Studies page.</p>
            </div>
            <button class="btn-primary" onclick="openAddModal()">
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

        {{-- Projects table --}}
        <div class="fc">
            <div class="fc-head">
                <div class="fc-head-left">
                    <div class="fc-head-icon">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                            stroke-width="2" stroke-linecap="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" />
                            <line x1="8" y1="21" x2="16" y2="21" />
                            <line x1="12" y1="17" x2="12" y2="21" />
                        </svg>
                    </div>
                    <div>
                        <div class="fc-title">All Projects</div>
                        <div class="fc-subtitle">Drag rows to reorder · click Edit to modify</div>
                    </div>
                </div>
                <span style="font-size:12px; color:#2A2A2A;">{{ $projects->whereNull('deleted_at')->count() }} active</span>
            </div>

            @if ($projects->isEmpty())
                <div class="fc-body" style="text-align:center; padding:40px 20px; color:#2A2A2A; font-size:13px;">
                    No projects yet. Click <strong style="color:#555;">Add Project</strong> above to create the first one.
                </div>
            @else
                <div style="overflow-x:auto;">
                    <table class="proj-table">
                        <thead>
                            <tr>
                                <th style="width:32px;"></th>
                                <th style="width:60px;">Image</th>
                                <th>Title</th>
                                <th>Categories</th>
                                <th>Status</th>
                                <th style="width:130px; text-align:right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-projects">
                            @foreach ($projects as $project)
                                <tr data-id="{{ $project->id }}" class="{{ $project->trashed() ? 'opacity-50' : '' }}">
                                    <td>
                                        @if (!$project->trashed())
                                            <span class="drag-handle" title="Drag to reorder">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                    <line x1="9" y1="6" x2="15" y2="6" />
                                                    <line x1="9" y1="12" x2="15" y2="12" />
                                                    <line x1="9" y1="18" x2="15" y2="18" />
                                                </svg>
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($project->imageUrl())
                                            <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}"
                                                class="proj-thumb">
                                        @else
                                            <div class="proj-thumb-placeholder">
                                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                    stroke="#333" stroke-width="1.5">
                                                    <rect x="3" y="3" width="18" height="18" rx="2" />
                                                    <circle cx="8.5" cy="8.5" r="1.5" />
                                                    <polyline points="21 15 16 10 5 21" />
                                                </svg>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="title-col">
                                        {{ $project->title }}
                                        <div style="font-size:11px; color:#2A2A2A; margin-top:2px;">
                                            /project/{{ $project->slug }}</div>
                                    </td>
                                    <td>
                                        @foreach ($project->categories as $cat)
                                            <span class="cat-badge">{{ $cat }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($project->trashed())
                                            <span class="status-dot deleted"></span><span
                                                style="color:#FC3F37; font-size:12px;">Deleted</span>
                                        @elseif ($project->isActive())
                                            <span class="status-dot active"></span><span
                                                style="color:#4ADE80; font-size:12px;">Active</span>
                                        @else
                                            <span class="status-dot inactive"></span><span
                                                style="color:#555; font-size:12px;">Inactive</span>
                                        @endif
                                    </td>
                                    <td style="text-align:right;">
                                        <div style="display:flex; gap:6px; justify-content:flex-end; align-items:center;">
                                            @if ($project->trashed())
                                                <form
                                                    action="{{ route('admin.sections.casestudy.projects.restore', $project->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="icon-btn btn-restore"
                                                        style="width:32px; height:32px;" title="Restore">
                                                        <svg width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2.5"
                                                            stroke-linecap="round">
                                                            <polyline points="1 4 1 10 7 10" />
                                                            <path d="M3.51 15a9 9 0 1 0 .49-4.5" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                {{-- Toggle status --}}
                                                <form
                                                    action="{{ route('admin.sections.casestudy.projects.toggleStatus', $project) }}"
                                                    method="POST">
                                                    @csrf @method('PATCH')
                                                    <button type="submit" class="icon-btn"
                                                        title="{{ $project->isActive() ? 'Set Inactive' : 'Set Active' }}"
                                                        style="width:32px; height:32px;
                                                            {{ $project->isActive()
                                                                ? 'background:rgba(255,255,255,.05); color:#555; border:1px solid rgba(255,255,255,.08);'
                                                                : 'background:rgba(74,222,128,.08); color:#4ADE80; border:1px solid rgba(74,222,128,.2);' }}">
                                                        @if ($project->isActive())
                                                            <svg width="13" height="13" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2.5"
                                                                stroke-linecap="round">
                                                                <path d="M18.36 6.64A9 9 0 0 1 20.77 15" />
                                                                <path d="M6.16 6.16a9 9 0 1 0 12.68 12.68" />
                                                                <line x1="2" y1="2" x2="22"
                                                                    y2="22" />
                                                            </svg>
                                                        @else
                                                            <svg width="13" height="13" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2.5"
                                                                stroke-linecap="round">
                                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                                                <circle cx="12" cy="12" r="3" />
                                                            </svg>
                                                        @endif
                                                    </button>
                                                </form>

                                                {{-- Edit --}}
                                                <button class="btn-secondary" style="padding:5px 12px; font-size:12px;"
                                                    onclick="openEditModal({{ $project->id }})">
                                                    Edit
                                                </button>

                                                {{-- Delete --}}
                                                <form
                                                    action="{{ route('admin.sections.casestudy.projects.destroy', $project) }}"
                                                    method="POST" onsubmit="return confirm('Soft-delete this project?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="icon-btn btn-delete"
                                                        style="width:32px; height:32px;" title="Delete">
                                                        <svg width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round">
                                                            <polyline points="3 6 5 6 21 6" />
                                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div>

    {{-- ══════════════════════════════════════════
         ADD MODAL
    ══════════════════════════════════════════ --}}
    <div id="modal-add" class="modal-backdrop" style="display:none;">
        <div class="modal">
            <div class="modal-head">
                <h3>Add New Project</h3>
                <button class="modal-close" onclick="closeModal('modal-add')">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.sections.casestudy.projects.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @include('pages.admin.sections.casestudy._project-form', ['project' => null])
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-primary">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                            <polyline points="17 21 17 13 7 13 7 21" />
                            <polyline points="7 3 7 8 15 8" />
                        </svg>
                        Save Project
                    </button>
                    <button type="button" class="btn-secondary" onclick="closeModal('modal-add')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ══════════════════════════════════════════
         EDIT MODALS (one per project)
    ══════════════════════════════════════════ --}}
    @foreach ($projects->whereNull('deleted_at') as $project)
        <div id="modal-edit-{{ $project->id }}" class="modal-backdrop" style="display:none;">
            <div class="modal">
                <div class="modal-head">
                    <h3>Edit: {{ $project->title }}</h3>
                    <button class="modal-close" onclick="closeModal('modal-edit-{{ $project->id }}')">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <line x1="18" y1="6" x2="6" y2="18" />
                            <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.sections.casestudy.projects.update', $project) }}"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-body">
                        @include('pages.admin.sections.casestudy._project-form', ['project' => $project])
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn-primary">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            </svg>
                            Save Changes
                        </button>
                        <button type="button" class="btn-secondary"
                            onclick="closeModal('modal-edit-{{ $project->id }}')">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection

@push('scripts')
    {{-- SortableJS via CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>
    <script>
        (function() {

            // ── Drag-to-reorder ─────────────────────────────────────────────
            var list = document.getElementById('sortable-projects');
            if (list) {
                Sortable.create(list, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    onEnd: function() {
                        var order = Array.from(list.querySelectorAll('tr[data-id]'))
                            .map(function(tr) {
                                return tr.dataset.id;
                            });

                        fetch('{{ route('admin.sections.casestudy.projects.sort') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                order: order
                            })
                        });
                    }
                });
            }

            // ── Modal helpers ────────────────────────────────────────────────
            window.openAddModal = function() {
                document.getElementById('modal-add').style.display = 'flex';
                document.body.style.overflow = 'hidden';
            };

            window.openEditModal = function(id) {
                document.getElementById('modal-edit-' + id).style.display = 'flex';
                document.body.style.overflow = 'hidden';
            };

            window.closeModal = function(id) {
                document.getElementById(id).style.display = 'none';
                document.body.style.overflow = '';
            };

            // Close modal on backdrop click
            document.querySelectorAll('.modal-backdrop').forEach(function(backdrop) {
                backdrop.addEventListener('click', function(e) {
                    if (e.target === backdrop) {
                        backdrop.style.display = 'none';
                        document.body.style.overflow = '';
                    }
                });
            });

            // ── Image preview ────────────────────────────────────────────────
            window.handleProjectImageChange = function(input, previewId, labelId, nameId) {
                if (!input.files || !input.files[0]) return;
                var file = input.files[0];
                if (nameId) document.getElementById(nameId).textContent = file.name;
                if (labelId) document.getElementById(labelId).textContent = 'Selected:';
                var reader = new FileReader();
                reader.onload = function(e) {
                    var wrap = document.getElementById(previewId);
                    if (!wrap) return;
                    wrap.innerHTML = '';
                    var img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.cssText =
                        'max-height:44px; max-width:100px; object-fit:contain; border-radius:5px;';
                    wrap.appendChild(img);
                };
                reader.readAsDataURL(file);
            };

            // ── Open edit modal if validation errors exist for a project ─────
            // (When form is submitted with errors, re-open the modal for that project)
            @if ($errors->any() && old('_project_id'))
                window.addEventListener('DOMContentLoaded', function() {
                    var pid = '{{ old('_project_id') }}';
                    var modal = document.getElementById('modal-edit-' + pid) || document.getElementById(
                        'modal-add');
                    if (modal) {
                        modal.style.display = 'flex';
                        document.body.style.overflow = 'hidden';
                    }
                });
            @endif

            window.handleToolsChange = function(input, pid) {
                var files = Array.from(input.files);
                var label = document.getElementById('tools_label_' + pid);
                var name = document.getElementById('tools_name_' + pid);
                var preview = document.getElementById('tools_preview_' + pid);

                if (label) label.textContent = files.length + ' file' + (files.length > 1 ? 's' : '') + ' selected';
                if (name) name.textContent = files.map(function(f) {
                    return f.name;
                }).join(', ');

                if (preview) {
                    preview.innerHTML = '';
                    files.forEach(function(file) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.cssText =
                                'height:32px; width:auto; object-fit:contain; background:#111; border-radius:5px; padding:4px 6px; border:1px solid rgba(255,255,255,.1);';
                            preview.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    });
                }
            };

        })();
    </script>
@endpush
