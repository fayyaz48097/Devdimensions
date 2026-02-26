{{-- ============================================================
     Portfolio Section
     - Desktop (md+): large horizontal cards ~900px, left-offset slider
     - Mobile (<md):  compact vertical cards ~340px, centered carousel
============================================================ --}}

@php
    $projects = [
        [
            'title' => 'Literal Co',
            'slug' => 'literal-co',
            'cats' => ['Design'],
            'desc' =>
                'The first retail media platform that unites on-site and off-site capabilities. We empower brands and retailers to seamlessly connect with their audiences wherever they are. With our innovative solutions.',
            'img_desktop' => 'frame-1261153219-3-668d2b050ac7a.webp',
            'img_mobile' => 'Frame-1261153157-21.png',
        ],
        [
            'title' => 'EMD',
            'slug' => 'emd',
            'cats' => ['Design & Development'],
            'desc' =>
                'The EMD Construction Company landing page was designed with a clean, professional aesthetic to highlight their expertise and commitment to quality. The layout features a striking hero section with a bold headline and an image of a recent project to capture attention.',
            'img_desktop' => 'frame-1261153220-1-668d297b1a2ea.webp',
            'img_mobile' => 'Frame-1261153157-15.png',
        ],
        [
            'title' => 'Vanrock Holdings',
            'slug' => 'vanrock-holdings',
            'cats' => ['Design', 'Development'],
            'desc' =>
                'VanRock is a project that exemplifies the fusion of design and functionality, aimed at delivering robust financial results for investors through expert management. We began by crafting intuitive and visually appealing designs in Figma, focusing on clarity and user experience.',
            'img_desktop' => 'frame-1261153213-1-668d2867370a2.webp',
            'img_mobile' => 'Frame-1261153157-13.png',
        ],
        [
            'title' => 'Performance Tours',
            'slug' => 'performance-tours',
            'cats' => ['Design', 'Development'],
            'desc' =>
                'The website for Performance Tours showcases a thrilling rafting experience tailored for families seeking adventure in a bold and maximalist aesthetic. Emphasizing safety and excitement, the site\'s vibrant visuals and dynamic layout capture the essence of exhilarating river.',
            'img_desktop' => 'frame-1261153219-2-668d290a3710a.webp',
            'img_mobile' => 'Frame-1261153157-19.png',
        ],
        [
            'title' => 'Express Flooring',
            'slug' => 'express-flooring',
            'cats' => ['Design', 'Development'],
            'desc' =>
                '"Express Flooring" is a dynamic website specializing in interior flooring solutions and products, including a wide range of tiles. Utilizing blue as the accent color, the design conveys a sense of trust and professionalism while maintaining a modern and clean aesthetic.',
            'img_desktop' => 'frame-1261153221-1-668d272b32aee.webp',
            'img_mobile' => 'Frame-1261153157-10.png',
        ],
        [
            'title' => 'Soy Kitty',
            'slug' => 'soy-kitty',
            'cats' => ['Design'],
            'desc' =>
                '"Soy Kitty" is a thoughtfully designed website that caters to environmentally conscious cat owners seeking non-toxic, odor-free, and eco-friendly cat litter options. The site features a simple yet elegant layout, utilizing soothing pastel colors to create a calming and user-friendly experience.',
            'img_desktop' => 'frame-1261153219-3-668d2b050ac7a.webp',
            'img_mobile' => 'Frame-1261153157-21.png',
        ],
        [
            'title' => 'Walter On Wine',
            'slug' => 'walter-on-wire',
            'cats' => ['Design'],
            'desc' =>
                '"Walter on Wine" is a sleek and modern website that is designed to cater to wine enthusiasts and novices alike. Owned by an experienced sommelier, the site offers comprehensive information about various wines, guiding users to find the best selections tailored to their preferences.',
            'img_desktop' => 'frame-1261153213-1-668d2867370a2.webp',
            'img_mobile' => 'Frame-1261153157-13.png',
        ],
    ];
    $totalDesktop = count($projects);
    $totalMobile = count($projects);
