{{--
    SAVE AS: resources/views/pages/admin/consultations/index.blade.php
--}}
@extends('admin.admin')

@section('title', 'Consultations')

@push('styles')
    <style>
        /* ── Page shell ── */
        .consult-wrap {
            padding: 28px;
        }

        /* ── Page header ── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 28px;
        }

        .page-header h1 {
            font-size: 20px;
            font-weight: 700;
            color: #E0E0E0;
            letter-spacing: -0.4px;
            margin: 0;
        }

        .page-header p {
            font-size: 12.5px;
            color: #4A4A4A;
            margin: 4px 0 0;
        }

        /* ── Filter tabs ── */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .filter-tab {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 500;
            color: #555;
            background: transparent;
            border: 1px solid transparent;
            text-decoration: none;
            transition: all 0.18s ease;
            cursor: pointer;
        }

        .filter-tab:hover {
            color: #C0C0C0;
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(255, 255, 255, 0.08);
        }

        .filter-tab.active {
            color: #E0E0E0;
            background: rgba(252, 63, 55, 0.08);
            border-color: rgba(252, 63, 55, 0.22);
        }

        .filter-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 20px;
            height: 18px;
            padding: 0 5px;
            border-radius: 4px;
            font-size: 10.5px;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.07);
            color: #888;
        }

        .filter-tab.active .filter-count {
            background: rgba(252, 63, 55, 0.18);
            color: #FC3F37;
        }

        /* ── Table card ── */
        .table-card {
            background: #0D0D0D;
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 14px;
            overflow: hidden;
        }

        .table-card-head {
            padding: 16px 22px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }

        .table-card-title {
            font-size: 13.5px;
            font-weight: 600;
            color: #C8C8C8;
        }

        /* Search input */
        .tbl-search {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 8px;
            padding: 6px 12px;
        }

        .tbl-search input {
            background: transparent;
            border: none;
            outline: none;
            color: #D0D0D0;
            font-size: 12.5px;
            width: 180px;
        }

        .tbl-search input::placeholder {
            color: #444;
        }

        /* ── Data table ── */
        .dt {
            width: 100%;
            border-collapse: collapse;
        }

        .dt thead th {
            padding: 11px 18px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            color: #3A3A3A;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            white-space: nowrap;
        }

        .dt tbody tr {
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            transition: background 0.15s ease;
        }

        .dt tbody tr:last-child {
            border-bottom: none;
        }

        .dt tbody tr:hover {
            background: rgba(255, 255, 255, 0.025);
        }

        .dt tbody td {
            padding: 15px 18px;
            font-size: 13px;
            color: #9A9A9A;
            vertical-align: middle;
        }

        /* Name col */
        .td-name {
            font-weight: 600;
            color: #D8D8D8 !important;
            white-space: nowrap;
        }

        /* Email col with copy button */
        .email-cell {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .copy-email-btn {
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 26px;
            height: 26px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.07);
            color: #555;
            cursor: pointer;
            transition: all 0.18s ease;
            position: relative;
        }

        .copy-email-btn:hover {
            background: rgba(252, 63, 55, 0.10);
            border-color: rgba(252, 63, 55, 0.22);
            color: #FC3F37;
        }

        .copy-email-btn.copied {
            background: rgba(74, 222, 128, 0.10);
            border-color: rgba(74, 222, 128, 0.25);
            color: #4ADE80;
        }

        /* Status pills */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.3px;
            white-space: nowrap;
        }

        .pill::before {
            content: '';
            display: inline-block;
            width: 6px;
            height: 6px;
            border-radius: 50%;
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
            background: rgba(100, 116, 139, 0.12);
            color: #94A3B8;
            border: 1px solid rgba(100, 116, 139, 0.22);
        }

        .pill-completed::before {
            background: #94A3B8;
        }

        /* Action button */
        .btn-view {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 500;
            color: #555;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            text-decoration: none;
            transition: all 0.18s ease;
            white-space: nowrap;
        }

        .btn-view:hover {
            color: #E0E0E0;
            background: rgba(252, 63, 55, 0.08);
            border-color: rgba(252, 63, 55, 0.22);
        }

        /* ── Pagination ── */
        .pag-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 22px;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            flex-wrap: wrap;
            gap: 10px;
        }

        .pag-info {
            font-size: 12px;
            color: #3A3A3A;
        }

        /* ── Empty state ── */
        .empty-state {
            text-align: center;
            padding: 60px 24px;
        }

        .empty-state svg {
            opacity: 0.2;
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-size: 15px;
            color: #444;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: 13px;
            color: #2E2E2E;
        }

        /* Success flash */
        .flash-success {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            background: rgba(74, 222, 128, 0.08);
            border: 1px solid rgba(74, 222, 128, 0.20);
            border-radius: 10px;
            font-size: 13px;
            color: #4ADE80;
            margin-bottom: 20px;
        }
    </style>
@endpush

