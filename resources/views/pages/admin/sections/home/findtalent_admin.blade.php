{{--
    SAVE AS: resources/views/pages/admin/sections/home/findtalent.blade.php
--}}
@extends('admin.admin')

@section('title', 'Home › Find Talent Section')
@section('page-title', 'Find Talent Section')

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

        .step-count {
            font-size: 11px;
            font-weight: 600;
            color: #444;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .07);
            padding: 2px 9px;
            border-radius: 20px;
        }

        /* ── Step list ── */
        .step-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .step-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 13px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, .04);
            transition: background .15s;
        }

        .step-row:last-child {
            border-bottom: none;
        }

        .step-row:hover {
            background: rgba(255, 255, 255, .018);
        }

        .step-row.is-deleted {
            opacity: .45;
        }

        .step-row.is-deleted .step-title-text {
            text-decoration: line-through;
            color: #555;
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

        .step-row.sortable-chosen {
            background: rgba(181, 30, 23, .06);
            cursor: grabbing;
        }

        .step-row.sortable-ghost {
            opacity: .3;
        }

        /* Step number badge */
        .step-num {
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

        /* Icon thumb */
        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 9px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .07);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .step-icon img {
            width: 22px;
            height: 22px;
            object-fit: contain;
        }

        .step-icon .no-icon {
            color: #252525;
        }

        /* Text block */
        .step-info {
            flex: 1;
            min-width: 0;
        }

        .step-title-text {
            font-size: 13px;
            font-weight: 600;
            color: #C8C8C8;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .step-title-text strong {
            color: #FC3F37;
        }

        .step-tooltip-text {
            font-size: 11.5px;
            color: #333;
            margin-top: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 320px;
        }

        /* Pills */
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
            max-width: 140px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Inline radio toggle (Bold First / Plain First) */
        .radio-row {
            display: flex;
            gap: 8px;
        }

        .radio-opt {
            flex: 1;
            padding: 9px 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, .07);
            background: #0A0A0A;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12.5px;
            color: #5A5A5A;
            transition: all .2s;
        }

        .radio-opt input[type=radio] {
            display: none;
        }

        .radio-opt.selected {
            border-color: rgba(252, 63, 55, .35);
            background: rgba(252, 63, 55, .07);
            color: #FC3F37;
        }

        .radio-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            border: 2px solid #333;
            flex-shrink: 0;
            transition: all .2s;
        }

        .radio-opt.selected .radio-dot {
            border-color: #FC3F37;
            background: #FC3F37;
            box-shadow: 0 0 0 3px rgba(252, 63, 55, .15);
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
            max-width: 480px;
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

        /* Current icon thumb in modal */
        .modal-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 10px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .modal-icon-wrap img {
            width: 30px;
            height: 30px;
            object-fit: contain;
        }

        /* Title preview in modal */
        .title-preview {
            padding: 10px 14px;
            border-radius: 8px;
            background: rgba(255, 255, 255, .025);
            border: 1px solid rgba(255, 255, 255, .06);
            font-size: 13px;
            color: #888;
            margin-bottom: 16px;
            min-height: 42px;
            display: flex;
            align-items: center;
        }

        .title-preview .preview-bold {
            color: #fff;
            font-weight: 600;
        }

        .title-preview .preview-plain {
            color: #888;
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
            <span class="sep">›</span><span class="current">Find Talent Section</span>
        </div>

        {{-- Page header --}}
        <div class="sec-header">
            <div>
                <h1>Find Talent — Steps</h1>
                <p>Manage the 5 problem steps shown on the desktop diagram. Drag to reorder the auto-cycle sequence.</p>
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

        {{-- Info note --}}
        <div class="note-banner">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2"
                stroke-linecap="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="12" y1="8" x2="12" y2="12" />
                <line x1="12" y1="16" x2="12.01" y2="16" />
            </svg>
            <span>
                The diagram background image and "Your Company" / "Before DD" endpoints are static assets.
                Only the <strong style="color:#666;">step icons, labels, and tooltips</strong> are managed here.
                CSS positions (s-1 through s-5) are fixed — the first 5 active steps fill those slots in order.
            </span>
        </div>

        <div class="page-grid">

            {{-- ════════ LEFT: step list ════════ --}}
            <div class="fc">
                <div class="fc-head">
                    <div class="fc-head-left">
                        <div class="fc-head-icon">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                stroke-width="2" stroke-linecap="round">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                        </div>
                        <div>
                            <div class="fc-title">Problem Steps</div>
                            <div class="fc-subtitle">Drag to change the auto-cycle order</div>
                        </div>
                    </div>
                    <span class="step-count">{{ $steps->whereNull('deleted_at')->count() }} steps</span>
                </div>

                @if ($steps->isEmpty())
                    <div class="empty-items">No steps yet — add one using the form →</div>
                @else
                    <ul class="step-list" id="sortable-steps">
                        @foreach ($steps as $index => $step)
                            <li class="step-row {{ $step->trashed() ? 'is-deleted' : '' }}" data-id="{{ $step->id }}">

                                {{-- Drag handle --}}
                                @if (!$step->trashed())
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

                                {{-- Step number --}}
                                <div class="step-num">{{ $index + 1 }}</div>

                                {{-- Icon thumb --}}
                                <div class="step-icon">
                                    @if ($step->iconUrl())
                                        <img src="{{ $step->iconUrl() }}" alt="{{ $step->title_plain }}">
                                    @else
                                        <span class="no-icon">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                                <circle cx="8.5" cy="8.5" r="1.5" />
                                                <polyline points="21 15 16 10 5 21" />
                                            </svg>
                                        </span>
                                    @endif
                                </div>

                                {{-- Title + tooltip --}}
                                <div class="step-info">
                                    <div class="step-title-text">
                                        @if ($step->bold_first)
                                            <strong>{{ $step->title_bold }}</strong> {{ $step->title_plain }}
                                        @else
                                            {{ $step->title_plain }} <strong>{{ $step->title_bold }}</strong>
                                        @endif
                                    </div>
                                    <div class="step-tooltip-text">"{{ $step->tooltip_text }}"</div>
                                </div>

                                {{-- Status pill --}}
                                @if ($step->trashed())
                                    <span class="pill pill-deleted">Deleted</span>
                                @else
                                    <span class="pill pill-{{ $step->status }}">{{ ucfirst($step->status) }}</span>
                                @endif

                                {{-- Actions --}}
                                <div class="item-actions">
                                    @if ($step->trashed())
                                        <form action="{{ route('admin.sections.home.findtalent.restore', $step->id) }}"
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
                                        <form action="{{ route('admin.sections.home.findtalent.toggleStatus', $step) }}"
                                            method="POST">
                                            @csrf @method('PATCH')
                                            @if ($step->isActive())
                                                <button type="submit" class="icon-btn btn-toggle-on"
                                                    title="Set Inactive">
                                                    <svg width="13" height="13" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round">
                                                        <path d="M18.36 6.64a9 9 0 1 1-12.73 0" />
                                                        <line x1="12" y1="2" x2="12"
                                                            y2="12" />
                                                    </svg>
                                                </button>
                                            @else
                                                <button type="submit" class="icon-btn btn-toggle-off"
                                                    title="Set Active">
                                                    <svg width="13" height="13" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round">
                                                        <polyline points="20 6 9 17 4 12" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </form>

                                        {{-- Edit --}}
                                        <button type="button" class="icon-btn btn-edit" title="Edit"
                                            onclick="openEditModal(
                                            {{ $step->id }},
                                            '{{ addslashes($step->title_plain) }}',
                                            '{{ addslashes($step->title_bold) }}',
                                            {{ $step->bold_first ? 'true' : 'false' }},
                                            '{{ addslashes($step->tooltip_text) }}',
                                            '{{ $step->status }}',
                                            {{ $step->iconUrl() ? "'" . addslashes($step->iconUrl()) . "'" : 'null' }}
                                        )">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                        </button>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.sections.home.findtalent.destroy', $step) }}"
                                            method="POST" onsubmit="return confirm('Soft-delete this step?')">
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

            {{-- ════════ RIGHT: add form + tips ════════ --}}
            <div>
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2.5" stroke-linecap="round">
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                            </div>
                            <div class="fc-title">Add New Step</div>
                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <form action="{{ route('admin.sections.home.findtalent.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Icon --}}
                            <div class="field">
                                <label>Icon <span class="req">*</span> <span class="hint">SVG
                                        recommended</span></label>
                                <label class="file-upload-label">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <polyline points="17 8 12 3 7 8" />
                                        <line x1="12" y1="3" x2="12" y2="15" />
                                    </svg>
                                    <span id="add-file-text">SVG, PNG, WebP (max 2 MB)</span>
                                    <span class="file-name" id="add-file-name"></span>
                                    <input type="file" name="icon" id="add-icon-input"
                                        accept=".svg,image/svg+xml,image/jpeg,image/png,image/webp,image/gif"
                                        onchange="handleFileChange(this,'add-file-name','add-file-text')">
                                </label>
                                @error('icon')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Bold word --}}
                            <div class="field">
                                <label>Bold Word(s) <span class="req">*</span> <span class="hint">Shown
                                        highlighted</span></label>
                                <input type="text" name="title_bold" id="add-title-bold"
                                    class="fi {{ $errors->has('title_bold') ? 'is-error' : '' }}"
                                    placeholder="e.g. Exhausting" value="{{ old('title_bold') }}"
                                    oninput="updatePreview('add')">
                                @error('title_bold')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Plain word --}}
                            <div class="field">
                                <label>Plain Word(s) <span class="req">*</span></label>
                                <input type="text" name="title_plain" id="add-title-plain"
                                    class="fi {{ $errors->has('title_plain') ? 'is-error' : '' }}"
                                    placeholder="e.g. Interviews" value="{{ old('title_plain') }}"
                                    oninput="updatePreview('add')">
                                @error('title_plain')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Bold position --}}
                            <div class="field">
                                <label>Bold Position <span class="req">*</span></label>
                                <div class="radio-row" id="add-bold-row">
                                    <label class="radio-opt selected" id="add-opt-first"
                                        onclick="selectBoldPos('add','1')">
                                        <input type="radio" name="bold_first" value="1" checked>
                                        <span class="radio-dot"></span>
                                        Bold on top
                                    </label>
                                    <label class="radio-opt" id="add-opt-second" onclick="selectBoldPos('add','0')">
                                        <input type="radio" name="bold_first" value="0">
                                        <span class="radio-dot"></span>
                                        Bold on bottom
                                    </label>
                                </div>
                                @error('bold_first')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Live title preview --}}
                            <div class="field">
                                <label>Preview</label>
                                <div class="title-preview" id="add-preview">
                                    <span style="color:#333; font-size:12px;">Fill in the fields above…</span>
                                </div>
                            </div>

                            {{-- Tooltip --}}
                            <div class="field">
                                <label>Tooltip Text <span class="req">*</span></label>
                                <input type="text" name="tooltip_text"
                                    class="fi {{ $errors->has('tooltip_text') ? 'is-error' : '' }}"
                                    placeholder="e.g. 30+ interviews for every 1 job slot"
                                    value="{{ old('tooltip_text') }}">
                                @error('tooltip_text')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Status --}}
                            <div class="field">
                                <label>Status <span class="req">*</span></label>
                                <select name="status" class="fi fi-select">
                                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>

                            <div style="margin-top: 22px;">
                                <button type="submit" class="btn-primary">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add Step
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Tips --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-title" style="color:#3A3A3A;">Tips</div>
                    </div>
                    <div
                        style="padding:16px 20px; display:flex; flex-direction:column; gap:9px; font-size:12.5px; color:#333; line-height:1.5;">
                        <p style="margin:0">• Only the first <strong style="color:#555;">5 active</strong> steps fill the
                            CSS diagram slots (s-1 to s-5).</p>
                        <p style="margin:0">• The <strong style="color:#555;">tooltip</strong> is the bubble that appears
                            on hover/auto-cycle.</p>
                        <p style="margin:0">• <strong style="color:#555;">Bold Position</strong> controls which line sits
                            on top inside the step label.</p>
                        <p style="margin:0">• <strong style="color:#555;">SVG</strong> icons are recommended for crisp
                            rendering at any screen size.</p>
                        <p style="margin:0">• <strong style="color:#555;">Drag</strong> the ⠿ handle to change the
                            auto-cycle order on the public page.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ════════════════════════════════
     EDIT MODAL
