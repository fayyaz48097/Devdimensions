@push('styles')
    <style>
        /* ════════════════════════════════════════════
                                                   PROBLEMS SECTION — mirrors original CSS
                                                   Using Tailwind where possible, custom for
                                                   the complex positioned diagram layout
                                                ════════════════════════════════════════════ */

        section.problems {
            margin-top: 100px;
            overflow: hidden;
        }

        /* ── problems-holder: the diagram container ── */
        .problems-holder {
            position: relative;
            width: 100%;
            min-height: 600px;
            margin-top: 50px;
        }

        /* Path image — full width background of the diagram */
        .problems-holder .path {
            display: block;
            width: 100%;
            height: auto;
        }

        .problems-holder .mobile-path {
            display: none;
        }

        /* ── Start: "Your Company" ── */
        .problems-holder .start {
            position: absolute;
            left: 40px;
            top: 56%;
            font-family: 'Gilroy-SemiBold', sans-serif;
            font-size: 48px;
            line-height: normal;
            letter-spacing: -0.96px;
            margin-bottom: 0;
            color: #fff;
            transform: translateY(-50%);
        }

        /* ── End: "Before DD" logo ── */
        .problems-holder .end {
            position: absolute;
            right: -121px;
            top: 34%;

        }

        /* ── Steps container ── */
        .steps .step {
            position: absolute;
            width: fit-content;
            cursor: default;
        }

        /* Step title styling — matches original exactly */
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

        /* ── Tooltip — exact original CSS ── */
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

        /* Tooltip triangle — matches original try-angle image style */
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

        /* Active step — tooltip visible (exact original) */
        .steps .step.active .toltip {
            opacity: 1;
            visibility: visible;
        }

        /* ── Step positions — exact from original CSS ── */
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

        /* ── Mobile ── */
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


{{-- ══════════════════════════════════════════════════════
     SECTION: Finding All-Star Talent is Hard
══════════════════════════════════════════════════════ --}}
<section class="problems _oh w-full py-[50px] relative clear-both">

    {{-- Container — matches Bootstrap responsive container widths --}}
    <div
        class="w-full px-3 mx-auto
                sm:max-w-[540px]
                md:max-w-[720px]
                lg:max-w-[960px]
                xl:max-w-[1140px]
                2xl:max-w-[1320px]">

        {{-- ── Heading ── --}}
        <div class="mx-auto text-center" style="max-width: 926px; width: 100%;">
            <h2 class="text-[28px] md:text-[48px] "
                style="
                  font-weight: 500;
              
                line-height: normal;
                letter-spacing: -0.96px;
                margin-bottom: 20px;
                color: #fff;
            ">
                Finding All-Star Talent is hard
            </h2>
            <p style="font-size:16px; line-height:1.5; color:#BBB; margin-bottom:20px;">
                Navigating job posts? Brace for an inbox flood of mismatched candidates. Survive
                interviews, onboarding, and training only to grapple with subpar work and
                communication gaps. Frustration isn't the goal and you can do better.
            </p>
        </div>

        {{-- ── Desktop diagram ── --}}
        <div class="mob__none">
            <div class="problems-holder">

                {{-- Mobile path (hidden on desktop via CSS) --}}
                <img src="{{ asset('assets/images/Group-39236.png') }}" alt="mobile path" class="mobile-path">

                {{-- Winding dashed path — the background image of the diagram --}}
                <img src="{{ asset('assets/images/path-line.png') }}" alt="path line" class="path">

                {{-- START: Your Company --}}
                <h2 class="start">Your<br>Company</h2>

                {{-- END: Before DD --}}
                <img src="{{ asset('assets/images/Frame-1261153171.svg') }}" alt="Before DevDimensions" class="end">

                {{-- ── Steps ── --}}
                <div class="steps">

                    {{-- Step 1 --}}
                    <div class="step s-1">
                        <h5 class="title">
                            <img src="{{ asset('assets/images/engineer.svg') }}" class="icon" alt="engineer">
                            <strong>Exhausting</strong><br>Interviews
                        </h5>
                        <div class="toltip">
                            30+ interviews for every 1 job slot
                        </div>
                    </div>

                    {{-- Step 2 --}}
                    <div class="step s-2">
                        <h5 class="title">
                            <img src="{{ asset('assets/images/clarity_talk-bubbles-line.svg') }}" class="icon"
                                alt="communication">
                            Communication<br><strong>Gaps</strong>
                        </h5>
                        <div class="toltip">
                            Communication across time zones is slow, unclear, &amp; difficult
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div class="step s-3">
                        <h5 class="title">
                            <img src="{{ asset('assets/images/like-shapes.svg') }}" class="icon" alt="quality">
                            <strong>Quality</strong><br>Issues
                        </h5>
                        <div class="toltip">
                            Quality isn't worth money/time spent
                        </div>
                    </div>

                    {{-- Step 4 --}}
                    <div class="step s-4">
                        <h5 class="title">
                            <img src="{{ asset('assets/images/uim_process.svg') }}" class="icon" alt="systems">
                            <strong>Minimal</strong><br>Systems
                        </h5>
                        <div class="toltip">
                            Minimal consistency across projects without systems
                        </div>
                    </div>

                    {{-- Step 5 --}}
                    <div class="step s-5">
                        <h5 class="title">
                            <img src="{{ asset('assets/images/fluent_clock-28-regular.svg') }}" class="icon"
                                alt="timeline">
                            <strong>Timeline</strong><br>Constraints
                        </h5>
                        <div class="toltip">
                            No guarantee on project timeline or completion
                        </div>
                    </div>

                </div>{{-- /steps --}}

            </div>
        </div>{{-- /mob__none --}}

        {{-- ── Mobile fallback image ── --}}
        <div class="core__mob">
            <img src="{{ asset('assets/images/Group-39236.png') }}" alt="Finding talent is hard" class="w-full h-auto">
        </div>

    </div>
</section>


@push('scripts')
    <script>
        (function() {
            /**
             * Auto-cycle tooltips across the 5 problem steps.
             *
             * - Each step's tooltip shows for 1800ms then advances to the next.
             * - Hovering a step immediately makes it active and PAUSES the cycle.
             * - Leaving resumes from the current position.
             */
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

            // Begin on step 1
            setActive(0);
            startCycle();
        })();
    </script>
@endpush