@section('content')
    <div class="consult-wrap">

        {{-- Page header --}}
        <div class="page-header">
            <div>
                <h1>Consultations</h1>
                <p>Manage and respond to incoming consultation requests.</p>
            </div>
        </div>

        {{-- Flash success --}}
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

        {{-- Filter tabs --}}
        <div class="filter-bar">
            <a href="{{ route('admin.consultations.index') }}" class="filter-tab {{ !$status ? 'active' : '' }}">
                All <span class="filter-count">{{ $counts['all'] }}</span>
            </a>
            <a href="{{ route('admin.consultations.index', ['status' => 'pending']) }}"
                class="filter-tab {{ $status === 'pending' ? 'active' : '' }}">
                Pending <span class="filter-count">{{ $counts['pending'] }}</span>
            </a>
            <a href="{{ route('admin.consultations.index', ['status' => 'active']) }}"
                class="filter-tab {{ $status === 'active' ? 'active' : '' }}">
                Active <span class="filter-count">{{ $counts['active'] }}</span>
            </a>
            <a href="{{ route('admin.consultations.index', ['status' => 'completed']) }}"
                class="filter-tab {{ $status === 'completed' ? 'active' : '' }}">
                Completed <span class="filter-count">{{ $counts['completed'] }}</span>
            </a>
        </div>

        {{-- Table card --}}
        <div class="table-card">

            {{-- Card head --}}
            <div class="table-card-head">
                <span class="table-card-title">
                    {{ $status ? ucfirst($status) . ' Consultations' : 'All Consultations' }}
                </span>
                <div class="tbl-search">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#444" stroke-width="2"
                        stroke-linecap="round">
                        <circle cx="11" cy="11" r="8" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                    <input type="text" id="tbl-search-input" placeholder="Search name or email…">
                </div>
            </div>

            {{-- Table --}}
            @if ($consultations->isEmpty())
                <div class="empty-state">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="1.5"
                        stroke-linecap="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                    </svg>
                    <h3>No consultations found</h3>
                    <p>Submissions will appear here once users fill the form.</p>
                </div>
            @else
                <div style="overflow-x:auto;">
                    <table class="dt" id="consult-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($consultations as $c)
                                <tr data-name="{{ strtolower($c->name) }}" data-email="{{ strtolower($c->email) }}">
                                    <td style="color:#333; font-size:12px;">{{ $c->id }}</td>
                                    <td class="td-name">{{ $c->name }}</td>
                                    <td>
                                        <div class="email-cell">
                                            <span>{{ $c->email }}</span>
                                            <button type="button" class="copy-email-btn" data-email="{{ $c->email }}"
                                                title="Copy email address" onclick="copyEmail(this)">
                                                <svg class="icon-copy" width="12" height="12" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="9" y="9" width="13" height="13" rx="2" />
                                                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
                                                </svg>
                                                <svg class="icon-check" width="12" height="12" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2.8"
                                                    stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                                                    <polyline points="20 6 9 17 4 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td style="max-width:220px;">
                                        <span
                                            style="display:block; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; max-width:220px;"
                                            title="{{ $c->message }}">
                                            {{ $c->message }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="pill pill-{{ $c->status }}">
                                            {{ ucfirst($c->status) }}
                                        </span>
                                    </td>
                                    <td style="white-space:nowrap; color:#444;">
                                        {{ $c->created_at->format('M d, Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.consultations.show', $c) }}" class="btn-view">
                                            View
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                                <polyline points="12 5 19 12 12 19" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($consultations->hasPages())
                    <div class="pag-wrap">
                        <span class="pag-info">
                            Showing {{ $consultations->firstItem() }}–{{ $consultations->lastItem() }} of
                            {{ $consultations->total() }}
                        </span>
                        {{ $consultations->links() }}
                    </div>
                @endif
            @endif

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        /* ── Copy email to clipboard ──
               Uses modern Clipboard API with execCommand fallback
               so it works on HTTP (local dev) and older browsers. */
        function copyEmail(btn) {
            var email = btn.getAttribute('data-email');
            var iconCopy = btn.querySelector('.icon-copy');
            var iconCheck = btn.querySelector('.icon-check');

            function onSuccess() {
                btn.classList.add('copied');
                if (iconCopy) iconCopy.style.display = 'none';
                if (iconCheck) iconCheck.style.display = '';
                setTimeout(function() {
                    btn.classList.remove('copied');
                    if (iconCopy) iconCopy.style.display = '';
                    if (iconCheck) iconCheck.style.display = 'none';
                }, 2000);
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

        /* ── Client-side search filter ── */
        (function() {
            var input = document.getElementById('tbl-search-input');
            var rows = document.querySelectorAll('#consult-table tbody tr');

            if (!input) return;

            input.addEventListener('input', function() {
                var q = this.value.toLowerCase().trim();
                rows.forEach(function(row) {
                    var name = row.getAttribute('data-name') || '';
                    var email = row.getAttribute('data-email') || '';
                    row.style.display = (name.includes(q) || email.includes(q)) ? '' : 'none';
                });
            });
        })();
    </script>
@endpush