@endphp

<section class="relative bg-black portfolio-section" style="padding: 64px 0; margin-top: 100px;">

    {{-- ── Section Header ── --}}
    <div class="mb-10 port-container">
        {{-- Mobile heading --}}
        <div class="block md:hidden">
            <h2 class="text-[32px] font-semibold text-white mb-0" style=" letter-spacing:-0.8px;">Discover What's Possible
            </h2>
        </div>
        {{-- Desktop heading + CTA --}}
        <div class="items-center justify-between hidden md:flex">
            <h2 class="text-[48px] font-semibold text-white mb-0" style=" letter-spacing:-1px;">Discover What's Possible
            </h2>
            <a href="{{ url('/case-studies') }}" class="port-cta-btn">
                View More Work
                <span class="port-cta-icon-wrap">
                    <span class="port-cta-diamond"></span>
                    <svg class="port-cta-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <polyline points="12 5 19 12 12 19" />
                    </svg>
                </span>
            </a>
        </div>
    </div>

    {{-- ════════════════════════════════════════════
         DESKTOP SLIDER  (hidden on mobile)
    ════════════════════════════════════════════ --}}
    <div class="hidden overflow-hidden md:block" style="padding-left: clamp(24px, 8vw, 124px);">
        <div id="desktopTrack" class="flex gap-5 pb-6"
            style="transition: transform 0.5s cubic-bezier(0.25,0.46,0.45,0.94); will-change: transform;">

            @foreach ($projects as $project)
                <div class="desk-slide flex-shrink-0 w-[min(900px,85vw)]">
                    <div class="relative overflow-hidden border work-card rounded-xl border-white/10 bg-white/5"
                        style="min-height:500px;">
                        <div class="card-border-top"></div>
                        <div class="card-border-bot"></div>
                        <div class="flex h-full">
                            {{-- Image --}}
                            <div class="flex-shrink-0 w-5/12">
                                <img src="{{ asset('assets/images/' . $project['img_desktop']) }}"
                                    alt="{{ $project['title'] }}" class="object-cover object-top w-full h-full"
                                    style="max-height:500px; padding:10px; border-radius:16px;">
                            </div>
                            {{-- Content --}}
                            <div class="flex flex-col justify-center w-7/12 p-10">
                                <h4 class="flex flex-wrap items-center gap-3 mb-4 text-white"
                                    style=" font-size:32px; line-height:normal;">
                                    <a href="{{ url('/project/' . $project['slug']) }}" class="text-white no-underline"
                                        style="transition:color 0.3s;">{{ $project['title'] }}</a>
                                    @foreach ($project['cats'] as $cat)
                                        <span class="cat-badge">{{ $cat }}</span>
                                    @endforeach
                                </h4>
                                <p class="mb-6" style="color:#A0A0A0;  font-size:16px; line-height:1.6;">
                                    {{ $project['desc'] }}
                                </p>
                                <div class="tools-row">
                                    <span class="tools-label">Tools:</span>
                                    <img src="{{ asset('assets/images/tool-1.png') }}" alt="Sketch" class="tool-img">
                                    <img src="{{ asset('assets/images/tool-2.png') }}" alt="Figma" class="tool-img">
                                </div>
                                <div class="relative mt-10" style="min-height:50px;">
                                    <a href="{{ url('/project/' . $project['slug']) }}"
                                        class="card-arrow-btn card-arrow-desk">
                                        <span class="card-arrow-bg"></span>
                                        <svg class="card-arrow-svg" width="22" height="22" viewBox="0 0 24 24"
                                            fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                            <polyline points="12 5 19 12 12 19" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- Desktop dots --}}
    <div class="items-center justify-center hidden gap-3 mt-8 md:flex" id="desktopDots"></div>

    {{-- ════════════════════════════════════════════
         MOBILE SLIDER  (hidden on desktop)
         Compact cards ~340px, centered with peek
    ════════════════════════════════════════════ --}}
    <div class="block overflow-hidden md:hidden">
        <div id="mobileTrack" class="flex"
            style="gap: 14px;
                    padding-left: 20px;
                    transition: transform 0.45s cubic-bezier(0.25,0.46,0.45,0.94);
                    will-change: transform;">

            @foreach ($projects as $project)
                <div class="flex-shrink-0 mob-slide" style="width: min(340px, 80vw);">
                    <div class="mob-card relative rounded-xl border border-white/10 bg-white/[0.06] overflow-hidden">

                        {{-- Top gradient line --}}
                        <div class="card-border-top"></div>
                        <div class="card-border-bot"></div>

                        {{-- Card inner: image left, content right --}}
                        <div class="flex" style="min-height: 200px;">

                            {{-- Left: project image --}}
                            <div class="flex-shrink-0" style="width: 120px;">
                                <img src="{{ asset('assets/images/' . $project['img_mobile']) }}"
                                    alt="{{ $project['title'] }}" class="object-cover object-top w-full h-full"
                                    style="border-radius: 12px 0 0 12px; padding: 8px 4px 8px 8px;">
                            </div>

                            {{-- Right: content --}}
                            <div class="flex flex-col justify-between flex-1 p-4 pl-3">
                                {{-- Title + arrow row --}}
                                <div>
                                    <div class="flex items-start justify-between gap-2 mb-2">
                                        <h4 class="mb-0 leading-tight text-white" style=" font-size:18px;">
                                            <a href="{{ url('/project/' . $project['slug']) }}"
                                                class="text-white no-underline"
                                                style="transition:color 0.3s;">{{ $project['title'] }}</a>
                                        </h4>
                                        {{-- Arrow button top-right --}}
                                        <a href="{{ url('/project/' . $project['slug']) }}"
                                            class="flex-shrink-0 card-arrow-btn"
                                            style="width:36px; height:36px; border-radius:6px;">
                                            <span class="card-arrow-bg"></span>
                                            <svg class="card-arrow-svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                                <polyline points="12 5 19 12 12 19" />
                                            </svg>
                                        </a>
                                    </div>

                                    {{-- Category badges --}}
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        @foreach ($project['cats'] as $cat)
                                            <span class="cat-badge"
                                                style="height:26px; line-height:26px; font-size:10px; padding:0 10px;">{{ $cat }}</span>
                                        @endforeach
                                    </div>

                                    {{-- Description clipped --}}
                                    <p class="mb-3"
                                        style="color:#A0A0A0;  font-size:12px; line-height:1.55; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden;">
                                        {{ $project['desc'] }}
                                    </p>
                                </div>

                                {{-- Tools row --}}
                                <div class="tools-row" style="gap:8px;">
                                    <span class="tools-label" style="font-size:12px;">Tools:</span>
                                    <img src="{{ asset('assets/images/tool-1.png') }}" alt="Sketch"
                                        style="height:20px; width:auto;">
                                    <img src="{{ asset('assets/images/tool-2.png') }}" alt="Figma"
                                        style="height:20px; width:auto;">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>

    {{-- Mobile dots --}}
    <div class="flex items-center justify-center gap-3 mt-6 md:hidden" id="mobileDots"></div>

    {{-- ── Mobile CTA ── --}}
    <div class="block px-5 mt-6 md:hidden">
        <a href="{{ url('/case-studies') }}" class="port-cta-btn">
            View More Work
            <span class="port-cta-icon-wrap">
                <span class="port-cta-diamond"></span>
                <svg class="port-cta-arrow" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12" />
                    <polyline points="12 5 19 12 12 19" />
                </svg>
            </span>
        </a>
    </div>

