{{-- ============================================================
     Testimonials Section
     resources/views/sections/homepagesections/testimonialsection.blade.php
============================================================ --}}

<style>
    /* ── Slider track ── */
    .testi-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
        will-change: transform;
    }

    /* ── Each slide ── */
    .testi-slide {
        flex-shrink: 0;
        padding: 0 12px;
        opacity: 0.45;
        transition: opacity 0.4s ease;
        pointer-events: none;
        cursor: pointer;
    }

    .testi-slide.is-active {
        opacity: 1;
        pointer-events: auto;
    }

    /* ── Dot navigation ── */
    .testi-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: white;
        cursor: pointer;
        transition: background 0.3s ease;
        border: none;
        padding: 0;
    }

    .testi-dot.is-active {
        background: #B51E17;
    }

    /* ── Card base ── */
    .testi-card {
        border: 1px solid rgba(146, 146, 146, 0.40);
        position: relative;
        overflow: hidden;
        transition: border-color 0.3s ease;
    }

    /* ── Gradient line pseudo-elements (top + bottom) — same as hire-box ── */
    .testi-card::before,
    .testi-card::after {
        content: "";
        height: 1px;
        width: 0%;
        position: absolute;
        left: 50%;
        right: 50%;
        border-radius: 20px;
        background: linear-gradient(90deg,
                transparent 0%,
                #B51E17 20%,
                #FC3F37 50%,
                #B51E17 80%,
                transparent 100%);
        transition: all 0.35s ease-in-out;
        z-index: 2;
    }

    .testi-card::before {
        top: 0;
    }

    .testi-card::after {
        bottom: 0;
        top: auto;
    }

    /* ── Hover state — red gradient lines, no bg change ── */
    .testi-slide.is-active .testi-card:hover {
        border-top-color: transparent;
        border-bottom-color: transparent;
        border-left-color: rgba(99, 99, 99, 0.27);
        border-right-color: rgba(99, 99, 99, 0.27);
    }

    .testi-slide.is-active .testi-card:hover::before,
    .testi-slide.is-active .testi-card:hover::after {
        width: 100%;
        left: 0;
        right: 0;
    }
</style>

<section class="w-full pt-10 pb-16 overflow-hidden bg-black">

    {{-- Heading --}}
    <h2 class="text-4xl font-bold text-center text-white mb-14 md:text-5xl"
        style="font-family:'Gilroy-SemiBold', sans-serif; letter-spacing:-0.5px;">
        Don't Take Our Word for it
    </h2>

    {{-- Slider viewport --}}
    <div class="relative overflow-hidden" id="testiViewport">
        <div class="testi-track" id="testiTrack">

            @php
                $testimonials = [
                    [
                        'image' => 'Frame-1261153391.webp',
                        'logo' => 'Frame-1261153383.png',
                        'project' => 'Project:TripSeer',
                        'quote' =>
                            'DevDimensions designed and developed an exceptional travel booking system and agent dashboards for TripSeer. Their expertise, seamless communication, and timely delivery exceeded our expectations. Highly recommend them for their outstanding work!',
                        'author' => '-Markus F.',
                        'role' => 'Founder & CEO TripSeer',
                    ],
                    [
                        'image' => 'Frame-1261153390-1.webp',
                        'logo' => 'Frame-1261153386.png',
                        'project' => 'Project:Thinkrite',
                        'quote' =>
                            'We hired couple of resources from DevDimensions, and they have been exceptional. Their expertise and dedication have greatly enhanced our project\'s efficiency and quality. The team\'s professionalism and seamless collaboration make DevDimensions a fantastic choice for staffing needs.',
                        'author' => '-Joshua S.',
                        'role' => 'Founder & CEO ThinkWrite',
                    ],
                    [
                        'image' => 'Frame-1261153390.webp',
                        'logo' => 'Frame-1261153385.png',
                        'project' => 'Project:Offerform',
                        'quote' =>
                            'We recently brought on a team from DevDimensions for a real estate project. Their deep knowledge and extensive experience in the real estate sector, coupled with their proficiency in integrating various APIs for property listings and market data, have significantly boosted our project\'s performance and quality.',
                        'author' => '-Cody T.',
                        'role' => 'Co-Founder OfferForm',
                    ],
                    [
                        'image' => 'Frame-1261153392.webp',
                        'logo' => 'Frame-1261153385-1.png',
                        'project' => 'Project:RSI Motorsports',
                        'quote' =>
                            'DevDimensions team\'s deep understanding of the automotive market and expertise in integrating the Turn14 API has truly transformed our platform. The attention to detail and commitment they showed ensured everything ran smoothly.',
                        'author' => '-Ryan S.',
                        'role' => 'Founder RSI Motorsports',
                    ],
                ];
            @endphp

            @foreach ($testimonials as $i => $t)
                <div class="testi-slide {{ $i === 1 ? 'is-active' : '' }}" data-index="{{ $i }}"
                    style="width: 820px; max-width: 90vw;">

                    {{-- Card --}}
                    <div class="flex items-center testi-card rounded-2xl"
                        style="min-height:350px; background: transparent;">

                        {{-- Left: portrait image --}}
                        <div class="flex-shrink-0" style="width:300px; min-height:330px; position:relative;">
                            <img src="{{ asset('assets/images/' . $t['image']) }}" alt="{{ $t['author'] }}"
                                class="object-cover w-full h-full ml-4 rounded-2xl"
                                style="min-height:330px; object-position:top center;">
                        </div>

                        {{-- Right: text content --}}
                        <div class="flex flex-col justify-center flex-1 px-8 py-8">

                            {{-- Quote --}}
                            <p class="mb-5 text-base leading-relaxed"
                                style="font-family:'Gilroy-Medium',sans-serif;
                                      color:#F8F8F8;
                                      line-height:1.62;
                                      font-size:16px;">
                                {{ $t['quote'] }}
                            </p>

                            {{-- Author --}}
                            <p class="mb-6"
                                style="font-family:'Gilroy-RegularItalic',sans-serif;
                                      color:#C0C0C0;
                                      font-size:15px;
                                      line-height:1.5;">
                                {{ $t['author'] }}<br>
                                <span>{{ $t['role'] }}</span>
                            </p>

                            {{-- Project label + logo --}}
                            <div>
                                <p class="mb-2 text-sm"
                                    style="color:#EDEDED;
                                          font-family:'Gilroy-Medium',sans-serif;
                                          font-size:14px;">
                                    {{ $t['project'] }}
                                </p>
                                <img src="{{ asset('assets/images/' . $t['logo']) }}" alt="{{ $t['project'] }}"
                                    style="height:35px; width:auto; object-fit:contain;">
                            </div>

                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>

    {{-- Dot navigation --}}
    <div class="flex items-center justify-center gap-3 mt-10" id="testiDots">
        @foreach ($testimonials as $i => $t)
            <button class="testi-dot {{ $i === 1 ? 'is-active' : '' }}" data-goto="{{ $i }}"
                aria-label="Slide {{ $i + 1 }}">
            </button>
        @endforeach
    </div>

