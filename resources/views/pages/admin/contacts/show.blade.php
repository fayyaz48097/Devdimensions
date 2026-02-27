{{--
    SAVE AS: resources/views/pages/admin/contacts/show.blade.php
--}}
@extends('admin.admin')

@section('title', 'Contact — ' . $contact->full_name)

@push('styles')
    <style>
        .show-wrap {
            padding: 28px;
            max-width: 900px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            color: #555;
            text-decoration: none;
            margin-bottom: 24px;
            transition: color 0.18s ease;
        }

        .back-link:hover {
            color: #D0D0D0;
        }

        .show-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }

        .show-header h1 {
            font-size: 20px;
            font-weight: 700;
            color: #E0E0E0;
            letter-spacing: -0.4px;
            margin: 0 0 6px;
        }

        .show-header .sub {
            font-size: 12.5px;
            color: #3A3A3A;
        }

        /* Card */
        .cc {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 14px;
            overflow: hidden;
            position: relative;
        }

        .cc::after {
            content: '';
            position: absolute;
            top: 0;
            left: 15%;
            right: 15%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(252, 63, 55, 0.30), transparent);
            pointer-events: none;
        }

        .cc-head {
            padding: 16px 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cc-title {
            font-size: 13px;
            font-weight: 600;
            color: #888;
            letter-spacing: 0.3px;
        }

        .cc-body {
            padding: 24px;
        }

        /* Grid layout */
        .show-grid {
            display: grid;
            grid-template-columns: 1fr 290px;
            gap: 20px;
            align-items: start;
        }

        @media (max-width: 820px) {
            .show-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Detail rows */
        .detail-row {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }

        .detail-row:first-child {
            padding-top: 0;
        }

        .detail-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .d-icon {
            flex-shrink: 0;
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: rgba(252, 63, 55, 0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2px;
        }

        .d-label {
            font-size: 11px;
            font-weight: 600;
            color: #444;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 5px;
        }

        .d-value {
            font-size: 14px;
            color: #C8C8C8;
            line-height: 1.6;
        }

        /* Email copy */
        .d-email-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .copy-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 7px;
            font-size: 11.5px;
            font-weight: 500;
            color: #555;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            cursor: pointer;
            transition: all 0.18s ease;
        }

        .copy-btn:hover {
            color: #FC3F37;
            background: rgba(252, 63, 55, 0.07);
            border-color: rgba(252, 63, 55, 0.20);
        }

        .copy-btn.copied {
            color: #4ADE80;
            background: rgba(74, 222, 128, 0.07);
            border-color: rgba(74, 222, 128, 0.20);
        }

        /* Tech pills */
        .tech-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 4px;
        }

        .tech-pill {
            display: inline-block;
            background: rgba(252, 63, 55, 0.07);
            border: 1px solid rgba(252, 63, 55, 0.18);
            border-radius: 6px;
            padding: 3px 12px;
            font-size: 12.5px;
            color: #FC3F37;
        }

        /* Description block */
        .desc-block {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 18px;
            font-size: 14px;
            color: #C0C0C0;
            line-height: 1.75;
            white-space: pre-wrap;
            word-break: break-word;
        }

        /* Status panel */
        .status-panel {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        /* Status pills */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .pill::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .pill-pending {
            background: rgba(251, 191, 36, 0.10);
            color: #FBBF24;
            border: 1px solid rgba(251, 191, 36, 0.22);
        }

        .pill-pending::before {
            background: #FBBF24;
        }

        .pill-active {
            background: rgba(74, 222, 128, 0.10);
            color: #4ADE80;
            border: 1px solid rgba(74, 222, 128, 0.22);
        }

        .pill-active::before {
            background: #4ADE80;
        }

        .pill-completed {
            background: rgba(255, 255, 255, 0.05);
            color: #555;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .pill-completed::before {
            background: #444;
        }

        /* Status select */
        .status-select {
            width: 100%;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 8px;
            padding: 10px 14px;
            color: #D0D0D0;
            font-size: 13px;
            outline: none;
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        .status-select:focus {
            border-color: rgba(252, 63, 55, 0.35);
        }

        .status-select option {
            background: #1A1A1A;
            color: #D0D0D0;
        }

        .btn-update {
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
            background: linear-gradient(90deg, rgba(181, 30, 23, 1), rgba(252, 63, 55, 1));
            border: none;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-update:hover {
            opacity: 0.88;
        }

        /* Meta rows */
        .meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }

        .meta-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .meta-key {
            font-size: 12px;
            color: #3A3A3A;
        }

        .meta-val {
            font-size: 12.5px;
            color: #888;
            text-align: right;
        }

        /* Flash */
        .flash-success {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 12px 18px;
            margin-bottom: 22px;
            background: rgba(74, 222, 128, 0.07);
            border: 1px solid rgba(74, 222, 128, 0.2);
            border-radius: 10px;
            font-size: 13px;
            color: #4ADE80;
        }
    </style>
@endpush

@section('content')
    <div class="show-wrap">

        {{-- Back --}}
        <a href="{{ route('admin.contacts.index') }}" class="back-link">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Back to Contact Forms
        </a>

        {{-- Flash --}}
        @if (session('success'))
            <div class="flash-success">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M8 12l3 3 5-5" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Header --}}
        <div class="show-header">
            <div>
                <h1>{{ $contact->full_name }}</h1>
                <span class="sub">Submitted {{ $contact->created_at->format('M d, Y · h:i A') }}</span>
            </div>
            <span class="pill pill-{{ $contact->status }}">{{ ucfirst($contact->status) }}</span>
        </div>

        {{-- Two-column layout --}}
        <div class="show-grid">

            {{-- ── LEFT: Details ── --}}
            <div style="display:flex; flex-direction:column; gap:20px;">

                {{-- Contact information --}}
                <div class="cc">
                    <div class="cc-head">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#555"
                            stroke-width="1.8" stroke-linecap="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        <span class="cc-title">Contact Information</span>
                    </div>
                    <div class="cc-body">

                        {{-- Full Name --}}
                        <div class="detail-row">
                            <div class="d-icon">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                            </div>
                            <div>
                                <div class="d-label">Full Name</div>
                                <div class="d-value">{{ $contact->full_name }}</div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="detail-row">
                            <div class="d-icon">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </div>
                            <div style="flex:1; min-width:0;">
                                <div class="d-label">Email Address</div>
                                <div class="d-email-wrap">
                                    <span class="d-value">{{ $contact->email }}</span>
                                    <button type="button" class="copy-btn" id="copy-email-btn"
                                        data-email="{{ $contact->email }}" onclick="copyEmailFull(this)">
                                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                            <rect x="9" y="9" width="13" height="13" rx="2" />
                                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
                                        </svg>
                                        <span id="copy-btn-label">Copy Email</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- Company --}}
                        @if ($contact->company)
                            <div class="detail-row">
                                <div class="d-icon">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <rect x="2" y="7" width="20" height="14" rx="2" />
                                        <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="d-label">Company</div>
                                    <div class="d-value">{{ $contact->company }}</div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                {{-- Hiring Requirements --}}
                @if ($contact->technologies || $contact->no_of_engineers || $contact->type_of_hire || $contact->quickly_hire)
                    <div class="cc">
                        <div class="cc-head">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#555"
                                stroke-width="1.8" stroke-linecap="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            <span class="cc-title">Hiring Requirements</span>
                        </div>
                        <div class="cc-body">

                            @if ($contact->technologies && count($contact->technologies))
                                <div class="detail-row">
                                    <div class="d-icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="#FC3F37" stroke-width="1.8" stroke-linecap="round">
                                            <polyline points="16 18 22 12 16 6" />
                                            <polyline points="8 6 2 12 8 18" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="d-label">Technologies</div>
                                        <div class="tech-pills">
                                            @foreach ($contact->technologies as $tech)
                                                <span class="tech-pill">{{ $tech }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($contact->no_of_engineers)
                                <div class="detail-row">
                                    <div class="d-icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="#FC3F37" stroke-width="1.8" stroke-linecap="round">
                                            <circle cx="12" cy="7" r="4" />
                                            <path d="M5.5 21a7.5 7.5 0 0 1 13 0" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="d-label">Number of Engineers</div>
                                        <div class="d-value">{{ $contact->no_of_engineers }}</div>
                                    </div>
                                </div>
                            @endif

                            @if ($contact->type_of_hire)
                                <div class="detail-row">
                                    <div class="d-icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="#FC3F37" stroke-width="1.8" stroke-linecap="round">
                                            <rect x="2" y="3" width="20" height="14" rx="2" />
                                            <path d="M8 21h8m-4-4v4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="d-label">Type of Hire</div>
                                        <div class="d-value">{{ $contact->type_of_hire }}</div>
                                    </div>
                                </div>
                            @endif

                            @if ($contact->quickly_hire)
                                <div class="detail-row">
                                    <div class="d-icon">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            stroke="#FC3F37" stroke-width="1.8" stroke-linecap="round">
                                            <circle cx="12" cy="12" r="10" />
                                            <polyline points="12 6 12 12 16 14" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="d-label">How Quickly to Hire</div>
                                        <div class="d-value">{{ $contact->quickly_hire }}</div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                @endif

                {{-- Description / Message --}}
                @if ($contact->description)
                    <div class="cc">
                        <div class="cc-head">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#555"
                                stroke-width="1.8" stroke-linecap="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                            <span class="cc-title">Message / Description</span>
                        </div>
                        <div class="cc-body">
                            <div class="desc-block">{{ $contact->description }}</div>
                        </div>
                    </div>
                @endif

            </div>

            {{-- ── RIGHT: Status panel ── --}}
            <div class="status-panel">

                {{-- Update status --}}
                <div class="cc">
                    <div class="cc-head">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#555"
                            stroke-width="1.8" stroke-linecap="round">
                            <circle cx="12" cy="12" r="3" />
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                        </svg>
                        <span class="cc-title">Update Status</span>
                    </div>
                    <div class="cc-body">
                        <form method="POST" action="{{ route('admin.contacts.updateStatus', $contact) }}">
                            @csrf
                            @method('PATCH')
                            <div style="margin-bottom:14px;">
                                <label
                                    style="display:block; font-size:11px; color:#3A3A3A; text-transform:uppercase; letter-spacing:0.8px; font-weight:600; margin-bottom:8px;">
                                    Status
                                </label>
                                <select name="status" class="status-select">
                                    @foreach (\App\Models\ContactUs::statuses() as $s)
                                        <option value="{{ $s }}"
                                            {{ $contact->status === $s ? 'selected' : '' }}>
                                            {{ ucfirst($s) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn-update">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                Save Status
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Meta info --}}
                <div class="cc">
                    <div class="cc-head">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#555"
                            stroke-width="1.8" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span class="cc-title">Details</span>
                    </div>
                    <div class="cc-body" style="padding:16px 24px;">
                        <div class="meta-row">
                            <span class="meta-key">ID</span>
                            <span class="meta-val">#{{ $contact->id }}</span>
                        </div>
                        <div class="meta-row">
                            <span class="meta-key">Submitted</span>
                            <span class="meta-val">{{ $contact->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="meta-row">
                            <span class="meta-key">Time</span>
                            <span class="meta-val">{{ $contact->created_at->format('h:i A') }}</span>
                        </div>
                        <div class="meta-row">
                            <span class="meta-key">Last Updated</span>
                            <span class="meta-val">{{ $contact->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function copyEmailFull(btn) {
            var email = btn.getAttribute('data-email');
            var label = document.getElementById('copy-btn-label');

            function onSuccess() {
                btn.classList.add('copied');
                label.textContent = 'Copied!';
                setTimeout(function() {
                    btn.classList.remove('copied');
                    label.textContent = 'Copy Email';
                }, 2200);
            }

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(email).then(onSuccess).catch(function() {
                    fallback(email, onSuccess);
                });
            } else {
                fallback(email, onSuccess);
            }

            function fallback(text, cb) {
                var ta = document.createElement('textarea');
                ta.value = text;
                ta.setAttribute('readonly', '');
                ta.style.cssText = 'position:fixed;top:-9999px;left:-9999px;opacity:0;';
                document.body.appendChild(ta);
                ta.focus();
                ta.select();
                try {
                    document.execCommand('copy');
                    cb();
                } catch (e) {}
                document.body.removeChild(ta);
            }
        }
    </script>
@endpush
