{{--
    SAVE AS: resources/views/pages/admin/sections/about/whatwe.blade.php
--}}
@extends('admin.admin')

@section('title', 'About › What We Do')
@section('page-title', 'What We Do Section')

@push('styles')
    <style>
        /* ── Page shell ── */
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
            transition: color 0.2s;
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
            letter-spacing: -0.4px;
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
            background: rgba(74, 222, 128, 0.06);
            border: 1px solid rgba(74, 222, 128, 0.15);
            color: #4ADE80;
        }

        .status-banner.inactive {
            background: rgba(251, 191, 36, 0.06);
            border: 1px solid rgba(251, 191, 36, 0.15);
            color: #FBBF24;
        }

        .status-banner.deleted {
            background: rgba(252, 63, 55, 0.06);
            border: 1px solid rgba(252, 63, 55, 0.15);
            color: #FC3F37;
        }

        /* ── Two-col form grid ── */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 20px;
            align-items: start;
        }

        @media(max-width:1080px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ── Card ── */
        .fc {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 14px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .fc-head {
            padding: 15px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .fc-head-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: rgba(181, 30, 23, 0.12);
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
            padding: 22px;
        }

        /* ── Form fields ── */
        .field {
            margin-bottom: 20px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #5A5A5A;
            letter-spacing: 0.6px;
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
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13.5px;
            color: #D8D8D8;
            outline: none;
            transition: border-color 0.2s;
            box-sizing: border-box;
            font-family: inherit;
        }

        .fi:focus {
            border-color: rgba(252, 63, 55, 0.4);
        }

        .fi::placeholder {
            color: #2A2A2A;
        }

        textarea.fi {
            resize: vertical;
            min-height: 100px;
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
            border-color: rgba(252, 63, 55, 0.5);
        }

        .field-error {
            font-size: 11.5px;
            color: #FC3F37;
            margin-top: 6px;
        }

        /* ── Image upload ── */
        .img-upload-wrap {
            border: 1px dashed rgba(255, 255, 255, 0.09);
            border-radius: 10px;
            overflow: hidden;
        }

        .img-preview {
            position: relative;
            background: #080808;
            min-height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .img-preview img {
            max-width: 100%;
            max-height: 160px;
            object-fit: contain;
            display: block;
        }

        .img-preview .no-img {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            color: #2A2A2A;
            font-size: 12px;
            padding: 24px;
        }

        .img-upload-label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            background: rgba(255, 255, 255, 0.025);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            cursor: pointer;
            transition: background 0.2s;
            font-size: 12.5px;
            color: #5A5A5A;
        }

        .img-upload-label:hover {
            background: rgba(252, 63, 55, 0.06);
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
            transition: background 0.2s;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: rgba(181, 30, 23, 1);
            color: #fff;
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
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-ghost:hover {
            color: #D0D0D0;
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.12);
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
            background: rgba(252, 63, 55, 0.06);
            border: 1px solid rgba(252, 63, 55, 0.15);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-danger:hover {
            background: rgba(252, 63, 55, 0.12);
            border-color: rgba(252, 63, 55, 0.3);
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
            background: rgba(74, 222, 128, 0.06);
            border: 1px solid rgba(74, 222, 128, 0.15);
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-success:hover {
            background: rgba(74, 222, 128, 0.12);
            border-color: rgba(74, 222, 128, 0.3);
        }

        /* ── Flash alerts ── */
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
            background: rgba(74, 222, 128, 0.07);
            border: 1px solid rgba(74, 222, 128, 0.18);
            color: #4ADE80;
        }

        .flash-error {
            background: rgba(252, 63, 55, 0.07);
            border: 1px solid rgba(252, 63, 55, 0.18);
            color: #FC3F37;
        }

        /* ── Empty / deleted state ── */
        .empty-state {
            padding: 50px 22px;
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
    </style>
@endpush

@section('content')
    <div class="sec-wrap">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="sep">›</span>
            <span>Pages</span>
            <span class="sep">›</span>
            <span>About</span>
            <span class="sep">›</span>
            <span class="current">What We Do</span>
        </div>

        {{-- Page header + actions --}}
        <div class="sec-header">
            <div>
                <h1>What We Do (Mission & Vision)</h1>
                <p>Manage the Mission and Vision blocks on the About Us page.</p>
            </div>

            @if ($section && !$section->trashed())
                <div style="display:flex; gap:10px; flex-wrap:wrap;">

                    {{-- Toggle Status --}}
                    <form action="{{ route('admin.sections.about.whatwe.toggleStatus', $section) }}" method="POST">
                        @csrf @method('PATCH')
                        @if ($section->isActive())
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

                    {{-- Soft Delete --}}
                    <form action="{{ route('admin.sections.about.whatwe.destroy', $section) }}" method="POST"
                        onsubmit="return confirm('Soft-delete this section? It will be hidden from the site.')">
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

        {{-- ── SOFT-DELETED STATE ── --}}
        @if ($section && $section->trashed())
            <div class="fc">
                <div class="fc-body">
                    <div class="empty-state">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round">
                            <polyline points="3 6 5 6 21 6" />
                            <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                        </svg>
                        <h3>Section Deleted</h3>
                        <p>This section has been soft-deleted and is hidden from the public site.</p>
                        <form action="{{ route('admin.sections.about.whatwe.restore', $section->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn-success">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                    <polyline points="1 4 1 10 7 10" />
                                    <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                </svg>
                                Restore Section
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- ── NO RECORD YET ── --}}
        @elseif (!$section)
            <div class="fc" style="margin-bottom:20px;">
                <div class="fc-body">
                    <div class="empty-state" style="padding-bottom:10px;">
                        <svg width="38" height="38" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round">
                            <rect x="3" y="3" width="18" height="18" rx="3" />
                            <line x1="12" y1="8" x2="12" y2="16" />
                            <line x1="8" y1="12" x2="16" y2="12" />
                        </svg>
                        <h3>No Content Created Yet</h3>
                        <p>Fill in the form below to create the Mission & Vision section.</p>
                    </div>
                </div>
            </div>

            @include('pages.admin.sections.about._whatwe-form', ['section' => null, 'isNew' => true])

            {{-- ── EXISTING RECORD ── --}}
        @else
            <div class="status-banner {{ $section->status }}">
                @if ($section->isActive())
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    This section is <strong style="margin-left:3px;">Active</strong> — visible on the public site.
                @else
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                        <line x1="12" y1="2" x2="12" y2="12" />
                    </svg>
                    This section is <strong style="margin-left:3px;">Inactive</strong> — hidden from the public site.
                @endif
            </div>

            @include('pages.admin.sections.about._whatwe-form', ['section' => $section, 'isNew' => false])
        @endif

    </div>
@endsection
