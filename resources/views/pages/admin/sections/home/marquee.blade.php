{{--
    SAVE AS: resources/views/pages/admin/sections/home/marquee.blade.php
--}}
@extends('admin.admin')

@section('title', 'Home › Marquee Section')
@section('page-title', 'Marquee Section')

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
            background: rgba(74, 222, 128, 0.07);
            border: 1px solid rgba(74, 222, 128, 0.18);
            color: #4ADE80;
        }

        .flash-error {
            background: rgba(252, 63, 55, 0.07);
            border: 1px solid rgba(252, 63, 55, 0.18);
            color: #FC3F37;
        }

        /* ── Two-col layout ── */
        .page-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 20px;
            align-items: start;
        }

        @media(max-width: 1100px) {
            .page-grid {
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
            padding: 14px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
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
            padding: 0;
        }

        /* ── Row count badge ── */
        .row-count {
            font-size: 11px;
            font-weight: 600;
            color: #444;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            padding: 2px 9px;
            border-radius: 20px;
        }

        /* ── Item list ── */
        .item-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .item-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            transition: background 0.15s;
        }

        .item-row:last-child {
            border-bottom: none;
        }

        .item-row:hover {
            background: rgba(255, 255, 255, 0.018);
        }

        /* Drag handle */
        .drag-handle {
            color: #252525;
            cursor: grab;
            flex-shrink: 0;
            transition: color 0.2s;
        }

        .drag-handle:hover {
            color: #555;
        }

        .item-row.sortable-chosen {
            background: rgba(181, 30, 23, 0.06);
            cursor: grabbing;
        }

        .item-row.sortable-ghost {
            opacity: 0.3;
        }

        /* Icon thumb */
        .item-icon {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .item-icon img {
            width: 22px;
            height: 22px;
            object-fit: contain;
        }

        .item-icon .no-icon {
            color: #252525;
        }

        /* Label + meta */
        .item-info {
            flex: 1;
            min-width: 0;
        }

        .item-label {
            font-size: 13px;
            font-weight: 500;
            color: #C8C8C8;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-meta {
            font-size: 11px;
            color: #333;
            margin-top: 1px;
        }

        /* Actions */
        .item-actions {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
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
        }

        .pill::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .pill-active {
            background: rgba(74, 222, 128, 0.08);
            color: #4ADE80;
            border: 1px solid rgba(74, 222, 128, 0.18);
        }

        .pill-active::before {
            background: #4ADE80;
        }

        .pill-inactive {
            background: rgba(251, 191, 36, 0.08);
            color: #FBBF24;
            border: 1px solid rgba(251, 191, 36, 0.18);
        }

        .pill-inactive::before {
            background: #FBBF24;
        }

        .pill-deleted {
            background: rgba(252, 63, 55, 0.08);
            color: #FC3F37;
            border: 1px solid rgba(252, 63, 55, 0.18);
        }

        .pill-deleted::before {
            background: #FC3F37;
        }

        /* Icon buttons */
        .icon-btn {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.07);
            background: rgba(255, 255, 255, 0.03);
            color: #444;
            cursor: pointer;
            transition: all 0.18s;
            text-decoration: none;
            flex-shrink: 0;
        }

        .icon-btn:hover {
            background: rgba(255, 255, 255, 0.07);
            color: #C8C8C8;
            border-color: rgba(255, 255, 255, 0.14);
        }

        .icon-btn.btn-toggle-on {
            color: #FBBF24;
            border-color: rgba(251, 191, 36, 0.2);
            background: rgba(251, 191, 36, 0.06);
        }

        .icon-btn.btn-toggle-on:hover {
            background: rgba(251, 191, 36, 0.12);
        }

        .icon-btn.btn-toggle-off {
            color: #4ADE80;
            border-color: rgba(74, 222, 128, 0.2);
            background: rgba(74, 222, 128, 0.06);
        }

        .icon-btn.btn-toggle-off:hover {
            background: rgba(74, 222, 128, 0.12);
        }

        .icon-btn.btn-edit:hover {
            color: #818CF8;
            border-color: rgba(129, 140, 248, 0.25);
            background: rgba(129, 140, 248, 0.07);
        }

        .icon-btn.btn-delete:hover {
            color: #FC3F37;
            border-color: rgba(252, 63, 55, 0.25);
            background: rgba(252, 63, 55, 0.07);
        }

        .icon-btn.btn-restore {
            color: #4ADE80;
            border-color: rgba(74, 222, 128, 0.2);
            background: rgba(74, 222, 128, 0.05);
        }

        .icon-btn.btn-restore:hover {
            background: rgba(74, 222, 128, 0.12);
        }

        /* Deleted row styling */
        .item-row.is-deleted {
            opacity: 0.45;
        }

        .item-row.is-deleted .item-label {
            text-decoration: line-through;
            color: #555;
        }

        /* ── Section label ── */
        .section-label {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 0 20px 0;
            padding: 14px 0 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }

        .section-label span {
            font-size: 10.5px;
            font-weight: 600;
            color: #2E2E2E;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            white-space: nowrap;
        }

        .section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.04);
        }

        /* ── Empty state ── */
        .empty-items {
            padding: 36px 20px;
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
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .field label .req {
            color: #FC3F37;
            margin-left: 2px;
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
            margin-top: 5px;
        }

        /* File upload */
        .file-upload-label {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 8px;
            background: #0A0A0A;
            border: 1px dashed rgba(255, 255, 255, 0.1);
            cursor: pointer;
            font-size: 12.5px;
            color: #4A4A4A;
            transition: all 0.2s;
            width: 100%;
            box-sizing: border-box;
        }

        .file-upload-label:hover {
            border-color: rgba(252, 63, 55, 0.3);
            color: #FC3F37;
        }

        .file-upload-label input[type=file] {
            display: none;
        }

        .file-upload-label .file-name {
            font-size: 11.5px;
            color: #555;
            margin-left: auto;
            max-width: 140px;
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
            transition: background 0.2s;
        }

        .btn-primary:hover {
            background: rgba(181, 30, 23, 1);
        }

        /* ── Edit modal ── */
        .modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 200;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            align-items: center;
            justify-content: center;
        }

        .modal-backdrop.is-open {
            display: flex;
        }

        .modal {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 16px;
            width: 100%;
            max-width: 460px;
            max-height: 90vh;
            overflow-y: auto;
            margin: 16px;
        }

        .modal-head {
            padding: 18px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
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
            background: rgba(255, 255, 255, 0.04);
            border: none;
            color: #444;
            cursor: pointer;
            transition: all 0.15s;
        }

        .modal-close:hover {
            background: rgba(252, 63, 55, 0.1);
            color: #FC3F37;
        }

        .modal-body {
            padding: 22px;
        }

        /* Icon preview in modal */
        .icon-preview-wrap {
            width: 56px;
            height: 56px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            overflow: hidden;
        }

        .icon-preview-wrap img {
            width: 34px;
            height: 34px;
            object-fit: contain;
        }
    </style>