</section>

{{-- ============================================================
     STYLES
============================================================ --}}
<style>
    /* Container */
    .port-container {
        max-width: 1360px;
        margin-left: auto;
        margin-right: auto;
        padding-left: clamp(20px, 4vw, 48px);
        padding-right: clamp(20px, 4vw, 48px);
    }

    /* ── CTA Button (hero-style) ───────────────────────────────── */
    .port-cta-btn {
        position: relative;
        display: inline-block;
        color: #fff;

        font-size: 14px;
        font-weight: 500;
        height: 44px;
        line-height: 44px;
        min-width: 172px;
        padding: 0 56px 0 20px;
        border-radius: 5px;
        background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .port-cta-btn:hover {
        background: rgba(181, 30, 23, 1);
        color: #fff;
    }

    .port-cta-icon-wrap {
        position: absolute;
        top: 50%;
        right: 8px;
        transform: translateY(-50%);
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        pointer-events: none;
    }

    .port-cta-diamond {
        position: absolute;
        inset: 0;
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.20);
        transition: transform 0.3s ease, background 0.3s ease;
    }

    .port-cta-arrow {
        position: relative;
        z-index: 2;
        transform: rotate(-45deg);
        transition: transform 0.3s ease;
    }

    .port-cta-btn:hover .port-cta-diamond {
        transform: rotate(45deg);
        background: rgba(255, 255, 255, 0.10);
    }

    .port-cta-btn:hover .port-cta-arrow {
        transform: rotate(0deg);
    }

    /* ── Category badge ────────────────────────────────────────── */
    .cat-badge {
        display: inline-block;
        border-radius: 8px;
        background: rgba(255, 212, 60, 0.60);
        color: #fff;
        height: 36px;
        line-height: 36px;
        font-size: 12px;
        padding: 0 14px;
        white-space: nowrap;
    }

    /* ── Tools row ─────────────────────────────────────────────── */
    .tools-row {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .tools-label {

        font-size: 16px;
        color: #EDEDED;
    }

    .tool-img {
        height: 28px;
        width: auto;
    }

    /* ── Desktop slide opacity ─────────────────────────────────── */
    .desk-slide {
        opacity: 0.4;
        transition: opacity 0.4s ease;
    }

    .desk-slide.is-active {
        opacity: 1;
    }

    /* ── Mobile slide opacity ──────────────────────────────────── */
    .mob-slide {
        opacity: 0.45;
        transition: opacity 0.4s ease;
    }

    .mob-slide.is-active {
        opacity: 1;
    }

    /* ── Card gradient border lines ────────────────────────────── */
    .card-border-top,
    .card-border-bot {
        position: absolute;
        left: 0;
        right: 0;
        height: 1px;
        width: 0%;
        z-index: 10;
        background: linear-gradient(90deg, transparent, #B51E17, #FC3F37, transparent);
        transition: width 0.5s ease;
    }

    .card-border-top {
        top: 0;
    }

    .card-border-bot {
        bottom: 0;
    }

    .work-card:hover .card-border-top,
    .work-card:hover .card-border-bot,
    .mob-card:hover .card-border-top,
    .mob-card:hover .card-border-bot {
        width: 100%;
    }

    .work-card:hover,
    .mob-card:hover {
        border-color: transparent;
    }

    /* ── Card Arrow Button ─────────────────────────────────────── */
    .card-arrow-btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        border-radius: 8px;
        text-decoration: none;
        overflow: hidden;
        flex-shrink: 0;
        transition: background 0.3s ease;
        background: transparent;
    }

    .card-arrow-bg {
        position: absolute;
        inset: 0;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.20);
        transition: transform 0.3s ease, background 0.3s ease, border-radius 0.3s ease;
    }

    .card-arrow-svg {
        position: relative;
        z-index: 2;
        transform: rotate(-45deg);
        transition: transform 0.3s ease;
    }

    .card-arrow-desk {
        position: absolute;
        right: 0;
        bottom: 0;
    }

    /* On card hover → red, arrow → right */
    .work-card:hover .card-arrow-btn,
    .mob-card:hover .card-arrow-btn {
        background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
    }


    .work-card:hover .card-arrow-svg,
    .mob-card:hover .card-arrow-svg {
        transform: rotate(0deg) translateX(2px);
    }

    /* ── Dot nav ───────────────────────────────────────────────── */
    .port-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        padding: 0;
        background: white;
        transition: background 0.3s ease, transform 0.3s ease;
        outline: none;
    }

    .port-dot.is-active {
        background: #B51E17;
        transform: scale(1.25);
    }

    .port-dot:hover:not(.is-active) {
        background: rgba(255, 255, 255, 0.55);
    }
