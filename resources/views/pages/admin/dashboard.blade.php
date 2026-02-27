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

        /* Welcome */
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
            color: #000;
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

        /* Stats 4-col */
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

        /* Bottom layout */
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

        /* Card shell */
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

        /* Table */
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
            white-space: nowrap;
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
        }

        /* Pills */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
        }

        .pill::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .pill-new {
            background: rgba(74, 222, 128, 0.08);
            color: #4ADE80;
            border: 1px solid rgba(74, 222, 128, 0.18);
        }

        .pill-new::before {
            background: #4ADE80;
        }

        .pill-pending {
            background: rgba(251, 191, 36, 0.08);
            color: #FBBF24;
            border: 1px solid rgba(251, 191, 36, 0.18);
        }

        .pill-pending::before {
            background: #FBBF24;
        }

        .pill-read {
            background: rgba(255, 255, 255, 0.04);
            color: #444;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .pill-read::before {
            background: #444;
        }

        /* Side col */
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

        {{-- Welcome --}}
        <div class="dash-welcome">
            <div>
                <h1>Good morning, Admin 👋</h1>
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

        {{-- Stats grid --}}
        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon" style="background:rgba(181,30,23,0.12);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                        stroke-width="1.8" stroke-linecap="round">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
                    </svg>
                </div>
                <div class="stat-num">48</div>
                <div class="stat-lbl">Consultations</div>
                <div class="stat-trend t-up">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <polyline points="18 15 12 9 6 15" />
                    </svg>
                    +12% this month
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background:rgba(255,255,255,0.05);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="1.8"
                        stroke-linecap="round">
                        <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                    </svg>
                </div>
                <div class="stat-num">14</div>
                <div class="stat-lbl">Case Studies</div>
                <div class="stat-trend t-up">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <polyline points="18 15 12 9 6 15" />
                    </svg>
                    +2 this month
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background:rgba(255,255,255,0.05);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#888" stroke-width="1.8"
                        stroke-linecap="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                </div>
                <div class="stat-num">27</div>
                <div class="stat-lbl">Testimonials</div>
                <div class="stat-trend t-up">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <polyline points="18 15 12 9 6 15" />
                    </svg>
                    +4 this month
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background:rgba(251,191,36,0.10);">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#FBBF24"
                        stroke-width="1.8" stroke-linecap="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                        <polyline points="22,6 12,13 2,6" />
                    </svg>
                </div>
                <div class="stat-num">9</div>
                <div class="stat-lbl">Unread Messages</div>
                <div class="stat-trend t-wrn">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    Needs attention
                </div>
            </div>

        </div>

        {{-- Bottom --}}
        <div class="dash-bottom">

            {{-- Consultations table --}}
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
                            @php $leads = [['name' => 'Michael Torres', 'email' => 'm.torres@techcorp.io', 'date' => 'Feb 27', 'status' => 'new'], ['name' => 'Sarah Johnson', 'email' => 's.johnson@startup.co', 'date' => 'Feb 26', 'status' => 'pending'], ['name' => 'David Chen', 'email' => 'dchen@enterprise.com', 'date' => 'Feb 25', 'status' => 'read'], ['name' => 'Emma Williams', 'email' => 'emma@digitalagency.io', 'date' => 'Feb 24', 'status' => 'new'], ['name' => 'James Parker', 'email' => 'jparker@ventures.co', 'date' => 'Feb 23', 'status' => 'read']]; @endphp
                            @foreach ($leads as $l)
                                <tr>
                                    <td class="td-name">{{ $l['name'] }}</td>
                                    <td>{{ $l['email'] }}</td>
                                    <td>{{ $l['date'] }}</td>
                                    <td><span class="pill pill-{{ $l['status'] }}">{{ ucfirst($l['status']) }}</span></td>
                                    <td><a href="#"
                                            style="font-size:12px;color:#333;text-decoration:none;transition:color 0.2s;"
                                            onmouseover="this.style.color='#FC3F37'"
                                            onmouseout="this.style.color='#333'">View →</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Right sidebar --}}
            <div class="side-col">

                <div class="cc">
                    <div class="cc-head"><span class="cc-title">Quick Actions</span></div>
                    <div style="padding:14px;display:flex;flex-direction:column;gap:8px;">
                        <a href="{{ route('admin.casestudies.create') }}" class="qa">
                            <span class="qa-ic"><svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z" />
                                    <line x1="12" y1="11" x2="12" y2="17" />
                                    <line x1="9" y1="14" x2="15" y2="14" />
                                </svg></span>
                            <span class="qa-lbl">New Case Study</span>
                        </a>
                        <a href="{{ route('admin.testimonials.create') }}" class="qa">
                            <span class="qa-ic"><svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    <line x1="9" y1="10" x2="15" y2="10" />
                                    <line x1="9" y1="14" x2="13" y2="14" />
                                </svg></span>
                            <span class="qa-lbl">Add Testimonial</span>
                        </a>
                        <a href="{{ route('admin.partners.index') }}" class="qa">
                            <span class="qa-ic"><svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg></span>
                            <span class="qa-lbl">Manage Partners</span>
                        </a>
                        <a href="{{ route('admin.settings.general') }}" class="qa">
                            <span class="qa-ic"><svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="3" />
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                                </svg></span>
                            <span class="qa-lbl">Site Settings</span>
                        </a>
                    </div>
                </div>

                <div class="cc">
                    <div class="cc-head">
                        <span class="cc-title">Site Status</span>
                        <span
                            style="display:flex;align-items:center;gap:6px;font-size:12px;color:#4ADE80;font-weight:500;">
                            <span class="online-dot"></span> Online
                        </span>
                    </div>
                    <div style="padding:18px 20px;display:flex;flex-direction:column;gap:13px;">
                        <div class="ss-r"><span class="ss-k">Pages</span><span class="ss-v">4 Published</span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r"><span class="ss-k">Partners</span><span class="ss-v">6 Active</span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r"><span class="ss-k">Testimonials</span><span class="ss-v">27 Live</span>
                        </div>
                        <div class="ss-div"></div>
                        <div class="ss-r"><span class="ss-k">Last Updated</span><span class="ss-v">Today</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
