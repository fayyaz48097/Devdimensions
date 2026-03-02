{{--
    SAVE AS: resources/views/sections/homepagesections/findtalent.blade.php

    Dynamic Find Talent section.
    • Only the 5 steps (icons, labels, tooltips) come from the DB.
    • Background diagram images and static headings remain as-is.
    • Section hides entirely if no active steps exist.
    • Up to 5 active steps fill CSS slots s-1 through s-5 in sort_order.
--}}

@php
    use App\Models\FindTalentStep;
    $steps = FindTalentStep::published()->orderBy('sort_order')->take(5)->get();
@endphp

@push('styles')
    <style>
        section.problems {
            margin-top: 100px;
            overflow: hidden;
        }

        .problems-holder {
            position: relative;
            width: 100%;
            min-height: 600px;
            margin-top: 50px;
        }

        .problems-holder .path {
            display: block;
            width: 100%;
            height: auto;
        }

        .problems-holder .mobile-path {
            display: none;
        }

        .problems-holder .start {
            position: absolute;
            left: 40px;
            top: 56%;
            font-size: 48px;
            line-height: normal;
            letter-spacing: -0.96px;
            margin-bottom: 0;
            color: #fff;
            transform: translateY(-50%);
        }

        .problems-holder .end {
            position: absolute;
            right: -121px;
            top: 34%;
        }

        .steps .step {
            position: absolute;
            width: fit-content;
            cursor: default;
        }

        .steps .title {
            font-weight: 400;
            font-size: 24px;
            position: relative;
            padding-left: 35px;
            background-color: transparent;
            line-height: 1.3;
            color: #fff;
            margin: 0;
        }

        .steps .title strong {
            font-weight: 600;
        }

        .steps .title .icon {
            width: 25px;
            position: absolute;
            left: 0;
            top: 3px;
        }

        .steps .toltip {
            letter-spacing: 0.14px;
            font-size: 14px;
            font-weight: 500;
            width: 220px;
            border-radius: 20px;
            padding: 13px 24px;
            background: linear-gradient(245deg, rgba(252, 63, 55, 1) 0%, rgba(181, 30, 23, 1) 100%);
            position: absolute;
            bottom: 130%;
            left: 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
            z-index: 20;
            color: #fff;
            line-height: 1.4;
            pointer-events: none;
        }

        .steps .toltip::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 20px;
            width: 0;
            height: 0;
            border-left: 9px solid transparent;
            border-right: 9px solid transparent;
            border-top: 10px solid #B51E17;
            z-index: -1;
        }

        .steps .step.active .toltip {
            opacity: 1;
            visibility: visible;
        }

        /* Fixed CSS positions — s-1 through s-5 */
        .steps .s-1 {
            top: 12%;
            left: 22%;
        }

        .steps .s-2 {
            left: 42%;
            top: 31%;
        }

        .steps .s-3 {
            bottom: 10%;
            left: 23%;
        }

        .steps .s-4 {
            bottom: 19%;
            left: 63%;
        }

        .steps .s-5 {
            left: 74%;
            top: 23%;
        }

        .mob__none {
            display: block;
        }

        .core__mob {
            display: none;
        }

        @media (max-width: 991px) {
            .mob__none {
                display: none !important;
            }

            .core__mob {
                display: block !important;
            }

            section.problems {
                margin-top: 60px;
            }
        }
    </style>
@endpush

@if ($steps->isNotEmpty())
    <section class="problems _oh w-full py-[50px] relative clear-both">
        <div
            class="w-full px-3 mx-auto
                sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px]
                xl:max-w-[1140px] 2xl:max-w-[1320px]">

            {{-- Heading — static --}}
            <div class="mx-auto text-center" style="max-width:926px; width:100%;">
                <h2 class="text-[28px] md:text-[48px]"
                    style="font-weight:500; line-height:normal; letter-spacing:-0.96px; margin-bottom:20px; color:#fff;">
                    Finding All-Star Talent is hard
                </h2>
                <p style="font-size:16px; line-height:1.5; color:#BBB; margin-bottom:20px;">
                    Navigating job posts? Brace for an inbox flood of mismatched candidates. Survive
                    interviews, onboarding, and training only to grapple with subpar work and
                    communication gaps. Frustration isn't the goal and you can do better.
                </p>
            </div>

            {{-- Desktop diagram --}}
            <div class="mob__none">
                <div class="problems-holder">

                    <img src="{{ asset('assets/images/Group-39236.png') }}" alt="mobile path" class="mobile-path">
                    <img src="{{ asset('assets/images/path-line.png') }}" alt="path line" class="path">

                    <h2 class="start">Your<br>Company</h2>
                    <img src="{{ asset('assets/images/Frame-1261153171.svg') }}" alt="Before DevDimensions"
                        class="end">

                    <div class="steps">
                        @foreach ($steps as $i => $step)
                            @php
                                $slotClass = 's-' . ($i + 1);
                                $lines = $step->titleLines();
                                $iconSrc = $step->iconUrl();
                            @endphp
                            <div class="step {{ $slotClass }}">
                                <h5 class="title">
                                    @if ($iconSrc)
                                        <img src="{{ $iconSrc }}" class="icon" alt="{{ $step->title_plain }}">
                                    @endif
                                    @if ($lines[0]['bold'])
                                        <strong>{{ $lines[0]['text'] }}</strong>
                                    @else
                                        {{ $lines[0]['text'] }}
                                    @endif
                                    <br>
                                    @if ($lines[1]['bold'])
                                        <strong>{{ $lines[1]['text'] }}</strong>
                                    @else
                                        {{ $lines[1]['text'] }}
                                    @endif
                                </h5>
                                <div class="toltip">{{ $step->tooltip_text }}</div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            {{-- Mobile fallback — static image --}}
            <div class="core__mob">
                <img src="{{ asset('assets/images/Group-39236.png') }}" alt="Finding talent is hard"
                    class="w-full h-auto">
            </div>

        </div>
    </section>
@endif

@push('scripts')
    <script>
        (function() {
            var steps = Array.from(document.querySelectorAll('.problems .steps .step'));
            if (!steps.length) return;

            var DELAY = 1800;
            var current = 0;
            var timer = null;
            var paused = false;

            function setActive(index) {
                steps.forEach(function(s, i) {
                    s.classList.toggle('active', i === index);
                });
                current = index;
            }

            function advance() {
                if (paused) return;
                setActive((current + 1) % steps.length);
            }

            function startCycle() {
                clearInterval(timer);
                timer = setInterval(advance, DELAY);
            }

            steps.forEach(function(step, i) {
                step.addEventListener('mouseenter', function() {
                    paused = true;
                    clearInterval(timer);
                    setActive(i);
                });
                step.addEventListener('mouseleave', function() {
                    paused = false;
                    startCycle();
                });
            });

            setActive(0);
            startCycle();
        })();
    </script>
@endpush
