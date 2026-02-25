{{-- ============================================================
     Our Approach / Process Section
     Arc: centre=(640,754) radius=633
     viewBox 1280×760 — section height 760px on desktop
     Number circles (from screenshot pixel analysis):
       1 → (157, 345)   left-mid
       2 → (499, 137)   upper-left
       3 → (805, 137)   upper-right
       4 → (1145, 345)  right-mid
     Content boxes below each circle: top = circle_cy + 33 + 16
============================================================ --}}

<section class="relative w-full process-section" style="padding: 80px 0 0 0; overflow: visible;">

    {{-- ── Radial red glow ── --}}
    <div class="absolute inset-0 pointer-events-none" style="z-index:0; overflow:hidden;">
        <div
            style="
            position:absolute;
            left:100%; top:55%;
            transform:translate(-50%,-50%);
            width:1200px; height:1000px;
            border-radius:50%;
            background: radial-gradient(ellipse at center, rgba(140,18,8,0.30) 0%, rgba(90,8,2,0.12) 40%, transparent 70%);
            filter:blur(60px);
        ">
        </div>
    </div>
    <div class="absolute inset-0 pointer-events-none" style="z-index:0; overflow:hidden;">
        <div
            style="
            position:absolute;
            left:0%; top:55%;
            transform:translate(-50%,-50%);
            width:1200px; height:1000px;
            border-radius:50%;
            background: radial-gradient(ellipse at center, rgba(140,18,8,0.30) 0%, rgba(90,8,2,0.12) 40%, transparent 70%);
            filter:blur(60px);
        ">
        </div>
    </div>

    {{-- ── Title ── --}}
    <div class="relative text-center" style="z-index:2; padding-bottom:10px;">
        <h2 class="m-0 text-white"
            style="font-family:'Gilroy-SemiBold',sans-serif;
                   font-size: clamp(32px, 3.5vw, 52px);
                   letter-spacing: -0.5px;
                   line-height: 1.1;">
            Our Approach
        </h2>
    </div>

    {{-- ═══════════════════════════════════════════════════
         DESKTOP (md+)
         SVG viewBox 1280×760 — circles sit on the arc
    ═══════════════════════════════════════════════════ --}}
    <div class="relative hidden mx-auto md:block" style="max-width:1280px; height:760px; z-index:2; overflow:visible;">

        {{-- SVG draws arc + teal number circles --}}
        <svg class="absolute inset-0 w-full" viewBox="0 0 1280 760" preserveAspectRatio="xMidYMid meet"
            xmlns="http://www.w3.org/2000/svg" style="overflow:visible; pointer-events:none; height:100%;">

            <defs>
                <linearGradient id="arcGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#3A0000" stop-opacity="0" />
                    <stop offset="12%" stop-color="#8B1000" stop-opacity="0.6" />
                    <stop offset="40%" stop-color="#BB1E00" stop-opacity="0.95" />
                    <stop offset="60%" stop-color="#BB1E00" stop-opacity="0.95" />
                    <stop offset="88%" stop-color="#8B1000" stop-opacity="0.6" />
                    <stop offset="100%" stop-color="#3A0000" stop-opacity="0" />
                </linearGradient>
            </defs>

            {{-- Arc: centre=(640,754) radius=633, endpoints at (7,754) → (1273,754) --}}
            <path d="M 7 754 A 633 633 0 0 1 1273 754" fill="none" stroke="url(#arcGrad)" stroke-width="1.5" />

            {{-- ── Number circle 1 — (157, 345) ── --}}
            <circle cx="157" cy="345" r="34" fill="#02212D" class="proc-circle" />
            <text x="157" y="346" text-anchor="middle" dominant-baseline="middle" fill="#fff" font-size="26"
                font-family="Gilroy-SemiBold, sans-serif" font-weight="600">1</text>

            {{-- ── Number circle 2 — (499, 137) ── --}}
            <circle cx="499" cy="137" r="34" fill="#02212D" class="proc-circle" />
            <text x="499" y="138" text-anchor="middle" dominant-baseline="middle" fill="#fff" font-size="26"
                font-family="Gilroy-SemiBold, sans-serif" font-weight="600">2</text>

            {{-- ── Number circle 3 — (805, 137) ── --}}
            <circle cx="805" cy="137" r="34" fill="#02212D" class="proc-circle" />
            <text x="805" y="138" text-anchor="middle" dominant-baseline="middle" fill="#fff" font-size="26"
                font-family="Gilroy-SemiBold, sans-serif" font-weight="600">3</text>

            {{-- ── Number circle 4 — (1145, 345) ── --}}
            <circle cx="1145" cy="345" r="34" fill="#02212D" class="proc-circle" />
            <text x="1145" y="346" text-anchor="middle" dominant-baseline="middle" fill="#fff" font-size="26"
                font-family="Gilroy-SemiBold, sans-serif" font-weight="600">4</text>
        </svg>

        {{-- ── Centre logo watermark ── --}}
        <div class="absolute pointer-events-none"
            style="left:50%; bottom:150px; transform:translateX(-50%); z-index:1; opacity:0.50;">
            <img src="{{ asset('assets/images/logo-big.svg') }}" alt=""
                style="width:280px; height:auto; display:block;">
        </div>

        {{-- ════════════════════════════════
             STEP CONTENT BOXES
             Each: centred on circle cx, top = cy+34+16
        ════════════════════════════════ --}}

        {{-- Step 1 — Clarify Objectives
             Circle (157,345) → box left=42, top=395 --}}
        <div class="absolute text-center proc-box" style="left:42px; top:395px; width:230px;" data-step="1">
            <div class="proc-icon-wrap">
                <img src="{{ asset('assets/images/icon-1.svg') }}" alt="Clarify Objectives" class="mx-auto proc-icon">
            </div>
            <h6 class="proc-title">Clarify Objectives</h6>
            <p class="proc-desc">
                We'll Meet to collaborate on understanding your requirements, defining your Goals, and Strategising for
                Your Success.
            </p>
        </div>

        {{-- Step 2 — Meet Engineers
             Circle (499,137) → box left=384, top=187 --}}
        <div class="absolute text-center proc-box" style="left:384px; top:187px; width:230px;" data-step="2">
            <div class="proc-icon-wrap">
                <img src="{{ asset('assets/images/Group-39218.svg') }}" alt="Meet Engineers"
                    class="mx-auto proc-icon">
            </div>
            <h6 class="proc-title">Meet Engineers</h6>
            <p class="proc-desc">
                We will save your time by efficiently connecting you with one of the Most Compatible Talents from Our
                Family of Experts.
            </p>
        </div>

        {{-- Step 3 — 7 Day Try Out
             Circle (805,137) → box left=690, top=187 --}}
        <div class="absolute text-center proc-box" style="left:690px; top:187px; width:230px;" data-step="3">
            <div class="proc-icon-wrap">
                <img src="{{ asset('assets/images/Group-39216.svg') }}" alt="7 Day Try Out"
                    class="mx-auto proc-icon">
            </div>
            <h6 class="proc-title">7 Day Try Out</h6>
            <p class="proc-desc">
                Experience a 7-day trial before deciding because we believe successful allocations build long-term
                partnerships.
            </p>
        </div>

        {{-- Step 4 — Build Your Dream Team
             Circle (1145,345) → box left=1030, top=395 --}}
        <div class="absolute text-center proc-box" style="left:1030px; top:395px; width:230px;" data-step="4">
            <div class="proc-icon-wrap">
                <img src="{{ asset('assets/images/startup-1.svg') }}" alt="Build Your Dream Team"
                    class="mx-auto proc-icon">
            </div>
            <h6 class="proc-title">Build Your Dream Team</h6>
            <p class="proc-desc">
                Embrace your chosen standout by adding them to your dream team &amp; solidify a powerful partnership
                built for success.
            </p>
        </div>

    </div>{{-- /desktop --}}

    {{-- ═══════════════════════════════════════════════════
         MOBILE (<md) — vertical numbered steps
    ═══════════════════════════════════════════════════ --}}
    <div class="relative block px-5 py-10 md:hidden" style="z-index:2;">

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

        @php
            $steps = [
                [
                    'num' => 1,
                    'icon' => 'icon-1.svg',
                    'title' => 'Clarify Objectives',
                    'desc' =>
                        "We'll Meet to collaborate on understanding your requirements, defining your Goals, and Strategising for Your Success.",
                ],
                [
                    'num' => 2,
                    'icon' => 'Group-39218.svg',
                    'title' => 'Meet Engineers',
                    'desc' =>
                        'We will save your time by efficiently connecting you with one of the Most Compatible Talents from Our Family of Experts.',
                ],
                [
                    'num' => 3,
                    'icon' => 'Group-39216.svg',
                    'title' => '7 Day Try Out',
                    'desc' =>
                        'Experience a 7-day trial before deciding because we believe successful allocations build long-term partnerships.',
                ],
                [
                    'num' => 4,
                    'icon' => 'startup-1.svg',
                    'title' => 'Build Your Dream Team',
                    'desc' =>
                        'Embrace your chosen standout by adding them to your dream team & solidify a powerful partnership built for success.',
                ],
            ];
        @endphp

        @foreach ($steps as $step)
            <div class="mob-proc-step relative flex items-start gap-4 {{ !$loop->last ? 'mb-10' : '' }}"
                style="z-index:1;">

                {{-- Teal circle --}}
                <div class="relative z-10 flex items-center justify-center flex-shrink-0 rounded-full"
                    style="width:54px; height:54px; min-width:54px;
                        background:#02212D;
                        transition: background 0.3s ease, transform 0.3s ease;
                        box-shadow: 0 0 0 0 rgba(181,30,23,0);">
                    <span
                        style="font-family:'Gilroy-SemiBold',sans-serif;
                             font-size:22px; color:#fff; font-weight:600; line-height:1;">
                        {{ $step['num'] }}
                    </span>
                </div>

                {{-- Content --}}
                <div class="pt-0.5">
                    <img src="{{ asset('assets/images/' . $step['icon']) }}" alt="{{ $step['title'] }}"
                        class="mb-2 mob-proc-icon"
                        style="width:42px; height:42px; object-fit:contain;
                            transition: transform 0.35s cubic-bezier(0.25,0.46,0.45,0.94);">
                    <h6
                        style="font-family:'Gilroy-SemiBold',sans-serif;
                           font-size:17px; color:#fff;
                           letter-spacing:-0.3px; line-height:1.3;
                           margin:0 0 8px 0;">
                        {{ $step['title'] }}
                    </h6>
                    <p
                        style="color:#8B8B8B; font-size:14px;
                          font-family:'Gilroy-Medium',sans-serif;
                          line-height:1.65; margin:0;">
                        {{ $step['desc'] }}
                    </p>
                </div>

            </div>
        @endforeach

    </div>{{-- /mobile --}}