════════════════════════════════ --}}
    <div class="modal-backdrop" id="edit-modal-backdrop">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title">Edit Step</span>
                <button type="button" class="modal-close" onclick="closeEditModal()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                {{-- Current icon --}}
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px;">
                    <div class="modal-icon-wrap">
                        <img id="modal-icon-preview" src=""
                            style="display:none;width:30px;height:30px;object-fit:contain;" alt="">
                        <svg id="modal-icon-placeholder" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="#2A2A2A" stroke-width="1.8" stroke-linecap="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                    </div>
                    <div style="font-size:12px;color:#3A3A3A;">Current icon</div>
                </div>

                <form id="edit-modal-form" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Replace icon --}}
                    <div class="field">
                        <label>Replace Icon <span class="hint">(leave blank to keep current)</span></label>
                        <label class="file-upload-label">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="17 8 12 3 7 8" />
                                <line x1="12" y1="3" x2="12" y2="15" />
                            </svg>
                            <span id="edit-file-text">SVG, PNG, WebP (max 2 MB)</span>
                            <span class="file-name" id="edit-file-name"></span>
                            <input type="file" name="icon"
                                accept=".svg,image/svg+xml,image/jpeg,image/png,image/webp,image/gif"
                                onchange="handleFileChange(this,'edit-file-name','edit-file-text'); previewModalIcon(this)">
                        </label>
                    </div>

                    {{-- Bold word --}}
                    <div class="field">
                        <label>Bold Word(s) <span class="req">*</span></label>
                        <input type="text" name="title_bold" id="modal-title-bold" class="fi"
                            placeholder="e.g. Exhausting" oninput="updatePreview('modal')">
                    </div>

                    {{-- Plain word --}}
                    <div class="field">
                        <label>Plain Word(s) <span class="req">*</span></label>
                        <input type="text" name="title_plain" id="modal-title-plain" class="fi"
                            placeholder="e.g. Interviews" oninput="updatePreview('modal')">
                    </div>

                    {{-- Bold position --}}
                    <div class="field">
                        <label>Bold Position <span class="req">*</span></label>
                        <div class="radio-row">
                            <label class="radio-opt" id="modal-opt-first" onclick="selectBoldPos('modal','1')">
                                <input type="radio" name="bold_first" value="1" id="modal-bold-1">
                                <span class="radio-dot"></span>
                                Bold on top
                            </label>
                            <label class="radio-opt" id="modal-opt-second" onclick="selectBoldPos('modal','0')">
                                <input type="radio" name="bold_first" value="0" id="modal-bold-0">
                                <span class="radio-dot"></span>
                                Bold on bottom
                            </label>
                        </div>
                    </div>

                    {{-- Live preview --}}
                    <div class="field">
                        <label>Preview</label>
                        <div class="title-preview" id="modal-preview">
                            <span style="color:#333;font-size:12px;">Fill in the fields above…</span>
                        </div>
                    </div>

                    {{-- Tooltip --}}
                    <div class="field">
                        <label>Tooltip Text <span class="req">*</span></label>
                        <input type="text" name="tooltip_text" id="modal-tooltip" class="fi"
                            placeholder="e.g. 30+ interviews for every 1 job slot">
                    </div>

                    {{-- Status --}}
                    <div class="field">
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

            // ── Drag-and-drop sort ──
            var list = document.getElementById('sortable-steps');
            if (list) {
                Sortable.create(list, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    onEnd: function() {
                        var ids = Array.from(list.querySelectorAll('.step-row[data-id]'))
                            .map(function(el) {
                                return el.dataset.id;
                            });
                        fetch('{{ route('admin.sections.home.findtalent.sort') }}', {
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

            // ── File name display ──
            window.handleFileChange = function(input, nameId, textId) {
                if (input.files && input.files[0]) {
                    var el = document.getElementById(nameId);
                    var tx = document.getElementById(textId);
                    if (el) el.textContent = input.files[0].name;
                    if (tx) tx.textContent = 'Selected:';
                }
            };

            // ── Bold position radio ──
            window.selectBoldPos = function(prefix, val) {
                var opt1 = document.getElementById(prefix + '-opt-first');
                var opt2 = document.getElementById(prefix + '-opt-second');
                if (val === '1') {
                    opt1.classList.add('selected');
                    opt2.classList.remove('selected');
                    if (prefix === 'add') {
                        opt1.querySelector('input').checked = true;
                    } else {
                        document.getElementById('modal-bold-1').checked = true;
                    }
                } else {
                    opt2.classList.add('selected');
                    opt1.classList.remove('selected');
                    if (prefix === 'add') {
                        opt2.querySelector('input').checked = true;
                    } else {
                        document.getElementById('modal-bold-0').checked = true;
                    }
                }
                updatePreview(prefix);
            };

            // ── Live title preview ──
            window.updatePreview = function(prefix) {
                var boldEl = document.getElementById(prefix === 'add' ? 'add-title-bold' : 'modal-title-bold');
                var plainEl = document.getElementById(prefix === 'add' ? 'add-title-plain' : 'modal-title-plain');
                var prevEl = document.getElementById(prefix === 'add' ? 'add-preview' : 'modal-preview');
                if (!boldEl || !plainEl || !prevEl) return;

                var bold = boldEl.value.trim();
                var plain = plainEl.value.trim();

                if (!bold && !plain) {
                    prevEl.innerHTML = '<span style="color:#333;font-size:12px;">Fill in the fields above…</span>';
                    return;
                }

                // Determine which radio is checked
                var isBoldFirst = true;
                if (prefix === 'add') {
                    var r = document.querySelector('input[name="bold_first"]:checked');
                    isBoldFirst = r ? r.value === '1' : true;
                } else {
                    isBoldFirst = document.getElementById('modal-bold-1').checked;
                }

                var line1, line2;
                if (isBoldFirst) {
                    line1 = bold ? '<span class="preview-bold">' + esc(bold) + '</span>' : '';
                    line2 = plain ? '<span class="preview-plain">' + esc(plain) + '</span>' : '';
                } else {
                    line1 = plain ? '<span class="preview-plain">' + esc(plain) + '</span>' : '';
                    line2 = bold ? '<span class="preview-bold">' + esc(bold) + '</span>' : '';
                }

                prevEl.innerHTML = '<div style="line-height:1.4">' + [line1, line2].filter(Boolean).join('<br>') +
                    '</div>';
            };

            function esc(str) {
                return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            }

            // ── Edit modal ──
            window.openEditModal = function(id, titlePlain, titleBold, boldFirst, tooltip, status, iconUrl) {
                var form = document.getElementById('edit-modal-form');
                var baseUrl =
                    '{{ rtrim(route('admin.sections.home.findtalent.update', ['findTalentStep' => '__ID__']), '/') }}';
                form.action = baseUrl.replace('__ID__', id);

                document.getElementById('modal-title-bold').value = titleBold;
                document.getElementById('modal-title-plain').value = titlePlain;
                document.getElementById('modal-tooltip').value = tooltip;
                document.getElementById('modal-status').value = status;

                // Bold position
                selectBoldPos('modal', boldFirst ? '1' : '0');

                // Icon preview
                var img = document.getElementById('modal-icon-preview');
                var ph = document.getElementById('modal-icon-placeholder');
                if (iconUrl) {
                    img.src = iconUrl;
                    img.style.display = '';
                    ph.style.display = 'none';
                } else {
                    img.style.display = 'none';
                    ph.style.display = '';
                }

                // Reset file input UI
                document.getElementById('edit-file-name').textContent = '';
                document.getElementById('edit-file-text').textContent = 'SVG, PNG, WebP (max 2 MB)';

                updatePreview('modal');
                document.getElementById('edit-modal-backdrop').classList.add('is-open');
            };

            window.closeEditModal = function() {
                document.getElementById('edit-modal-backdrop').classList.remove('is-open');
            };

            document.getElementById('edit-modal-backdrop').addEventListener('click', function(e) {
                if (e.target === this) closeEditModal();
            });

            window.previewModalIcon = function(input) {
                if (!input.files || !input.files[0]) return;
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById('modal-icon-preview');
                    var ph = document.getElementById('modal-icon-placeholder');
                    img.src = e.target.result;
                    img.style.display = '';
                    ph.style.display = 'none';
                };
                reader.readAsDataURL(input.files[0]);
            };

        })();
    </script>
@endpush