@endpush

@section('content')
    <div class="sec-wrap">

        {{-- ── Breadcrumb ── --}}
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="sep">›</span>
            <span>Pages</span>
            <span class="sep">›</span>
            <span>Home</span>
            <span class="sep">›</span>
            <span class="current">Marquee Section</span>
        </div>

        {{-- ── Page Header ── --}}
        <div class="sec-header">
            <div>
                <h1>Marquee Section</h1>
                <p>Manage the two scrolling technology rows on the Home page. Drag to reorder.</p>
            </div>
        </div>

        {{-- ── Flash ── --}}
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

            {{-- ════════════════════════════════
             LEFT — item lists
        ════════════════════════════════ --}}
            <div>

                {{-- ── Row 1 ── --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <polyline points="5 12 12 5 19 12" />
                                    <polyline points="5 19 12 12 19 19" />
                                </svg>
                            </div>
                            <div>
                                <div class="fc-title">Row 1 — Scrolls Left</div>
                                <div class="fc-subtitle">Active items appear in the first marquee band</div>
                            </div>
                        </div>
                        <span class="row-count">{{ $row1->whereNull('deleted_at')->count() }} items</span>
                    </div>
                    <div class="fc-body">
                        @if ($row1->isEmpty())
                            <div class="empty-items">No items yet — add one using the form →</div>
                        @else
                            <ul class="item-list sortable-list" data-row="1" id="sortable-row1">
                                @foreach ($row1 as $item)
                                    <li class="item-row {{ $item->trashed() ? 'is-deleted' : '' }}"
                                        data-id="{{ $item->id }}">

                                        {{-- Drag handle (hidden for deleted rows) --}}
                                        @if (!$item->trashed())
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
                                            <span style="width:14px; flex-shrink:0;"></span>
                                        @endif

                                        {{-- Icon thumb --}}
                                        <div class="item-icon">
                                            @if ($item->icon_path)
                                                <img src="{{ $item->iconUrl() }}" alt="{{ $item->label }}">
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

                                        {{-- Label + meta --}}
                                        <div class="item-info">
                                            <div class="item-label">{{ $item->label }}</div>
                                            <div class="item-meta">
                                                @if ($item->icon_original_name)
                                                    {{ $item->icon_original_name }}
                                                @elseif ($item->icon_path && str_starts_with($item->icon_path, 'http'))
                                                    External URL
                                                @else
                                                    No icon
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Status pill --}}
                                        @if ($item->trashed())
                                            <span class="pill pill-deleted">Deleted</span>
                                        @else
                                            <span
                                                class="pill pill-{{ $item->status }}">{{ ucfirst($item->status) }}</span>
                                        @endif

                                        {{-- Actions --}}
                                        <div class="item-actions">
                                            @if ($item->trashed())
                                                {{-- Restore --}}
                                                <form
                                                    action="{{ route('admin.sections.home.marquee.restore', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="icon-btn btn-restore" title="Restore">
                                                        <svg width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round">
                                                            <polyline points="1 4 1 10 7 10" />
                                                            <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                {{-- Toggle status --}}
                                                <form
                                                    action="{{ route('admin.sections.home.marquee.toggleStatus', $item) }}"
                                                    method="POST">
                                                    @csrf @method('PATCH')
                                                    @if ($item->isActive())
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
                                                    onclick="openEditModal({{ $item->id }}, {{ $item->row }}, '{{ addslashes($item->label) }}', '{{ $item->status }}', '{{ $item->iconUrl() }}')">
                                                    <svg width="13" height="13" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                    </svg>
                                                </button>

                                                {{-- Soft delete --}}
                                                <form action="{{ route('admin.sections.home.marquee.destroy', $item) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Soft-delete {{ addslashes($item->label) }}?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="icon-btn btn-delete" title="Delete">
                                                        <svg width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round">
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

                {{-- ── Row 2 ── --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <polyline points="5 19 12 12 19 19" />
                                    <polyline points="5 12 12 5 19 12" />
                                </svg>
                            </div>
                            <div>
                                <div class="fc-title">Row 2 — Scrolls Right</div>
                                <div class="fc-subtitle">Active items appear in the reverse marquee band</div>
                            </div>
                        </div>
                        <span class="row-count">{{ $row2->whereNull('deleted_at')->count() }} items</span>
                    </div>
                    <div class="fc-body">
                        @if ($row2->isEmpty())
                            <div class="empty-items">No items yet — add one using the form →</div>
                        @else
                            <ul class="item-list sortable-list" data-row="2" id="sortable-row2">
                                @foreach ($row2 as $item)
                                    <li class="item-row {{ $item->trashed() ? 'is-deleted' : '' }}"
                                        data-id="{{ $item->id }}">

                                        @if (!$item->trashed())
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
                                            <span style="width:14px; flex-shrink:0;"></span>
                                        @endif

                                        <div class="item-icon">
                                            @if ($item->icon_path)
                                                <img src="{{ $item->iconUrl() }}" alt="{{ $item->label }}">
                                            @else
                                                <span class="no-icon">
                                                    <svg width="14" height="14" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="1.8"
                                                        stroke-linecap="round">
                                                        <rect x="3" y="3" width="18" height="18" rx="2" />
                                                        <circle cx="8.5" cy="8.5" r="1.5" />
                                                        <polyline points="21 15 16 10 5 21" />
                                                    </svg>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="item-info">
                                            <div class="item-label">{{ $item->label }}</div>
                                            <div class="item-meta">
                                                @if ($item->icon_original_name)
                                                    {{ $item->icon_original_name }}
                                                @elseif ($item->icon_path && str_starts_with($item->icon_path, 'http'))
                                                    External URL
                                                @else
                                                    No icon
                                                @endif
                                            </div>
                                        </div>

                                        @if ($item->trashed())
                                            <span class="pill pill-deleted">Deleted</span>
                                        @else
                                            <span
                                                class="pill pill-{{ $item->status }}">{{ ucfirst($item->status) }}</span>
                                        @endif

                                        <div class="item-actions">
                                            @if ($item->trashed())
                                                <form
                                                    action="{{ route('admin.sections.home.marquee.restore', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="icon-btn btn-restore" title="Restore">
                                                        <svg width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round">
                                                            <polyline points="1 4 1 10 7 10" />
                                                            <path d="M3.51 15a9 9 0 1 0 .49-3.31" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @else
                                                <form
                                                    action="{{ route('admin.sections.home.marquee.toggleStatus', $item) }}"
                                                    method="POST">
                                                    @csrf @method('PATCH')
                                                    @if ($item->isActive())
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

                                                <button type="button" class="icon-btn btn-edit" title="Edit"
                                                    onclick="openEditModal({{ $item->id }}, {{ $item->row }}, '{{ addslashes($item->label) }}', '{{ $item->status }}', '{{ $item->iconUrl() }}')">
                                                    <svg width="13" height="13" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round">
                                                        <path
                                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                    </svg>
                                                </button>

                                                <form action="{{ route('admin.sections.home.marquee.destroy', $item) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Soft-delete {{ addslashes($item->label) }}?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="icon-btn btn-delete" title="Delete">
                                                        <svg width="13" height="13" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round">
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

            </div>

            {{-- ════════════════════════════════
             RIGHT — Add new item form
        ════════════════════════════════ --}}
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
                            <div class="fc-title">Add New Item</div>
                        </div>
                    </div>
                    <div class="fc-body" style="padding: 20px;">
                        <form action="{{ route('admin.sections.home.marquee.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="field">
                                <label>Row <span class="req">*</span></label>
                                <select name="row" class="fi fi-select {{ $errors->has('row') ? 'is-error' : '' }}">
                                    <option value="1" {{ old('row', '1') == '1' ? 'selected' : '' }}>Row 1 — Scrolls
                                        Left</option>
                                    <option value="2" {{ old('row') == '2' ? 'selected' : '' }}>Row 2 — Scrolls Right
                                    </option>
                                </select>
                                @error('row')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>Label <span class="req">*</span></label>
                                <input type="text" name="label"
                                    class="fi {{ $errors->has('label') ? 'is-error' : '' }}" placeholder="e.g. React Js"
                                    value="{{ old('label') }}">
                                @error('label')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>Icon <span class="req">*</span></label>
                                <label class="file-upload-label" id="add-file-label">
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
                                        onchange="handleFileChange(this, 'add-file-name', 'add-file-text')">
                                </label>
                                @error('icon')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>Status <span class="req">*</span></label>
                                <select name="status"
                                    class="fi fi-select {{ $errors->has('status') ? 'is-error' : '' }}">
                                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field" style="margin-top: 22px;">
                                <button type="submit" class="btn-primary">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add Item
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Tips card --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-title" style="color: #3A3A3A;">Tips</div>
                    </div>
                    <div class="fc-body" style="padding: 16px 20px;">
                        <div
                            style="display: flex; flex-direction: column; gap: 10px; font-size: 12.5px; color: #333; line-height: 1.5;">
                            <p style="margin:0;">• <strong style="color:#555;">SVG</strong> files are recommended — they
                                scale perfectly at any size.</p>
                            <p style="margin:0;">• Set an item to <strong style="color:#555;">Inactive</strong> to hide it
                                without deleting it.</p>
                            <p style="margin:0;">• <strong style="color:#555;">Deleted</strong> items are soft-deleted and
                                can be restored any time.</p>
                            <p style="margin:0;">• <strong style="color:#555;">Drag</strong> the ⠿ handle to reorder items
                                within each row.</p>
                        </div>
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
                <span class="modal-title">Edit Item</span>
                <button type="button" class="modal-close" onclick="closeEditModal()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">

                {{-- Current icon preview --}}
                <div class="icon-preview-wrap" id="modal-icon-preview-wrap">
                    <img id="modal-icon-preview" src="" alt="" style="display:none;">
                    <svg id="modal-icon-placeholder" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#2A2A2A" stroke-width="1.8" stroke-linecap="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <circle cx="8.5" cy="8.5" r="1.5" />
                        <polyline points="21 15 16 10 5 21" />
                    </svg>
                </div>

                <form id="edit-modal-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="POST">

                    <div class="field">
                        <label>Row <span class="req">*</span></label>
                        <select name="row" id="modal-row" class="fi fi-select">
                            <option value="1">Row 1 — Scrolls Left</option>
                            <option value="2">Row 2 — Scrolls Right</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Label <span class="req">*</span></label>
                        <input type="text" name="label" id="modal-label" class="fi"
                            placeholder="e.g. React Js">
                    </div>

                    <div class="field">
                        <label>Replace Icon <span
                                style="font-size:11px; color:#333; font-weight:400; text-transform:none; letter-spacing:0;">(leave
                                blank to keep current)</span></label>
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
                                onchange="handleFileChange(this, 'edit-file-name', 'edit-file-text'); previewModalIcon(this)">
                        </label>
                    </div>

                    <div class="field">
                        <label>Status <span class="req">*</span></label>
                        <select name="status" id="modal-status" class="fi fi-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="field" style="margin-top: 22px;">
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
    {{-- SortableJS CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.2/Sortable.min.js"></script>

    <script>
        (function() {
            // ── Drag-and-drop sort ──
            document.querySelectorAll('.sortable-list').forEach(function(list) {
                Sortable.create(list, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    onEnd: function() {
                        var ids = Array.from(list.querySelectorAll('.item-row[data-id]'))
                            .map(function(el) {
                                return el.getAttribute('data-id');
                            });

                        fetch('{{ route('admin.sections.home.marquee.sort') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                items: ids
                            }),
                        });
                    },
                });
            });

            // ── File name display ──
            window.handleFileChange = function(input, nameElId, textElId) {
                var nameEl = document.getElementById(nameElId);
                var textEl = document.getElementById(textElId);
                if (input.files && input.files[0]) {
                    var name = input.files[0].name;
                    if (nameEl) nameEl.textContent = name;
                    if (textEl) textEl.textContent = 'Selected:';
                }
            };

            // ── Edit modal ──
            var updateBaseUrl = '{{ url('admin/sections/home/hero') }}'; // replaced dynamically

            window.openEditModal = function(id, row, label, status, iconUrl) {
                var form = document.getElementById('edit-modal-form');
                form.action = '/admin/sections/home/marquee/' + id;

                document.getElementById('modal-row').value = String(row);
                document.getElementById('modal-label').value = label;
                document.getElementById('modal-status').value = status;

                // Reset file fields
                document.getElementById('edit-file-name').textContent = '';
                document.getElementById('edit-file-text').textContent = 'SVG, PNG, WebP (max 2 MB)';

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

                document.getElementById('edit-modal-backdrop').classList.add('is-open');
            };

            window.closeEditModal = function() {
                document.getElementById('edit-modal-backdrop').classList.remove('is-open');
            };

            // Close on backdrop click
            document.getElementById('edit-modal-backdrop').addEventListener('click', function(e) {
                if (e.target === this) closeEditModal();
            });

            // Preview new icon inside modal before upload
            window.previewModalIcon = function(input) {
                if (!input.files || !input.files[0]) return;
                var file = input.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = document.getElementById('modal-icon-preview');
                    var ph = document.getElementById('modal-icon-placeholder');
                    img.src = e.target.result;
                    img.style.display = '';
                    ph.style.display = 'none';
                };
                reader.readAsDataURL(file);
            };
        })();
    </script>
@endpush