</section>

{{-- ════════════════════════════════════════════
     STYLES
════════════════════════════════════════════ --}}
<style>
    /* ── Proc box base ── */
    .proc-box {
        z-index: 3;
        cursor: default;
    }

    /* ── Icon wrapper: contains the icon for scale+float animation ── */
    .proc-icon-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 14px;
        height: 56px;
    }

    /* ── Icon ── */
    .proc-icon {
        width: 48px;
        height: 48px;
        object-fit: contain;
        display: block;
        transition:
            transform 0.45s cubic-bezier(0.25, 0.46, 0.45, 0.94),
            filter 0.35s ease;
        transform-origin: center bottom;
    }

    /* ── Title ── */
    .proc-title {
        font-family: 'Gilroy-SemiBold', sans-serif;
        font-size: 18px;
        color: #fff;
        letter-spacing: -0.36px;
        line-height: 1.3;
        margin: 0 0 10px 0;
        transition: color 0.3s ease;
    }

    /* ── Description ── */
    .proc-desc {
        color: #8B8B8B;
        font-size: 13.5px;
        font-family: 'Gilroy-Medium', sans-serif;
        line-height: 1.7;
        margin: 0;
        transition: color 0.3s ease;
    }

    /* ── Number circles (SVG) hover via JS class ── */
    .proc-circle {
        transition: fill 0.3s ease;
    }
</style>
