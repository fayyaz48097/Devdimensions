{{--
    SAVE AS: resources/views/pages/admin/footer/index.blade.php
--}}
@extends('admin.admin')

@section('title', 'Footer')
@section('page-title', 'Footer')

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

        /* ── Status banner ── */
        .status-banner {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13px;
            font-weight: 500;
        }

        .status-banner.active {
            background: rgba(74, 222, 128, .06);
            border: 1px solid rgba(74, 222, 128, .15);
            color: #4ADE80;
        }

        .status-banner.inactive {
            background: rgba(251, 191, 36, .06);
            border: 1px solid rgba(251, 191, 36, .15);
            color: #FBBF24;
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

        /* ── Two-col page grid ── */
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

        /* ── Fields ── */
        .field {
            margin-bottom: 18px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #5A5A5A;
            letter-spacing: .6px;
            text-transform: uppercase;
            margin-bottom: 8px;
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

        textarea.fi {
            resize: vertical;
            min-height: 80px;
            line-height: 1.6;
        }

        .fi-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23444' stroke-width='2' stroke-linecap='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 38px;
            cursor: pointer;
        }

        .fi.is-error {
            border-color: rgba(252, 63, 55, .5);
        }

        .field-error {
            font-size: 11.5px;
            color: #FC3F37;
            margin-top: 6px;
        }

        /* ── Image upload widget ── */
        .img-upload-wrap {
            border: 1px dashed rgba(255, 255, 255, .09);
            border-radius: 10px;
            overflow: hidden;
        }

        .img-preview {
            background: #080808;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-preview img {
            max-width: 100%;
            max-height: 140px;
            object-fit: contain;
            display: block;
        }

        .no-img {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            color: #2A2A2A;
            font-size: 12px;
            padding: 18px;
        }

        .img-upload-label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            background: rgba(255, 255, 255, .025);
            border-top: 1px solid rgba(255, 255, 255, .05);
            cursor: pointer;
            transition: background .2s;
            font-size: 12px;
            color: #5A5A5A;
        }

        .img-upload-label:hover {
            background: rgba(252, 63, 55, .06);
            color: #FC3F37;
        }

        .img-upload-label input[type=file] {
            display: none;
        }

        /* ── Buttons ── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 24px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            border: none;
            cursor: pointer;
            background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
            transition: background .2s;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: rgba(181, 30, 23, 1);
        }

        .btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #5A5A5A;
            background: rgba(255, 255, 255, .03);
            border: 1px solid rgba(255, 255, 255, .07);
            cursor: pointer;
            transition: all .2s;
            text-decoration: none;
        }

        .btn-ghost:hover {
            color: #D0D0D0;
            background: rgba(255, 255, 255, .06);
            border-color: rgba(255, 255, 255, .12);
        }

        .btn-danger {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #FC3F37;
            background: rgba(252, 63, 55, .06);
            border: 1px solid rgba(252, 63, 55, .15);
            cursor: pointer;
            transition: all .2s;
        }

        .btn-danger:hover {
            background: rgba(252, 63, 55, .12);
            border-color: rgba(252, 63, 55, .3);
        }

        .btn-success {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #4ADE80;
            background: rgba(74, 222, 128, .06);
            border: 1px solid rgba(74, 222, 128, .15);
            cursor: pointer;
            transition: all .2s;
        }

        .btn-success:hover {
            background: rgba(74, 222, 128, .12);
            border-color: rgba(74, 222, 128, .3);
        }

        /* ── Row list (shared by socials + offices) ── */
        .item-count {
            font-size: 11px;
            font-weight: 600;
            color: #444;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .07);
            padding: 2px 9px;
            border-radius: 20px;
        }

        .item-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .item-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-bottom: 1px solid rgba(255, 255, 255, .04);
            transition: background .15s;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-row:hover {
            background: rgba(255, 255, 255, .018);
        }

        .item-row.is-deleted {
            opacity: .45;
        }

        .item-row.is-deleted .item-label {
            text-decoration: line-through;
            color: #555;
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

        .item-row.sortable-chosen {
            background: rgba(181, 30, 23, .06);
            cursor: grabbing;
        }

        .item-row.sortable-ghost {
            opacity: .3;
        }

        /* ── thumb ── */
        .item-thumb {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .07);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }

        .item-thumb img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        .item-thumb svg {
            color: #2A2A2A;
        }

        /* ── text ── */
        .item-info {
            flex: 1;
            min-width: 0;
        }

        .item-label {
            font-size: 13px;
            font-weight: 600;
            color: #C8C8C8;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-meta {
            font-size: 11.5px;
            color: #333;
            margin-top: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ── pill ── */
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

        /* ── icon action buttons ── */
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

        /* ── empty state ── */
        .empty-state {
            padding: 48px 22px;
            text-align: center;
        }

        .empty-state svg {
            color: #1E1E1E;
            margin-bottom: 14px;
        }

        .empty-state h3 {
            font-size: 15px;
            font-weight: 600;
            color: #333;
            margin: 0 0 6px;
        }

        .empty-state p {
            font-size: 13px;
            color: #2A2A2A;
            margin: 0 0 22px;
        }

        /* ── Flag thumb in office rows ── */
        .flag-thumb {
            width: 36px;
            height: 26px;
            border-radius: 3px;
            object-fit: cover;
            flex-shrink: 0;
        }

        .flag-placeholder {
            width: 36px;
            height: 26px;
            border-radius: 3px;
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .07);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* ── Social icon key badges ── */
        .icon-badge {
            width: 28px;
            height: 28px;
            border-radius: 6px;
            background: rgba(255, 255, 255, .05);
            border: 1px solid rgba(255, 255, 255, .07);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #555;
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
            max-width: 460px;
            max-height: 92vh;
            overflow-y: auto;
            margin: 16px;
        }

        .modal-head {
            padding: 16px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .06);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-title {
            font-size: 14px;
            font-weight: 600;
            color: #D8D8D8;
        }

        .modal-close {
            width: 26px;
            height: 26px;
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
            padding: 20px;
        }

        /* ── divider ── */
        .section-divider {
            height: 1px;
            background: rgba(255, 255, 255, .05);
            margin: 4px 0 20px;
        }

        /* ── tips card body ── */
        .tips-body {
            padding: 14px 18px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 12.5px;
            color: #333;
            line-height: 1.5;
        }

        .tips-body p {
            margin: 0;
        }
    </style>
@endpush

@section('content')
    <div class="sec-wrap">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="sep">›</span>
            <span class="current">Footer</span>
        </div>

        {{-- Page header --}}
        <div class="sec-header">
            <div>
                <h1>Footer</h1>
                <p>Manage logo, tagline, social links, office locations, and copyright.</p>
            </div>
            @if ($setting && !$setting->trashed())
                <div style="display:flex;gap:10px;flex-wrap:wrap;">
                    <form action="{{ route('admin.footer.toggleStatus', $setting) }}" method="POST">
                        @csrf @method('PATCH')
                        @if ($setting->isActive())
                            <button type="submit" class="btn-ghost">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round">
                                    <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                    <line x1="12" y1="2" x2="12" y2="12" />
                                </svg>
                                Set Inactive
                            </button>
                        @else
                            <button type="submit" class="btn-success">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                Set Active
                            </button>
                        @endif
                    </form>
                    <form action="{{ route('admin.footer.settings.destroy', $setting) }}" method="POST"
                        onsubmit="return confirm('Soft-delete the footer? It will be hidden from the site.')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-danger">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round">
                                <polyline points="3 6 5 6 21 6" />
                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                <path d="M10 11v6" />
                                <path d="M14 11v6" />
                                <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            @endif
        </div>

        {{-- Flash messages --}}
        @if (session('success'))
            <div class="flash flash-success">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="flash flash-error">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                Please fix the errors below before saving.
            </div>
        @endif

        {{-- ════════ SOFT-DELETED ════════ --}}
        @if ($setting && $setting->trashed())
            <div class="fc">
                <div class="fc-body">
                    <div class="empty-state">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                        </svg>
                        <h3>Footer Deleted</h3>
                        <p>The footer is soft-deleted and hidden from the public site.</p>
                        <form action="{{ route('admin.footer.settings.restore', $setting->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn-success">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                    <polyline points="1 4 1 10 7 10" />
                                    <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                </svg>
                                Restore Footer
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- ════════ NO RECORD YET ════════ --}}
        @elseif (!$setting)
            <div class="fc" style="margin-bottom:20px;">
                <div class="fc-body">
                    <div class="empty-state" style="padding-bottom:12px;">
                        <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round">
                            <rect x="3" y="3" width="18" height="18" rx="3" />
                            <line x1="12" y1="8" x2="12" y2="16" />
                            <line x1="8" y1="12" x2="16" y2="12" />
                        </svg>
                        <h3>No Footer Record Yet</h3>
                        <p>Create the footer settings to get started.</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('admin.footer.settings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('pages.admin.footer._settings-form', ['setting' => null, 'isNew' => true])
                <div style="display:flex;justify-content:flex-end;margin-top:4px;">
                    <button type="submit" class="btn-primary">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                            <polyline points="17 21 17 13 7 13 7 21" />
                            <polyline points="7 3 7 8 15 8" />
                        </svg>
                        Create Footer
                    </button>
                </div>
            </form>

            {{-- ════════ EXISTING RECORD ════════ --}}
        @else
            <div class="status-banner {{ $setting->status }}">
                @if ($setting->isActive())
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Footer is <strong style="margin-left:3px;">Active</strong> — visible on the public site.
                @else
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                        <line x1="12" y1="2" x2="12" y2="12" />
                    </svg>
                    Footer is <strong style="margin-left:3px;">Inactive</strong> — hidden from the public site.
                @endif
            </div>

            <div class="page-grid">

                {{-- ══════════════════════════════
                 LEFT — settings + office list + social list
            ══════════════════════════════ --}}
                <div>

                    {{-- ── Settings card ── --}}
                    <div class="fc">
                        <div class="fc-head">
                            <div class="fc-head-left">
                                <div class="fc-head-icon">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="#FC3F37" stroke-width="2" stroke-linecap="round">
                                        <circle cx="12" cy="12" r="3" />
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="fc-title">General Settings</div>
                                    <div class="fc-subtitle">Logo, tagline, copyright</div>
                                </div>
                            </div>
                        </div>
                        <div class="fc-body">
                            <form action="{{ route('admin.footer.settings.update', $setting) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @include('pages.admin.footer._settings-form', [
                                    'setting' => $setting,
                                    'isNew' => false,
                                ])
                                <div style="display:flex;justify-content:flex-end;margin-top:20px;">
                                    <button type="submit" class="btn-primary">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                            <polyline points="17 21 17 13 7 13 7 21" />
                                            <polyline points="7 3 7 8 15 8" />
                                        </svg>
                                        Save Settings
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- ── Offices list card ── --}}
                    <div class="fc">
                        <div class="fc-head">
                            <div class="fc-head-left">
                                <div class="fc-head-icon">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="#FC3F37" stroke-width="2" stroke-linecap="round">
                                        <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="fc-title">Office Locations</div>
                                    <div class="fc-subtitle">Drag to reorder</div>
                                </div>
                            </div>
                            <span class="item-count">{{ $offices->whereNull('deleted_at')->count() }}</span>
                        </div>

                        @if ($offices->isEmpty())
                            <div style="padding:28px 20px;text-align:center;color:#2A2A2A;font-size:13px;">No offices yet —
                                add one using the form →</div>
                        @else
                            <ul class="item-list" id="sortable-offices">
                                @foreach ($offices as $office)
                                    <li class="item-row {{ $office->trashed() ? 'is-deleted' : '' }}"
                                        data-id="{{ $office->id }}">

                                        @if (!$office->trashed())
                                            <span class="drag-handle" title="Drag to reorder">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
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
                                            <span style="width:13px;flex-shrink:0;"></span>
                                        @endif

                                        {{-- Flag --}}
                                        @if ($office->flagUrl())
                                            <img src="{{ $office->flagUrl() }}" alt="{{ $office->country }}"
                                                class="flag-thumb">
                                        @else
                                            <div class="flag-placeholder">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                                    stroke="#333" stroke-width="2" stroke-linecap="round">
                                                    <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z" />
                                                    <line x1="4" y1="22" x2="4" y2="15" />
                                                </svg>
                                            </div>
                                        @endif

                                        <div class="item-info">
                                            <div class="item-label">{{ $office->country }}</div>
                                            <div class="item-meta">{{ $office->address }}</div>
                                        </div>

                                        @if ($office->trashed())
                                            <span class="pill pill-deleted">Deleted</span>
                                        @else
                                            <span
                                                class="pill pill-{{ $office->status }}">{{ ucfirst($office->status) }}</span>
                                        @endif

                                        <div class="item-actions">
                                            @if ($office->trashed())
                                                <form action="{{ route('admin.footer.offices.restore', $office->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="icon-btn btn-restore" title="Restore">
                                                        <svg width="12" height="12" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round">
                                                            <polyline points="1 4 1 10 7 10" />
                                                            <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.footer.offices.toggleStatus', $office) }}"
                                                    method="POST">
                                                    @csrf @method('PATCH')
                                                    @if ($office->isActive())
                                                        <button type="submit" class="icon-btn btn-toggle-on"
                                                            title="Set Inactive"><svg width="12" height="12"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round">
                                                                <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                                                <line x1="12" y1="2" x2="12"
                                                                    y2="12" />
                                                            </svg></button>
                                                    @else
                                                        <button type="submit" class="icon-btn btn-toggle-off"
                                                            title="Set Active"><svg width="12" height="12"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round">
                                                                <polyline points="20 6 9 17 4 12" />
                                                            </svg></button>
                                                    @endif
                                                </form>
                                                <button type="button" class="icon-btn btn-edit" title="Edit"
                                                    onclick="openOfficeModal({{ $office->id }}, '{{ addslashes($office->country) }}', '{{ addslashes($office->address ?? '') }}', '{{ addslashes($office->phone ?? '') }}', '{{ addslashes($office->email ?? '') }}', '{{ addslashes($office->address_url ?? '#') }}', '{{ $office->status }}', {{ $office->flagUrl() ? "'" . addslashes($office->flagUrl()) . "'" : 'null' }})">
                                                    <svg width="12" height="12" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                    </svg>
                                                </button>
                                                <form action="{{ route('admin.footer.offices.destroy', $office) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Delete {{ addslashes($office->country) }} office?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="icon-btn btn-delete"
                                                        title="Delete"><svg width="12" height="12"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round">
                                                            <polyline points="3 6 5 6 21 6" />
                                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                                            <path d="M10 11v6" />
                                                            <path d="M14 11v6" />
                                                        </svg></button>
                                                </form>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    {{-- ── Social links list card ── --}}
                    <div class="fc">
                        <div class="fc-head">
                            <div class="fc-head-left">
                                <div class="fc-head-icon">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="#FC3F37" stroke-width="2" stroke-linecap="round">
                                        <circle cx="18" cy="5" r="3" />
                                        <circle cx="6" cy="12" r="3" />
                                        <circle cx="18" cy="19" r="3" />
                                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49" />
                                        <line x1="15.41" y1="6.51" x2="8.59" y2="10.49" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="fc-title">Social Links</div>
                                    <div class="fc-subtitle">Drag to reorder</div>
                                </div>
                            </div>
                            <span class="item-count">{{ $socials->whereNull('deleted_at')->count() }}</span>
                        </div>

                        @if ($socials->isEmpty())
                            <div style="padding:28px 20px;text-align:center;color:#2A2A2A;font-size:13px;">No social links
                                yet — add one →</div>
                        @else
                            <ul class="item-list" id="sortable-socials">
                                @foreach ($socials as $social)
                                    <li class="item-row {{ $social->trashed() ? 'is-deleted' : '' }}"
                                        data-id="{{ $social->id }}">

                                        @if (!$social->trashed())
                                            <span class="drag-handle" title="Drag to reorder">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
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
                                            <span style="width:13px;flex-shrink:0;"></span>
                                        @endif

                                        <div class="icon-badge">@include('pages.admin.footer._social-icon', [
                                            'key' => $social->icon_key,
                                        ])</div>

                                        <div class="item-info">
                                            <div class="item-label">{{ $social->platform }}</div>
                                            <div class="item-meta">{{ $social->url }}</div>
                                        </div>

                                        @if ($social->trashed())
                                            <span class="pill pill-deleted">Deleted</span>
                                        @else
                                            <span
                                                class="pill pill-{{ $social->status }}">{{ ucfirst($social->status) }}</span>
                                        @endif

                                        <div class="item-actions">
                                            @if ($social->trashed())
                                                <form action="{{ route('admin.footer.socials.restore', $social->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="icon-btn btn-restore"
                                                        title="Restore"><svg width="12" height="12"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round">
                                                            <polyline points="1 4 1 10 7 10" />
                                                            <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                                        </svg></button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.footer.socials.toggleStatus', $social) }}"
                                                    method="POST">
                                                    @csrf @method('PATCH')
                                                    @if ($social->isActive())
                                                        <button type="submit" class="icon-btn btn-toggle-on"
                                                            title="Set Inactive"><svg width="12" height="12"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round">
                                                                <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                                                <line x1="12" y1="2" x2="12"
                                                                    y2="12" />
                                                            </svg></button>
                                                    @else
                                                        <button type="submit" class="icon-btn btn-toggle-off"
                                                            title="Set Active"><svg width="12" height="12"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round">
                                                                <polyline points="20 6 9 17 4 12" />
                                                            </svg></button>
                                                    @endif
                                                </form>
                                                <button type="button" class="icon-btn btn-edit" title="Edit"
                                                    onclick="openSocialModal({{ $social->id }}, '{{ addslashes($social->platform) }}', '{{ addslashes($social->url) }}', '{{ $social->icon_key }}', '{{ $social->status }}')">
                                                    <svg width="12" height="12" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                    </svg>
                                                </button>
                                                <form action="{{ route('admin.footer.socials.destroy', $social) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Delete {{ addslashes($social->platform) }}?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="icon-btn btn-delete"
                                                        title="Delete"><svg width="12" height="12"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round">
                                                            <polyline points="3 6 5 6 21 6" />
                                                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                                            <path d="M10 11v6" />
                                                            <path d="M14 11v6" />
                                                        </svg></button>
                                                </form>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>{{-- /left --}}

                {{-- ══════════════════════════════
                 RIGHT — Add forms + tips
            ══════════════════════════════ --}}
                <div>

                    {{-- Add Office --}}
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
                                <div class="fc-title">Add Office</div>
                            </div>
                        </div>
                        <div class="fc-body">
                            <form action="{{ route('admin.footer.offices.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @include('pages.admin.footer._office-form', ['office' => null])
                                <button type="submit" class="btn-primary"
                                    style="width:100%;justify-content:center;margin-top:16px;">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add Office
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Add Social Link --}}
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
                                <div class="fc-title">Add Social Link</div>
                            </div>
                        </div>
                        <div class="fc-body">
                            <form action="{{ route('admin.footer.socials.store') }}" method="POST">
                                @csrf
                                @include('pages.admin.footer._social-form', ['social' => null])
                                <button type="submit" class="btn-primary"
                                    style="width:100%;justify-content:center;margin-top:16px;">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add Social
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Tips --}}
                    <div class="fc">
                        <div class="fc-head">
                            <div class="fc-title" style="color:#3A3A3A;">Tips</div>
                        </div>
                        <div class="tips-body">
                            <p>• Use <code style="color:#555;font-size:11px;">{year}</code> in copyright text to
                                auto-insert the current year.</p>
                            <p>• <strong style="color:#555;">Logo</strong> left blank uses the default SVG from <code
                                    style="color:#555;font-size:11px;">assets/images/logo.svg</code>.</p>
                            <p>• <strong style="color:#555;">Flags</strong> left blank fall back to the original static
                                asset flag images.</p>
                            <p>• <strong style="color:#555;">Drag</strong> offices and social links to control display
                                order.</p>
                            <p>• Deleted items can always be <strong style="color:#555;">restored</strong> from the list.
                            </p>
                        </div>
                    </div>

                </div>{{-- /right --}}
            </div>{{-- /page-grid --}}

        @endif

    </div>

    {{-- ═══════════ EDIT OFFICE MODAL ═══════════ --}}
    <div class="modal-backdrop" id="office-modal-backdrop">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title">Edit Office</span>
                <button type="button" class="modal-close" onclick="closeModal('office-modal-backdrop')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div id="office-flag-preview" style="margin-bottom:14px;display:none;">
                    <img id="office-flag-img" src="" style="height:28px;border-radius:3px;" alt="">
                </div>
                <form id="office-modal-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('pages.admin.footer._office-form', ['office' => null, 'isModal' => true])
                    <div style="margin-top:18px;">
                        <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
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

    {{-- ═══════════ EDIT SOCIAL MODAL ═══════════ --}}
    <div class="modal-backdrop" id="social-modal-backdrop">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title">Edit Social Link</span>
                <button type="button" class="modal-close" onclick="closeModal('social-modal-backdrop')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="social-modal-form" method="POST">
                    @csrf
                    @include('pages.admin.footer._social-form', ['social' => null, 'isModal' => true])
                    <div style="margin-top:18px;">
                        <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
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
            var csrf = '{{ csrf_token() }}';

            // ── Drag-drop offices ──
            var offList = document.getElementById('sortable-offices');
            if (offList) {
                Sortable.create(offList, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    onEnd: function() {
                        var ids = Array.from(offList.querySelectorAll('.item-row[data-id]')).map(function(
                            el) {
                            return el.dataset.id;
                        });
                        fetch('{{ route('admin.footer.offices.sort') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrf
                            },
                            body: JSON.stringify({
                                items: ids
                            }),
                        });
                    },
                });
            }

            // ── Drag-drop socials ──
            var socList = document.getElementById('sortable-socials');
            if (socList) {
                Sortable.create(socList, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    onEnd: function() {
                        var ids = Array.from(socList.querySelectorAll('.item-row[data-id]')).map(function(
                            el) {
                            return el.dataset.id;
                        });
                        fetch('{{ route('admin.footer.socials.sort') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrf
                            },
                            body: JSON.stringify({
                                items: ids
                            }),
                        });
                    },
                });
            }

            // ── Modal helpers ──
            window.closeModal = function(id) {
                document.getElementById(id).classList.remove('is-open');
            };
            document.querySelectorAll('.modal-backdrop').forEach(function(el) {
                el.addEventListener('click', function(e) {
                    if (e.target === el) el.classList.remove('is-open');
                });
            });

            // ── Office modal ──
            window.openOfficeModal = function(id, country, address, phone, email, addressUrl, status, flagUrl) {
                var f = document.getElementById('office-modal-form');
                f.action = '/admin/footer/offices/' + id;
                f.querySelector('[name="country"]').value = country;
                f.querySelector('[name="address"]').value = address;
                f.querySelector('[name="phone"]').value = phone;
                f.querySelector('[name="email"]').value = email;
                f.querySelector('[name="address_url"]').value = addressUrl;
                f.querySelector('[name="status"]').value = status;

                var preview = document.getElementById('office-flag-preview');
                var img = document.getElementById('office-flag-img');
                if (flagUrl) {
                    img.src = flagUrl;
                    preview.style.display = '';
                } else {
                    preview.style.display = 'none';
                }

                document.getElementById('office-modal-backdrop').classList.add('is-open');
            };

            // ── Social modal ──
            window.openSocialModal = function(id, platform, url, iconKey, status) {
                var f = document.getElementById('social-modal-form');
                f.action = '/admin/footer/socials/' + id;
                f.querySelector('[name="platform"]').value = platform;
                f.querySelector('[name="url"]').value = url;
                f.querySelector('[name="icon_key"]').value = iconKey;
                f.querySelector('[name="status"]').value = status;
                document.getElementById('social-modal-backdrop').classList.add('is-open');
            };

            // ── Logo preview ──
            window.previewLogo = function(input) {
                if (!input.files || !input.files[0]) return;
                var r = new FileReader();
                r.onload = function(e) {
                    var el = document.getElementById('logo-preview-img');
                    if (!el) return;
                    if (el.tagName === 'DIV') {
                        var img = document.createElement('img');
                        img.id = 'logo-preview-img';
                        img.src = e.target.result;
                        img.style.cssText = 'max-width:100%;max-height:100px;object-fit:contain;display:block;';
                        el.parentNode.replaceChild(img, el);
                    } else {
                        el.src = e.target.result;
                    }
                };
                r.readAsDataURL(input.files[0]);
            };
        })();
    </script>
@endpush
