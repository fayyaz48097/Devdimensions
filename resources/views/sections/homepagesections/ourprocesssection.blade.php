{{-- ============================================================
     Our Approach / Process Section
     SAVE AS: resources/views/sections/homepagesections/ourprocesssection.blade.php

     Section-level active/inactive: hides entire section when inactive.
     Steps (max 4): icon, title, description all from DB.
     Arc SVG positions and styling are IDENTICAL to the original.
============================================================ --}}

@php
    use App\Models\ProcessSectionSetting;
    use App\Models\ProcessStep;

    $procSetting = ProcessSectionSetting::instance();
    $procSteps = ProcessStep::published()->orderBy('sort_order')->take(4)->get();

    // Fixed arc positions — identical to original hardcoded values
    $arcPositions = [
        ['cx' => '157', 'cy' => '345', 'left' => '3.28%', 'top' => '51.97%'],
        ['cx' => '499', 'cy' => '137', 'left' => '30%', 'top' => '24.6%'],
        ['cx' => '805', 'cy' => '137', 'left' => '53.9%', 'top' => '24.6%'],
        ['cx' => '1145', 'cy' => '345', 'left' => '80.47%', 'top' => '51.97%'],
    ];
@endphp

@if ($procSetting->isActive() && $procSteps->isNotEmpty())

    <section class="relative w-full process-section" style="padding: 80px 0 0 0; overflow: hidden;">

        {{-- ── Radial red glow ── --}}
        <div class="absolute inset-0 pointer-events-none" style="z-index:0; overflow:hidden;">
            <div
                style="position:absolute; left:100%; top:55%; transform:translate(-50%,-50%);
            width:1200px; height:1000px; border-radius:50%;
            background: radial-gradient(ellipse at center, rgba(140,18,8,0.30) 0%, rgba(90,8,2,0.12) 40%, transparent 70%);
            filter:blur(60px);">
            </div>
        </div>
        <div class="absolute inset-0 pointer-events-none" style="z-index:0; overflow:hidden;">
            <div
                style="position:absolute; left:0%; top:55%; transform:translate(-50%,-50%);
            width:1200px; height:1000px; border-radius:50%;
            background: radial-gradient(ellipse at center, rgba(140,18,8,0.30) 0%, rgba(90,8,2,0.12) 40%, transparent 70%);
            filter:blur(60px);">
            </div>
        </div>

        {{-- ── Title ── --}}
        <div class="relative text-center" style="z-index:2; padding-bottom:10px;">
            <h2 class="hidden m-0 font-semibold text-white md:block"
                style="font-size: clamp(32px, 3.5vw, 52px); letter-spacing: -0.5px; line-height: 1.1;">
                {{ $procSetting->heading }}
            </h2>
            <h2 class="m-0 text-white md:hidden"
                style="font-size: clamp(32px, 3.5vw, 52px); letter-spacing: -0.5px; line-height: 1.1;">
                {{ $procSetting->heading }}
            </h2>
        </div>

        {{-- ═══════════════════════════════════════════════════
         DESKTOP (lg+) — SVG arc + positioned content boxes
    ═══════════════════════════════════════════════════ --}}
        <div class="relative hidden mx-auto lg:block"
            style="max-width:1280px; z-index:2; overflow:hidden; aspect-ratio: 1280/760;">

            {{-- SVG: arc + teal number circles ──────────────────────── --}}
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1280 760" preserveAspectRatio="xMidYMid meet"
                xmlns="http://www.w3.org/2000/svg" style="overflow:visible; pointer-events:none; height:100%;">

                <defs>
                    <linearGradient id="arcGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#3A0000" stop-opacity="0" />
                        <stop offset="8%" stop-color="#8B1000" stop-opacity="0.5" />
                        <stop offset="22%" stop-color="#BB1E00" stop-opacity="0.95" />
                        <stop offset="50%" stop-color="#BB1E00" stop-opacity="0.95" />
                        <stop offset="78%" stop-color="#BB1E00" stop-opacity="0.95" />
                        <stop offset="92%" stop-color="#8B1000" stop-opacity="0.5" />
                        <stop offset="100%" stop-color="#3A0000" stop-opacity="0" />
                    </linearGradient>

                    {{-- Clip so the arc never renders outside the viewBox --}}
                    <clipPath id="arcClip">
                        <rect x="0" y="0" width="1280" height="760" />
                    </clipPath>
                </defs>

                {{-- Arc: centre=(640,754) radius=633 — clipped to viewBox --}}
                <path d="M 7 754 A 633 633 0 0 1 1273 754" fill="none" stroke="url(#arcGrad)" stroke-width="1.5"
                    clip-path="url(#arcClip)" />

                {{-- Number circles — one per step, at fixed arc positions ── --}}
                @foreach ($procSteps as $i => $step)
                    @php $pos = $arcPositions[$i]; @endphp
                    <circle cx="{{ $pos['cx'] }}" cy="{{ $pos['cy'] }}" r="34" fill="#02212D"
                        class="proc-circle" />
                    <text x="{{ $pos['cx'] }}" y="{{ (int) $pos['cy'] + 1 }}" text-anchor="middle"
                        dominant-baseline="middle" fill="#fff" font-size="26"
                        font-family="Gilroy-SemiBold, sans-serif" font-weight="600">
                        {{ $i + 1 }}
                    </text>
                @endforeach
            </svg>

            {{-- Centre logo watermark ─────────────────────────────────── --}}
            <div class="absolute pointer-events-none"
                style="left:50%; bottom:19.74%; transform:translateX(-50%); z-index:1; opacity:0.50;">
                <img src="{{ asset('assets/images/logo-big.svg') }}" alt=""
                    style="width:280px; height:auto; display:block;">
            </div>

            {{-- Step content boxes ──────────────────────────────────────── --}}
            @foreach ($procSteps as $i => $step)
                @php $pos = $arcPositions[$i]; @endphp
                <div class="absolute text-center proc-box"
                    style="left:{{ $pos['left'] }}; top:{{ $pos['top'] }}; width:17.97%;"
                    data-step="{{ $i + 1 }}">

                    <div class="proc-icon-wrap">
                        @if ($step->iconUrl())
                            <img src="{{ $step->iconUrl() }}" alt="{{ $step->title }}" class="mx-auto proc-icon">
                        @endif
                    </div>

                    <h6 class="proc-title">{{ $step->title }}</h6>
                    <p class="proc-desc">{{ $step->description }}</p>

                </div>
            @endforeach

        </div>{{-- /desktop --}}

        {{-- ═══════════════════════════════════════════════════
         MOBILE (<lg) — vertical numbered steps
    ═══════════════════════════════════════════════════ --}}
        <div class="relative block px-5 py-10 lg:hidden" style="z-index:2;">

            {{-- Vertical red connecting line --}}
            <div class="absolute"
                style="left:41px; top:40px; bottom:40px; width:1px;
                background:linear-gradient(180deg,
                    rgba(181,30,23,0.0) 0%,
                    rgba(181,30,23,0.6) 25%,
                    rgba(181,30,23,0.6) 75%,
                    rgba(181,30,23,0.0) 100%);
                z-index:0;">
            </div>

            @foreach ($procSteps as $i => $step)
                <div class="mob-proc-step relative flex items-start gap-4 {{ !$loop->last ? 'mb-10' : '' }}"
                    style="z-index:1;">

                    {{-- Teal circle --}}
                    <div class="relative z-10 flex items-center justify-center flex-shrink-0 rounded-full"
                        style="width:54px; height:54px; min-width:54px;
                        background:#02212D;
                        transition: background 0.3s ease, transform 0.3s ease;
                        box-shadow: 0 0 0 0 rgba(181,30,23,0);">
                        <span style="font-size:22px; color:#fff; font-weight:600; line-height:1;">
                            {{ $i + 1 }}
                        </span>
                    </div>

                    {{-- Content --}}
                    <div class="pt-0.5">
                        @if ($step->iconUrl())
                            <img src="{{ $step->iconUrl() }}" alt="{{ $step->title }}" class="mb-2 mob-proc-icon"
                                style="width:42px; height:42px; object-fit:contain;
                                transition: transform 0.35s cubic-bezier(0.25,0.46,0.45,0.94);">
                        @endif
                        <h6
                            style="font-size:17px; color:#fff; letter-spacing:-0.3px;
                               line-height:1.3; margin:0 0 8px 0;">
                            {{ $step->title }}
                        </h6>
                        <p style="color:#8B8B8B; font-size:14px; line-height:1.65; margin:0;">
                            {{ $step->description }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>{{-- /mobile --}}

    </section>

    {{-- ── Styles — identical to original ── --}}
    <style>
        .proc-box {
            z-index: 3;
            cursor: default;
        }

        .proc-icon-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: clamp(6px, 1.1vw, 14px);
            height: clamp(32px, 4.375vw, 56px);
        }

        .proc-icon {
            width: clamp(28px, 3.75vw, 48px);
            height: clamp(28px, 3.75vw, 48px);
            object-fit: contain;
            display: block;
            transition:
                transform 0.45s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                filter 0.35s ease;
            transform-origin: center bottom;
        }

        .proc-title {
            font-size: clamp(12px, 1.4vw, 18px);
            color: #fff;
            letter-spacing: -0.36px;
            line-height: 1.3;
            margin: 0 0 10px 0;
            transition: color 0.3s ease;
        }

        .proc-desc {
            color: #8B8B8B;
            font-size: clamp(10px, 1.05vw, 13.5px);
            line-height: 1.7;
            margin: 0;
            transition: color 0.3s ease;
        }

        .proc-circle {
            transition: fill 0.3s ease;
        }
    </style>

@endif {{-- /section active check --}}
