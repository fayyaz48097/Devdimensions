{{--
    SAVE AS: resources/views/pages/admin/sections/home/faq_admin.blade.php
--}}

@extends('admin.admin')
@section('title', 'Home › FAQ Section')
@section('page-title', 'FAQ Section')

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

        .item-count {
            font-size: 11px;
            font-weight: 600;
            color: #444;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .07);
            padding: 2px 9px;
            border-radius: 20px;
        }

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

        .step-row.sortable-chosen {
            background: rgba(181, 30, 23, .06);
            cursor: grabbing;
        }

        .step-row.sortable-ghost {
            opacity: .3;
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

        .step-desc-text {
            font-size: 11.5px;
            color: #333;
            margin-top: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 460px;
        }

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

        .empty-items {
            padding: 40px 20px;
            text-align: center;
            color: #2A2A2A;
            font-size: 13px;
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

        .field-error {
            font-size: 11.5px;
            color: #FC3F37;
            margin-top: 5px;
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
            min-height: 80px;
        }

        .fi-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23444' stroke-width='2' stroke-linecap='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 38px;
            cursor: pointer;
        }

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

        /* Modal */
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
            max-width: 560px;
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
    </style>
@endpush

@section('content')
    <div class="sec-wrap">

        {{-- Breadcrumb --}}
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="sep">›</span><span>Pages</span>
            <span class="sep">›</span><span>Home</span>
            <span class="sep">›</span><span class="current">FAQ Section</span>
        </div>

        {{-- Page header + section visibility quick-toggle --}}
        <div class="sec-header">
            <div>
                <h1>FAQ Section</h1>
                <p>Manage the frequently asked questions accordion on the home page.</p>
            </div>
            <form method="POST" action="{{ route('admin.sections.home.faq.settings.update') }}">
                @csrf
                <input type="hidden" name="heading" value="{{ $setting->heading }}">
                <input type="hidden" name="subheading" value="{{ $setting->subheading }}">
                <input type="hidden" name="status" value="{{ $setting->isActive() ? 'inactive' : 'active' }}">
                <button type="submit" class="btn-vis {{ $setting->isActive() ? 'btn-vis-on' : 'btn-vis-off' }}">
                    @if ($setting->isActive())
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

        <div class="page-grid">

            {{-- ════════ LEFT: settings + FAQ list ════════ --}}
            <div>

                {{-- Section settings --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="3" />
                                    <path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14" />
                                </svg>
                            </div>
                            <div class="fc-title">Section Settings</div>
                        </div>
                    </div>
                    <div style="padding:20px;">
                        <form method="POST" action="{{ route('admin.sections.home.faq.settings.update') }}">
                            @csrf
                            <div class="field">
                                <label>Section Heading <span class="req">*</span></label>
                                <input type="text" name="heading"
                                    class="fi {{ $errors->has('heading') ? 'is-error' : '' }}" required maxlength="200"
                                    value="{{ old('heading', $setting->heading) }}"
                                    placeholder="e.g. Frequently Asked Questions">
                                @error('heading')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="field">
                                <label>Sub-text <span class="req">*</span></label>
                                <textarea name="subheading" class="fi {{ $errors->has('subheading') ? 'is-error' : '' }}" required maxlength="500"
                                    style="min-height:70px;" placeholder="Short line below the heading…">{{ old('subheading', $setting->subheading) }}</textarea>
                                @error('subheading')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="field">
                                <label>Section Visibility <span class="req">*</span></label>
                                <select name="status" class="fi fi-select">
                                    <option value="active" {{ $setting->status === 'active' ? 'selected' : '' }}>Active
                                        — visible on site</option>
                                    <option value="inactive" {{ $setting->status === 'inactive' ? 'selected' : '' }}>
                                        Inactive — hidden from site</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-primary" style="margin-top:4px;">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                    <polyline points="17 21 17 13 7 13 7 21" />
                                    <polyline points="7 3 7 8 15 8" />
                                </svg>
                                Save Settings
                            </button>
                        </form>
                    </div>
                </div>

                {{-- FAQ list --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <circle cx="12" cy="10" r="3" />
                                    <path d="M12 21v-1a7 7 0 0 0 7-7V7a7 7 0 1 0-14 0v6a7 7 0 0 0 7 7v1" />
                                    <line x1="12" y1="17" x2="12" y2="21" />
                                </svg>
                            </div>
                            <div>
                                <div class="fc-title">FAQ Items</div>
                                <div class="fc-subtitle">Drag to reorder · all active items show in accordion</div>
                            </div>
                        </div>
                        <span class="item-count">{{ $faqItems->whereNull('deleted_at')->count() }} items</span>
                    </div>

                    @if ($faqItems->isEmpty())
                        <div class="empty-items">No FAQ items yet — add one using the form →</div>
                    @else
                        <ul class="step-list" id="sortable-faqs">
                            @foreach ($faqItems as $index => $item)
                                <li class="step-row {{ $item->trashed() ? 'is-deleted' : '' }}"
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
                                        <span style="width:14px;flex-shrink:0;"></span>
                                    @endif

                                    <div class="step-num">{{ $index + 1 }}</div>

                                    <div class="step-info">
                                        <div class="step-title-text">{{ $item->question }}</div>
                                        <div class="step-desc-text">{{ Str::limit(strip_tags($item->answer), 70) }}</div>
                                    </div>

                                    @if ($item->trashed())
                                        <span class="pill pill-deleted">Deleted</span>
                                    @else
                                        <span class="pill pill-{{ $item->status }}">{{ ucfirst($item->status) }}</span>
                                    @endif

                                    <div class="item-actions">
                                        @if ($item->trashed())
                                            <form action="{{ route('admin.sections.home.faq.items.restore', $item->id) }}"
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
                                                action="{{ route('admin.sections.home.faq.items.toggleStatus', $item) }}"
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
                                                onclick="openEditModal(
                                                    {{ $item->id }},
                                                    {{ json_encode($item->question) }},
                                                    {{ json_encode($item->answer) }},
                                                    '{{ $item->status }}'
                                                )">
                                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                </svg>
                                            </button>

                                            <form action="{{ route('admin.sections.home.faq.items.destroy', $item) }}"
                                                method="POST" onsubmit="return confirm('Delete this FAQ item?')">
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

            </div>{{-- /left --}}

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
                            <div class="fc-title">Add FAQ Item</div>
                        </div>
                    </div>
                    <div style="padding:20px;">
                        <form action="{{ route('admin.sections.home.faq.items.store') }}" method="POST">
                            @csrf

                            <div class="field">
                                <label>Question <span class="req">*</span></label>
                                <input type="text" name="question"
                                    class="fi {{ $errors->has('question') ? 'is-error' : '' }}"
                                    value="{{ old('question') }}"
                                    placeholder="e.g. Why wouldn't I just hire a freelancer?" required maxlength="500">
                                @error('question')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>Answer <span class="req">*</span> <span class="hint">HTML allowed: &lt;br&gt;
                                        for line breaks</span></label>
                                <textarea name="answer" class="fi {{ $errors->has('answer') ? 'is-error' : '' }}" required maxlength="5000"
                                    style="min-height:120px;" placeholder="Full answer text… use &lt;br&gt;&lt;br&gt; for paragraph breaks.">{{ old('answer') }}</textarea>
                                @error('answer')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>Status <span class="req">*</span></label>
                                <select name="status" class="fi fi-select">
                                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>
                                        Active</option>
                                    <option value="inactive"
                                        {{ old('status', 'active') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div style="margin-top:22px;">
                                <button type="submit" class="btn-primary">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Add FAQ Item
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
                        <p style="margin:0">• <strong style="color:#555;">Drag</strong> the ⠿ handle to reorder FAQ items.
                        </p>
                        <p style="margin:0">• Use <strong style="color:#555;">&lt;br&gt;&lt;br&gt;</strong> in the answer
                            for paragraph breaks.</p>
                        <p style="margin:0">• Only <strong style="color:#555;">active</strong> items appear on the live
                            site.</p>
                        <p style="margin:0">• Use the header toggle to <strong style="color:#555;">hide the entire
                                section</strong> without deleting items.</p>
                    </div>
                </div>

            </div>{{-- /right --}}

        </div>

    </div>

    {{-- ── EDIT MODAL ── --}}
    <div class="modal-backdrop" id="edit-modal-backdrop">
        <div class="modal">
            <div class="modal-head">
                <span class="modal-title">Edit FAQ Item</span>
                <button type="button" class="modal-close" onclick="closeEditModal()">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-modal-form" method="POST">
                    @csrf

                    <div class="field">
                        <label>Question <span class="req">*</span></label>
                        <input type="text" name="question" id="modal-question" class="fi" required
                            maxlength="500">
                    </div>

                    <div class="field">
                        <label>Answer <span class="req">*</span> <span class="hint">HTML allowed: &lt;br&gt; for line
                                breaks</span></label>
                        <textarea name="answer" id="modal-answer" class="fi" required maxlength="5000" style="min-height:160px;"></textarea>
                    </div>

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

            // ── Drag-and-drop sort ──────────────────────────────────────────
            var list = document.getElementById('sortable-faqs');
            if (list) {
                Sortable.create(list, {
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    onEnd: function() {
                        var ids = Array.from(list.querySelectorAll('.step-row[data-id]')).map(function(el) {
                            return el.dataset.id;
                        });
                        fetch('{{ route('admin.sections.home.faq.items.sort') }}', {
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

            // ── Edit modal ──────────────────────────────────────────────────
            window.openEditModal = function(id, question, answer, status) {
                var form = document.getElementById('edit-modal-form');
                var base =
                    '{{ rtrim(route('admin.sections.home.faq.items.update', ['faqItem' => '__ID__']), '/') }}';
                form.action = base.replace('__ID__', id);

                document.getElementById('modal-question').value = question;
                document.getElementById('modal-answer').value = answer;
                document.getElementById('modal-status').value = status;

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