</style>

{{-- ============================================================
     JAVASCRIPT
============================================================ --}}
<script>
    (function() {
        /* ── helpers ── */
        function buildSlider(trackId, dotsId, slideClass) {
            const track = document.getElementById(trackId);
            const dotsEl = document.getElementById(dotsId);
            if (!track || !dotsEl) return;

            const slides = Array.from(track.querySelectorAll('.' + slideClass));
            const TOTAL = slides.length;
            const GAP = parseInt(getComputedStyle(track).gap) || 14;
            let current = 0;

            /* Build dots */
            const dots = Array.from({
                length: TOTAL
            }, (_, i) => {
                const btn = document.createElement('button');
                btn.className = 'port-dot' + (i === 0 ? ' is-active' : '');
                btn.setAttribute('aria-label', 'Slide ' + (i + 1));
                btn.addEventListener('click', () => go(i));
                dotsEl.appendChild(btn);
                return btn;
            });

            function go(idx) {
                current = Math.max(0, Math.min(idx, TOTAL - 1));
                const w = slides[0].getBoundingClientRect().width + GAP;
                track.style.transform = 'translateX(-' + (current * w) + 'px)';
                slides.forEach((s, i) => s.classList.toggle('is-active', i === current));
                dots.forEach((d, i) => d.classList.toggle('is-active', i === current));
            }

            /* Init */
            slides[0] && slides[0].classList.add('is-active');

            /* Touch / drag */
            let sx = 0,
                drag = false;
            track.addEventListener('mousedown', e => {
                sx = e.clientX;
                drag = true;
            });
            track.addEventListener('touchstart', e => {
                sx = e.touches[0].clientX;
                drag = true;
            }, {
                passive: true
            });
            window.addEventListener('mouseup', e => {
                if (!drag) return;
                const d = sx - e.clientX;
                if (Math.abs(d) > 40) go(d > 0 ? current + 1 : current - 1);
                drag = false;
            });
            window.addEventListener('touchend', e => {
                if (!drag) return;
                const d = sx - e.changedTouches[0].clientX;
                if (Math.abs(d) > 40) go(d > 0 ? current + 1 : current - 1);
                drag = false;
            });

            return go;
        }

        /* Init both sliders */
        buildSlider('desktopTrack', 'desktopDots', 'desk-slide');
        buildSlider('mobileTrack', 'mobileDots', 'mob-slide');

        /* ── CTA button hover ── */
        document.querySelectorAll('.port-cta-btn').forEach(btn => {
            const diamond = btn.querySelector('.port-cta-diamond');
            const arrow = btn.querySelector('.port-cta-arrow');
            if (!diamond || !arrow) return;
            btn.addEventListener('mouseenter', () => {
                diamond.style.transform = 'rotate(45deg)';
                diamond.style.background = 'rgba(255,255,255,0.10)';
                arrow.style.transform = 'rotate(0deg)';
            });
            btn.addEventListener('mouseleave', () => {
                diamond.style.transform = '';
                diamond.style.background = '';
                arrow.style.transform = 'rotate(-45deg)';
            });
        });
    })();
</script>