</section>

<script>
    (function() {
        const track = document.getElementById('testiTrack');
        const viewport = document.getElementById('testiViewport');
        const slides = Array.from(track.querySelectorAll('.testi-slide'));
        const dots = Array.from(document.querySelectorAll('.testi-dot'));

        let current = 0;
        let isDragging = false,
            dragStartX = 0,
            dragDelta = 0;

        /* ── Core: position track so current slide is centered ── */
        function goTo(index, animate) {
            if (index < 0) index = slides.length - 1;
            if (index >= slides.length) index = 0;
            current = index;

            /* pixel-perfect centering:
               offset = left edge of slide[current] - space needed to center it */
            let offsetLeft = 0;
            for (let i = 0; i < current; i++) {
                offsetLeft += slides[i].offsetWidth;
            }
            const centerOffset = offsetLeft -
                (viewport.offsetWidth / 2) +
                (slides[current].offsetWidth / 2);

            track.style.transition = animate === false ?
                'none' :
                'transform 0.5s ease-in-out';
            track.style.transform = `translateX(-${Math.max(0, centerOffset)}px)`;

            slides.forEach((s, i) => s.classList.toggle('is-active', i === current));
            dots.forEach((d, i) => d.classList.toggle('is-active', i === current));
        }

        /* ── Dot clicks ── */
        dots.forEach(dot =>
            dot.addEventListener('click', () => goTo(parseInt(dot.dataset.goto)))
        );

        /* ── Click on non-active slides to navigate ── */
        slides.forEach((slide, i) => {
            slide.addEventListener('click', () => {
                if (i !== current) goTo(i);
            });
        });

        /* ── Touch swipe ── */
        let touchStartX = 0;
        viewport.addEventListener('touchstart', e => {
            touchStartX = e.touches[0].clientX;
        }, {
            passive: true
        });
        viewport.addEventListener('touchend', e => {
            const diff = touchStartX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 40) goTo(diff > 0 ? current + 1 : current - 1);
        });

        /* ── Mouse drag ── */
        viewport.addEventListener('mousedown', e => {
            isDragging = true;
            dragStartX = e.clientX;
            dragDelta = 0;
            track.style.transition = 'none';
            e.preventDefault();
        });
        window.addEventListener('mousemove', e => {
            if (!isDragging) return;
            dragDelta = dragStartX - e.clientX;
        });
        window.addEventListener('mouseup', () => {
            if (!isDragging) return;
            isDragging = false;
            if (Math.abs(dragDelta) > 40) goTo(dragDelta > 0 ? current + 1 : current - 1);
            else goTo(current); // snap back
        });

        /* ── Init + resize ── */
        goTo(0, false);
        window.addEventListener('resize', () => goTo(current, false));
    })();
</script>
