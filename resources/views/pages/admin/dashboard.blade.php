{{--
    SAVE AS: resources/views/pages/admin/dashboard.blade.php
--}}
@extends('admin.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@push('styles')
    <style>
        .dash-wrap {
            padding: 28px;
        }

        /* ── Welcome ── */
        .dash-welcome {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 32px;
        }

        .dash-welcome h1 {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.4px;
            margin: 0 0 4px;
            line-height: 1.2;
        }

        .dash-welcome p {
            font-size: 13px;
            color: #4A4A4A;
            margin: 0;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            white-space: nowrap;
            background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
            transition: background 0.2s;
        }

        .btn-add:hover {
            background: rgba(181, 30, 23, 1);
            color: #fff;
        }

        /* ── Section divider label ── */
        .section-label {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 8px 0 16px;
        }

        .section-label span {
            font-size: 11px;
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

        /* ── Stats 4-col ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        @media(max-width:1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:580px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        .stat-card {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 14px;
            padding: 20px 22px 18px;
            position: relative;
            overflow: hidden;
            transition: border-color 0.25s, transform 0.25s;
            text-decoration: none;
            display: block;
        }

        .stat-card:hover {
            border-color: rgba(255, 255, 255, 0.13);
            transform: translateY(-2px);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: 15%;
            right: 15%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(252, 63, 55, 0.45), transparent);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .stat-num {
            font-size: 34px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -1.2px;
            line-height: 1;
            margin-bottom: 5px;
        }

        .stat-lbl {
            font-size: 12.5px;
            color: #474747;
            font-weight: 500;
            margin-bottom: 14px;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            font-weight: 500;
        }

        .t-up {
            color: #4ADE80;
        }

        .t-dn {
            color: #FC3F37;
        }

        .t-wrn {
            color: #FBBF24;
        }

        .t-neu {
            color: #888;
        }

        /* ── Bottom layout ── */
        .dash-bottom {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 20px;
            align-items: start;
        }

        @media(max-width:1050px) {
            .dash-bottom {
                grid-template-columns: 1fr;
            }
        }

        /* ── Card shell ── */
        .cc {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 14px;
            overflow: hidden;
        }

        .cc-head {
            padding: 16px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cc-title {
            font-size: 13.5px;
            font-weight: 600;
            color: #C8C8C8;
        }

        .cc-link {
            font-size: 12px;
            color: #FC3F37;
            text-decoration: none;
        }

        .cc-link:hover {
            color: #B51E17;
        }

        /* ── Data table ── */
        .dt {
            width: 100%;
            border-collapse: collapse;
        }

        .dt th {
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #2A2A2A;
            padding: 11px 22px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            white-space: nowrap;
        }

        .dt td {
            padding: 13px 22px;
            font-size: 13px;
            color: #686868;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            vertical-align: middle;
        }

        .dt tr:last-child td {
            border-bottom: none;
        }

        .dt tbody tr:hover td {
            background: rgba(255, 255, 255, 0.018);
            color: #ABABAB;
        }

        .td-name {
            color: #D8D8D8 !important;
            font-weight: 600 !important;
            white-space: nowrap;
        }

        /* ── Email cell with copy button ── */
        .email-cell {
            display: flex;
            align-items: center;
            gap: 7px;
            white-space: nowrap;
        }

        .copy-email-btn {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            color: #444;
            cursor: pointer;
            transition: all 0.18s ease;
            position: relative;
        }

        .copy-email-btn:hover {
            background: rgba(252, 63, 55, 0.09);
            border-color: rgba(252, 63, 55, 0.22);
            color: #FC3F37;
        }

        .copy-email-btn.copied {
            background: rgba(74, 222, 128, 0.09);
            border-color: rgba(74, 222, 128, 0.25);
            color: #4ADE80;
        }

        /* Tooltip */
        .copy-email-btn::after {
            content: attr(data-tip);
            position: absolute;
            bottom: calc(100% + 6px);
            left: 50%;
            transform: translateX(-50%);
            background: #1A1A1A;
            color: #D0D0D0;
            font-size: 10.5px;
            font-weight: 500;
            white-space: nowrap;
            padding: 4px 8px;
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.07);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.15s ease;
        }

        .copy-email-btn:hover::after {
            opacity: 1;
        }

        /* ── Status pills ── */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 30px;
            font-size: 11px;
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

        .pill-pending {
            background: rgba(251, 191, 36, 0.08);
            color: #FBBF24;
            border: 1px solid rgba(251, 191, 36, 0.18);
        }

        .pill-pending::before {
            background: #FBBF24;
        }

        .pill-active {
            background: rgba(74, 222, 128, 0.08);
            color: #4ADE80;
            border: 1px solid rgba(74, 222, 128, 0.18);
        }

        .pill-active::before {
            background: #4ADE80;
        }

        .pill-completed {
            background: rgba(255, 255, 255, 0.04);
            color: #555;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .pill-completed::before {
            background: #555;
        }

        /* ── Tech tag ── */
        .tech-tag {
            display: inline-block;
            background: rgba(252, 63, 55, 0.07);
            border: 1px solid rgba(252, 63, 55, 0.15);
            border-radius: 5px;
            padding: 1px 7px;
            font-size: 11px;
            color: #FC3F37;
            white-space: nowrap;
        }

        /* ── Side col ── */
        .side-col {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* Quick action */
        .qa {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 12px 16px;
            border-radius: 9px;
            background: rgba(255, 255, 255, 0.025);
            border: 1px solid rgba(255, 255, 255, 0.06);
            text-decoration: none;
            transition: all 0.2s;
        }

        .qa:hover {
            background: rgba(181, 30, 23, 0.08);
            border-color: rgba(181, 30, 23, 0.28);
        }

        .qa-ic {
            color: #333;
            transition: color 0.2s;
            flex-shrink: 0;
        }

        .qa:hover .qa-ic {
            color: #FC3F37;
        }

        .qa-lbl {
            font-size: 13px;
            color: #6E6E6E;
            font-weight: 500;
            transition: color 0.2s;
        }

        .qa:hover .qa-lbl {
            color: #C8C8C8;
        }

        /* Status rows */
        .ss-r {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ss-k {
            font-size: 13px;
            color: #3A3A3A;
        }

        .ss-v {
            font-size: 13px;
            color: #767676;
            font-weight: 500;
        }

        .ss-div {
            height: 1px;
            background: rgba(255, 255, 255, 0.04);
        }

        /* Consult breakdown mini bars */
        .stat-breakdown {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 10px;
        }

        .breakdown-bar {
            height: 3px;
            border-radius: 2px;
            flex: 1;
            transition: opacity 0.2s;
        }

        .breakdown-bar:hover {
            opacity: 0.8;
        }

        /* Empty state for table */
        .empty-row td {
            text-align: center;
            padding: 40px 22px !important;
            color: #2E2E2E !important;
            font-size: 13px !important;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: 0.4
            }
        }

        .online-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #4ADE80;
            animation: pulse-dot 2s infinite;
            display: inline-block;
        }
    </style>
@endpush

@section('content')
    <div class="dash-wrap">

        {{-- ── Welcome ── --}}
        <div class="dash-welcome">
            <div>
                <h1>{{ $greeting }}, {{ $adminName }} 👋</h1>
                <p>Here's what's happening on your site today.</p>
            </div>
            <a href="{{ route('admin.casestudies.create') }}" class="btn-add">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8"
                    stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Add Case Study
            </a>
        </div>

        {{-- ══════════════════════════════════════
             SECTION: Consultations
        ══════════════════════════════════════ --}}
        <div class="section-label"><span>Consultations</span></div>

        <div class="stats-grid">

            {{-- Total Consultations --}}
            <a href="{{ route('admin.consultations.index') }}" class="stat-card">
                <div class="stat-icon" style="background:rgba(181,30,23,0.12);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                        stroke-width="1.8" stroke-linecap="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                    </svg>
                </div>
                <div class="stat-num">{{ $stats['total'] }}</div>
                <div class="stat-lbl">Total Consultations</div>
                @if ($stats['total'] > 0)
                    <div class="stat-breakdown" title="Pending / Active / Completed">
                        @php
                            $pendingW = round(($stats['pending'] / $stats['total']) * 100);
                            $activeW = round(($stats['active'] / $stats['total']) * 100);
                            $completedW = 100 - $pendingW - $activeW;
                        @endphp
                        <div class="breakdown-bar" style="background:#FBBF24; flex:{{ max($pendingW, 1) }};"></div>
                        <div class="breakdown-bar" style="background:#4ADE80; flex:{{ max($activeW, 1) }};"></div>
                        <div class="breakdown-bar" style="background:#333;    flex:{{ max($completedW, 1) }};"></div>
                    </div>
                @endif
                <div class="stat-trend {{ $stats['pending'] > 0 ? 't-wrn' : 't-neu' }}" style="margin-top:10px;">
                    @if ($stats['pending'] > 0)
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        {{ $stats['pending'] }} pending
                    @else
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        All caught up
                    @endif
                </div>
            </a>

            {{-- Pending Consultations --}}
            <a href="{{ route('admin.consultations.index', ['status' => 'pending']) }}" class="stat-card">
                <div class="stat-icon" style="background:rgba(251,191,36,0.10);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FBBF24"
                        stroke-width="1.8" stroke-linecap="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <div class="stat-num">{{ $stats['pending'] }}</div>
                <div class="stat-lbl">Pending</div>
                <div class="stat-trend {{ $stats['pending'] > 0 ? 't-wrn' : 't-neu' }}">
                    @if ($stats['pending'] > 0)
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        Needs attention
                    @else
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        None pending
                    @endif
                </div>
            </a>

            {{-- Active Consultations --}}
            <a href="{{ route('admin.consultations.index', ['status' => 'active']) }}" class="stat-card">
                <div class="stat-icon" style="background:rgba(74,222,128,0.08);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4ADE80"
                        stroke-width="1.8" stroke-linecap="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                    </svg>
                </div>
                <div class="stat-num">{{ $stats['active'] }}</div>
                <div class="stat-lbl">Active</div>
                <div class="stat-trend t-up">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <polyline points="18 15 12 9 6 15" />
                    </svg>
                    In progress
                </div>
            </a>

            {{-- Completed Consultations --}}
            <a href="{{ route('admin.consultations.index', ['status' => 'completed']) }}" class="stat-card">
                <div class="stat-icon" style="background:rgba(100,116,139,0.10);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94A3B8"
                        stroke-width="1.8" stroke-linecap="round">
                        <path d="M9 11l3 3L22 4" />
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                    </svg>
                </div>
                <div class="stat-num">{{ $stats['completed'] }}</div>
                <div class="stat-lbl">Completed</div>
                <div class="stat-trend t-neu">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Closed
                </div>
            </a>

        </div>

        {{-- ══════════════════════════════════════
             SECTION: Contact Forms
        ══════════════════════════════════════ --}}
        <div class="section-label"><span>Contact Forms</span></div>

        <div class="stats-grid" style="margin-bottom:32px;">

            {{-- Total Contacts --}}
            <a href="{{ route('admin.contacts.index') }}" class="stat-card">
                <div class="stat-icon" style="background:rgba(252,63,55,0.08);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                        stroke-width="1.8" stroke-linecap="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg>
                </div>
                <div class="stat-num">{{ $contactStats['total'] }}</div>
                <div class="stat-lbl">Total Contact Forms</div>
                @if ($contactStats['total'] > 0)
                    <div class="stat-breakdown" title="Pending / Active / Completed">
                        @php
                            $cPendingW = round(($contactStats['pending'] / $contactStats['total']) * 100);
                            $cActiveW = round(($contactStats['active'] / $contactStats['total']) * 100);
                            $cCompletedW = 100 - $cPendingW - $cActiveW;
                        @endphp
                        <div class="breakdown-bar" style="background:#FBBF24; flex:{{ max($cPendingW, 1) }};"></div>
                        <div class="breakdown-bar" style="background:#4ADE80; flex:{{ max($cActiveW, 1) }};"></div>
                        <div class="breakdown-bar" style="background:#333;    flex:{{ max($cCompletedW, 1) }};"></div>
                    </div>
                @endif
                <div class="stat-trend {{ $contactStats['pending'] > 0 ? 't-wrn' : 't-neu' }}" style="margin-top:10px;">
                    @if ($contactStats['pending'] > 0)
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        {{ $contactStats['pending'] }} pending
                    @else
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        All caught up
                    @endif
                </div>
            </a>

            {{-- Pending Contacts --}}
            <a href="{{ route('admin.contacts.index', ['status' => 'pending']) }}" class="stat-card">
                <div class="stat-icon" style="background:rgba(251,191,36,0.10);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FBBF24"
                        stroke-width="1.8" stroke-linecap="round">
                        <circle cx="12" cy="12" r="10" />
                        <polyline points="12 6 12 12 16 14" />
                    </svg>
                </div>
                <div class="stat-num">{{ $contactStats['pending'] }}</div>
                <div class="stat-lbl">Pending Contacts</div>
                <div class="stat-trend {{ $contactStats['pending'] > 0 ? 't-wrn' : 't-neu' }}">
                    @if ($contactStats['pending'] > 0)
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        Needs attention
                    @else
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        None pending
                    @endif
                </div>
            </a>

            {{-- Active Contacts --}}
            <a href="{{ route('admin.contacts.index', ['status' => 'active']) }}" class="stat-card">
                <div class="stat-icon" style="background:rgba(74,222,128,0.08);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#4ADE80"
                        stroke-width="1.8" stroke-linecap="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                    </svg>
                </div>
                <div class="stat-num">{{ $contactStats['active'] }}</div>
                <div class="stat-lbl">Active Contacts</div>
                <div class="stat-trend t-up">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <polyline points="18 15 12 9 6 15" />
                    </svg>
                    In progress
                </div>
            </a>

            {{-- Completed Contacts --}}
            <a href="{{ route('admin.contacts.index', ['status' => 'completed']) }}" class="stat-card">
                <div class="stat-icon" style="background:rgba(100,116,139,0.10);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#94A3B8"
                        stroke-width="1.8" stroke-linecap="round">
                        <path d="M9 11l3 3L22 4" />
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                    </svg>
                </div>
                <div class="stat-num">{{ $contactStats['completed'] }}</div>
                <div class="stat-lbl">Completed Contacts</div>
                <div class="stat-trend t-neu">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    Closed
                </div>
            </a>

        </div>

        {{-- ══════════════════════════════════════
             BOTTOM: Tables + Sidebar
        ══════════════════════════════════════ --}}
        <div class="dash-bottom">

            {{-- ── LEFT: Tables column ── --}}
            <div style="display:flex; flex-direction:column; gap:20px;">

                {{-- Recent Consultations --}}
                <div class="cc">
                    <div class="cc-head">
                        <span class="cc-title">Recent Consultations</span>
                        <a href="{{ route('admin.consultations.index') }}" class="cc-link">View all →</a>
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="dt">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentConsultations as $c)
                                    <tr>
                                        <td class="td-name">{{ $c->name }}</td>
                                        <td>
                                            <div class="email-cell">
                                                <span>{{ $c->email }}</span>
                                                <button type="button" class="copy-email-btn"
                                                    data-email="{{ $c->email }}" data-tip="Copy email"
                                                    aria-label="Copy email address">
                                                    <svg class="icon-copy" width="11" height="11"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <rect x="9" y="9" width="13" height="13" rx="2"
                                                            ry="2" />
                                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
                                                    </svg>
                                                    <svg class="icon-check" width="11" height="11"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"
                                                        style="display:none;">
                                                        <polyline points="20 6 9 17 4 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                        <td style="white-space:nowrap; color:#444;">
                                            {{ $c->created_at->format('M d, Y') }}
                                        </td>
                                        <td>
                                            <span class="pill pill-{{ $c->status }}">
                                                {{ ucfirst($c->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.consultations.show', $c) }}"
                                                style="font-size:12px; color:#333; text-decoration:none; transition:color 0.2s; white-space:nowrap;"
                                                onmouseover="this.style.color='#FC3F37'"
                                                onmouseout="this.style.color='#333'">
                                                View →
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="empty-row">
                                        <td colspan="5">No consultations yet. They'll show up here once users submit the
                                            form.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Recent Contact Forms --}}
                <div class="cc">
                    <div class="cc-head">
                        <span class="cc-title">Recent Contact Forms</span>
                        <a href="{{ route('admin.contacts.index') }}" class="cc-link">View all →</a>
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="dt">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Technologies</th>
                                    <th>Engineers</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentContacts as $c)
                                    <tr>
                                        <td class="td-name">{{ $c->full_name }}</td>
                                        <td>
                                            <div class="email-cell">
                                                <span>{{ $c->email }}</span>
                                                <button type="button" class="copy-email-btn"
                                                    data-email="{{ $c->email }}" data-tip="Copy email"
                                                    aria-label="Copy email address">
                                                    <svg class="icon-copy" width="11" height="11"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <rect x="9" y="9" width="13" height="13" rx="2"
                                                            ry="2" />
                                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
                                                    </svg>
                                                    <svg class="icon-check" width="11" height="11"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"
                                                        style="display:none;">
                                                        <polyline points="20 6 9 17 4 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                        <td style="color:#555; font-size:12px;">{{ $c->company ?: '—' }}</td>
                                        <td>
                                            @if ($c->technologies && count($c->technologies))
                                                <div style="display:flex; flex-wrap:wrap; gap:3px;">
                                                    @foreach (array_slice($c->technologies, 0, 2) as $tech)
                                                        <span class="tech-tag">{{ $tech }}</span>
                                                    @endforeach
                                                    @if (count($c->technologies) > 2)
                                                        <span class="tech-tag">+{{ count($c->technologies) - 2 }}</span>
                                                    @endif
                                                </div>
                                            @else
                                                <span style="color:#333;">—</span>
                                            @endif
                                        </td>
                                        <td style="text-align:center; color:#555; font-size:12px;">
                                            {{ $c->no_of_engineers ?? '—' }}
                                        </td>
                                        <td>
                                            <span class="pill pill-{{ $c->status }}">{{ ucfirst($c->status) }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contacts.show', $c) }}"
                                                style="font-size:12px; color:#333; text-decoration:none; transition:color 0.2s; white-space:nowrap;"
                                                onmouseover="this.style.color='#FC3F37'"
                                                onmouseout="this.style.color='#333'">
                                                View →
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="empty-row">
                                        <td colspan="7">No contact submissions yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            {{-- ── RIGHT: Sidebar column ── --}}
            <div class="side-col">

                {{-- Quick Actions --}}
                <div class="cc">
                    <div class="cc-head"><span class="cc-title">Quick Actions</span></div>
                    <div style="padding:14px; display:flex; flex-direction:column; gap:8px;">

                        <a href="{{ route('admin.consultations.index', ['status' => 'pending']) }}" class="qa">
                            <span class="qa-ic">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                                </svg>
                            </span>
                            <span class="qa-lbl">
                                Pending Consultations
                                @if ($stats['pending'] > 0)
                                    <span
                                        style="margin-left:4px; background:rgba(251,191,36,0.15); color:#FBBF24;
                                                 border:1px solid rgba(251,191,36,0.22); border-radius:4px;
                                                 font-size:10px; font-weight:700; padding:1px 6px;">
                                        {{ $stats['pending'] }}
                                    </span>
                                @endif
                            </span>
                        </a>

                        <a href="{{ route('admin.contacts.index', ['status' => 'pending']) }}" class="qa">
                            <span class="qa-ic">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </span>
                            <span class="qa-lbl">
                                Pending Contact Forms
                                @if ($contactStats['pending'] > 0)
                                    <span
                                        style="margin-left:4px; background:rgba(251,191,36,0.15); color:#FBBF24;
                                                 border:1px solid rgba(251,191,36,0.22); border-radius:4px;
                                                 font-size:10px; font-weight:700; padding:1px 6px;">
                                        {{ $contactStats['pending'] }}
                                    </span>
                                @endif
                            </span>
                        </a>

                        <a href="{{ route('admin.casestudies.create') }}" class="qa">
                            <span class="qa-ic">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                                    <line x1="12" y1="11" x2="12" y2="17" />
                                    <line x1="9" y1="14" x2="15" y2="14" />
                                </svg>
                            </span>
                            <span class="qa-lbl">New Case Study</span>
                        </a>

                        <a href="{{ route('admin.testimonials.create') }}" class="qa">
                            <span class="qa-ic">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    <line x1="9" y1="10" x2="15" y2="10" />
                                    <line x1="9" y1="14" x2="13" y2="14" />
                                </svg>
                            </span>
                            <span class="qa-lbl">Add Testimonial</span>
                        </a>

                        <a href="{{ route('admin.settings.general') }}" class="qa">
                            <span class="qa-ic">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="3" />
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                                </svg>
                            </span>
                            <span class="qa-lbl">Site Settings</span>
                        </a>

                    </div>
                </div>

                {{-- Consultation Status breakdown --}}
                <div class="cc">
                    <div class="cc-head">
                        <span class="cc-title">Consultation Status</span>
                        <span
                            style="display:flex; align-items:center; gap:6px; font-size:12px; color:#4ADE80; font-weight:500;">
                            <span class="online-dot"></span> Live
                        </span>
                    </div>
                    <div style="padding:18px 20px; display:flex; flex-direction:column; gap:13px;">
                        <div class="ss-r">
                            <span class="ss-k">Total</span>
                            <span class="ss-v">{{ $stats['total'] }}</span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r">
                            <span class="ss-k" style="display:flex; align-items:center; gap:6px;">
                                <span
                                    style="width:7px; height:7px; border-radius:50%; background:#FBBF24; display:inline-block; flex-shrink:0;"></span>
                                Pending
                            </span>
                            <span class="ss-v" style="{{ $stats['pending'] > 0 ? 'color:#FBBF24;' : '' }}">
                                {{ $stats['pending'] }}
                            </span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r">
                            <span class="ss-k" style="display:flex; align-items:center; gap:6px;">
                                <span
                                    style="width:7px; height:7px; border-radius:50%; background:#4ADE80; display:inline-block; flex-shrink:0;"></span>
                                Active
                            </span>
                            <span class="ss-v">{{ $stats['active'] }}</span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r">
                            <span class="ss-k" style="display:flex; align-items:center; gap:6px;">
                                <span
                                    style="width:7px; height:7px; border-radius:50%; background:#444; display:inline-block; flex-shrink:0;"></span>
                                Completed
                            </span>
                            <span class="ss-v">{{ $stats['completed'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- Contact Forms Status breakdown --}}
                <div class="cc">
                    <div class="cc-head">
                        <span class="cc-title">Contact Form Status</span>
                        <span
                            style="display:flex; align-items:center; gap:6px; font-size:12px; color:#4ADE80; font-weight:500;">
                            <span class="online-dot"></span> Live
                        </span>
                    </div>
                    <div style="padding:18px 20px; display:flex; flex-direction:column; gap:13px;">
                        <div class="ss-r">
                            <span class="ss-k">Total</span>
                            <span class="ss-v">{{ $contactStats['total'] }}</span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r">
                            <span class="ss-k" style="display:flex; align-items:center; gap:6px;">
                                <span
                                    style="width:7px; height:7px; border-radius:50%; background:#FBBF24; display:inline-block; flex-shrink:0;"></span>
                                Pending
                            </span>
                            <span class="ss-v" style="{{ $contactStats['pending'] > 0 ? 'color:#FBBF24;' : '' }}">
                                {{ $contactStats['pending'] }}
                            </span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r">
                            <span class="ss-k" style="display:flex; align-items:center; gap:6px;">
                                <span
                                    style="width:7px; height:7px; border-radius:50%; background:#4ADE80; display:inline-block; flex-shrink:0;"></span>
                                Active
                            </span>
                            <span class="ss-v">{{ $contactStats['active'] }}</span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r">
                            <span class="ss-k" style="display:flex; align-items:center; gap:6px;">
                                <span
                                    style="width:7px; height:7px; border-radius:50%; background:#444; display:inline-block; flex-shrink:0;"></span>
                                Completed
                            </span>
                            <span class="ss-v">{{ $contactStats['completed'] }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        (function() {
            /**
             * Copy email to clipboard — works in all modern browsers.
             * Falls back to execCommand for older / non-https contexts.
             */
            function copyToClipboard(text, btn) {
                var iconCopy = btn.querySelector('.icon-copy');
                var iconCheck = btn.querySelector('.icon-check');

                function onSuccess() {
                    btn.classList.add('copied');
                    btn.setAttribute('data-tip', 'Copied!');
                    if (iconCopy) iconCopy.style.display = 'none';
                    if (iconCheck) iconCheck.style.display = '';
                    setTimeout(function() {
                        btn.classList.remove('copied');
                        btn.setAttribute('data-tip', 'Copy email');
                        if (iconCopy) iconCopy.style.display = '';
                        if (iconCheck) iconCheck.style.display = 'none';
                    }, 2000);
                }

                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(onSuccess).catch(function() {
                        fallbackCopy(text, onSuccess);
                    });
                } else {
                    fallbackCopy(text, onSuccess);
                }
            }

            function fallbackCopy(text, callback) {
                var ta = document.createElement('textarea');
                ta.value = text;
                ta.style.cssText = 'position:fixed;top:-9999px;left:-9999px;opacity:0;';
                document.body.appendChild(ta);
                ta.focus();
                ta.select();
                try {
                    document.execCommand('copy');
                    callback();
                } catch (e) {
                    console.warn('Copy failed:', e);
                }
                document.body.removeChild(ta);
            }

            /* Event delegation — works for all copy buttons on the page */
            document.addEventListener('click', function(e) {
                var btn = e.target.closest('.copy-email-btn');
                if (!btn) return;
                e.preventDefault();
                e.stopPropagation();
                var email = btn.getAttribute('data-email');
                if (email) copyToClipboard(email, btn);
            });
        })();
    </script>
@endpush
