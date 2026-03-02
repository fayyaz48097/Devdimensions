{{--
    SAVE AS: resources/views/pages/admin/sections/home/cta_admin.blade.php
--}}

@extends('admin.admin')
@section('title', 'Home › CTA Section')
@section('page-title', 'CTA Section')

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

        /* CTA uses a single centred card layout — no left/right split needed */
        .cta-grid {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 20px;
            align-items: start;
        }

        @media(max-width:900px) {
            .cta-grid {
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

        /* Live preview box */
        .cta-preview {
            border-radius: 16px;
            padding: 36px 28px;
            text-align: center;
            background: linear-gradient(135deg, #6b0b07 0%, #8c1009 20%, #B51E17 50%, #8c1009 80%, #6b0b07 100%);
            position: relative;
            overflow: hidden;
        }

        .cta-preview::before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 12px;
            background: rgba(255, 255, 255, .06);
            top: -20px;
            left: 30px;
            transform: rotate(-8deg);
            pointer-events: none;
        }

        .cta-preview::after {
            content: "";
            position: absolute;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .06);
            top: 10px;
            right: 20px;
            pointer-events: none;
        }

        .cta-preview h4 {
            font-size: 18px;
            color: #fff;
            line-height: 1.4;
            margin: 0 0 20px;
            position: relative;
            z-index: 2;
        }

        .cta-preview-btns {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
        }

        .cta-preview-btn {
            padding: 8px 18px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
        }

        .cta-preview-btn.solid {
            background: #fff;
            color: #B51E17;
            border: none;
        }

        .cta-preview-btn.outline {
            background: transparent;
            color: #fff;
            border: 1.5px solid #fff;
        }

        .divider {
            height: 1px;
            background: rgba(255, 255, 255, .05);
            margin: 6px 0 16px;
        }

        .field-group-label {
            font-size: 11px;
            font-weight: 700;
            color: #3A3A3A;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 12px;
            margin-top: 4px;
        }

        .note-banner {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 0;
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
            <span class="sep">›</span><span class="current">CTA Section</span>
        </div>

        {{-- Page header + section visibility quick-toggle --}}
        <div class="sec-header">
            <div>
                <h1>CTA Section</h1>
                <p>Manage the call-to-action banner — heading and two buttons.</p>
            </div>
            <form method="POST" action="{{ route('admin.sections.home.cta.settings.update') }}">
                @csrf
                <input type="hidden" name="heading" value="{{ $setting->heading }}">
                <input type="hidden" name="btn_primary_label" value="{{ $setting->btn_primary_label }}">
                <input type="hidden" name="btn_primary_url" value="{{ $setting->btn_primary_url }}">
                <input type="hidden" name="btn_secondary_label" value="{{ $setting->btn_secondary_label }}">
                <input type="hidden" name="btn_secondary_url" value="{{ $setting->btn_secondary_url }}">
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

        <div class="cta-grid">

            {{-- ════════ LEFT: settings form ════════ --}}
            <div>
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
                            <div class="fc-title">CTA Settings</div>
                        </div>
                    </div>
                    <div style="padding:20px;">
                        <form method="POST" action="{{ route('admin.sections.home.cta.settings.update') }}"
                            id="cta-form">
                            @csrf

                            {{-- Heading --}}
                            <div class="field">
                                <label>Heading <span class="req">*</span></label>
                                <textarea name="heading" id="cta-heading" class="fi {{ $errors->has('heading') ? 'is-error' : '' }}" required
                                    maxlength="400" style="min-height:80px;" oninput="updatePreview()" placeholder="e.g. Connect With The Top 3%…">{{ old('heading', $setting->heading) }}</textarea>
                                @error('heading')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="divider"></div>

                            {{-- Primary button --}}
                            <div class="field-group-label">Primary Button (solid white)</div>

                            <div class="field">
                                <label>Label <span class="req">*</span></label>
                                <input type="text" name="btn_primary_label" id="cta-btn1-label"
                                    class="fi {{ $errors->has('btn_primary_label') ? 'is-error' : '' }}" required
                                    maxlength="100" value="{{ old('btn_primary_label', $setting->btn_primary_label) }}"
                                    oninput="updatePreview()" placeholder="e.g. Hire Engineers">
                                @error('btn_primary_label')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>URL <span class="req">*</span></label>
                                <input type="text" name="btn_primary_url"
                                    class="fi {{ $errors->has('btn_primary_url') ? 'is-error' : '' }}" required
                                    maxlength="255" value="{{ old('btn_primary_url', $setting->btn_primary_url) }}"
                                    placeholder="/contact-us">
                                @error('btn_primary_url')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="divider"></div>

                            {{-- Secondary button --}}
                            <div class="field-group-label">Secondary Button (outline white)</div>

                            <div class="field">
                                <label>Label <span class="req">*</span></label>
                                <input type="text" name="btn_secondary_label" id="cta-btn2-label"
                                    class="fi {{ $errors->has('btn_secondary_label') ? 'is-error' : '' }}" required
                                    maxlength="100"
                                    value="{{ old('btn_secondary_label', $setting->btn_secondary_label) }}"
                                    oninput="updatePreview()" placeholder="e.g. Develop With Us">
                                @error('btn_secondary_label')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field">
                                <label>URL <span class="req">*</span></label>
                                <input type="text" name="btn_secondary_url"
                                    class="fi {{ $errors->has('btn_secondary_url') ? 'is-error' : '' }}" required
                                    maxlength="255" value="{{ old('btn_secondary_url', $setting->btn_secondary_url) }}"
                                    placeholder="/contact-us">
                                @error('btn_secondary_url')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="divider"></div>

                            <div class="field">
                                <label>Section Visibility <span class="req">*</span></label>
                                <select name="status" class="fi fi-select">
                                    <option value="active" {{ $setting->status === 'active' ? 'selected' : '' }}>Active
                                        — visible on site</option>
                                    <option value="inactive" {{ $setting->status === 'inactive' ? 'selected' : '' }}>
                                        Inactive — hidden from site</option>
                                </select>
                            </div>

                            <div style="margin-top:22px;">
                                <button type="submit" class="btn-primary">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                        <polyline points="17 21 17 13 7 13 7 21" />
                                        <polyline points="7 3 7 8 15 8" />
                                    </svg>
                                    Save CTA
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>{{-- /left --}}

            {{-- ════════ RIGHT: live preview + tips ════════ --}}
            <div>

                {{-- Live preview --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-head-left">
                            <div class="fc-head-icon">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#FC3F37"
                                    stroke-width="2" stroke-linecap="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </div>
                            <div class="fc-title">Live Preview</div>
                        </div>
                    </div>
                    <div style="padding:16px;">
                        <div class="cta-preview">
                            <h4 id="preview-heading">{{ $setting->heading }}</h4>
                            <div class="cta-preview-btns">
                                <span class="cta-preview-btn solid"
                                    id="preview-btn1">{{ $setting->btn_primary_label }}</span>
                                <span class="cta-preview-btn outline"
                                    id="preview-btn2">{{ $setting->btn_secondary_label }}</span>
                            </div>
                        </div>
                        <p style="font-size:11px; color:#2A2A2A; text-align:center; margin-top:10px;">Updates as you type
                        </p>
                    </div>
                </div>

                {{-- Tips --}}
                <div class="fc">
                    <div class="fc-head">
                        <div class="fc-title" style="color:#3A3A3A;">Tips</div>
                    </div>
                    <div
                        style="padding:16px 20px; display:flex; flex-direction:column; gap:9px; font-size:12.5px; color:#333; line-height:1.5;">
                        <p style="margin:0">• The heading supports <strong style="color:#555;">plain text only</strong> —
                            keep it concise and punchy.</p>
                        <p style="margin:0">• Button URLs can be <strong style="color:#555;">relative</strong> (e.g.
                            <em>/contact-us</em>) or full URLs.</p>
                        <p style="margin:0">• Use the header toggle to <strong style="color:#555;">hide the entire
                                section</strong> instantly.</p>
                    </div>
                </div>

            </div>{{-- /right --}}

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        function updatePreview() {
            var h = document.getElementById('cta-heading').value;
            var b1 = document.getElementById('cta-btn1-label').value;
            var b2 = document.getElementById('cta-btn2-label').value;
            document.getElementById('preview-heading').textContent = h || '—';
            document.getElementById('preview-btn1').textContent = b1 || '—';
            document.getElementById('preview-btn2').textContent = b2 || '—';
        }
    </script>
@endpush
