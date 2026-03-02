{{-- ============================================================
     Testimonials Section
     SAVE AS: resources/views/sections/homepagesections/testimonialsection.blade.php

     Section-level active/inactive: hides entire section when inactive.
     Testimonials: portrait, logo, project label, quote, author — all from DB.
     All CSS/JS is IDENTICAL to the original.
============================================================ --}}

@php
    use App\Models\TestimonialSectionSetting;
    use App\Models\Testimonial;

    $testiSetting = TestimonialSectionSetting::instance();
    $testimonials = Testimonial::published()->orderBy('sort_order')->get();
@endphp

@if ($testiSetting->isActive() && $testimonials->isNotEmpty())

    <style>
        /* ── Testimonial portrait image sizing ── */
        .testi-portrait {
            height: 220px;
            object-position: center 20% !important;
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .testi-portrait {
                height: 280px;
                object-position: center 15% !important;
            }
        }

        @media (min-width: 1024px) {
            .testi-img-wrap {
                align-self: stretch;
            }

            .testi-portrait {
                height: 100%;
                min-height: 300px;
                max-height: 420px;
                object-position: center 15% !important;
            }
        }

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

        /* ── Gradient line pseudo-elements (top + bottom) ── */
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

        /* ── Hover state ── */
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
        <h2 class="text-4xl font-bold text-center text-white mb-14 md:text-5xl" style="letter-spacing:-0.5px;">
            {{ $testiSetting->heading }}
        </h2>

        {{-- Slider viewport --}}
        <div class="relative overflow-hidden" id="testiViewport">
            <div class="testi-track" id="testiTrack">

                @foreach ($testimonials as $i => $t)
                    <div class="testi-slide {{ $i === 0 ? 'is-active' : '' }}" data-index="{{ $i }}"
                        style="width: 820px; max-width: 90vw;">

                        {{-- Card --}}
                        <div class="flex flex-col testi-card rounded-2xl lg:flex-row"
                            style="background: transparent; min-height: 320px;">

                            {{-- Portrait --}}
                            <div class="testi-img-wrap flex-shrink-0 w-full lg:w-[280px]">
                                @if ($t->portraitUrl())
                                    <img src="{{ $t->portraitUrl() }}" alt="{{ $t->author_name }}"
                                        class="object-cover w-full testi-portrait rounded-t-2xl lg:rounded-l-2xl lg:rounded-tr-none lg:rounded-r-none">
                                @endif
                            </div>

                            {{-- Text content --}}
                            <div class="flex flex-col justify-center flex-1 px-6 py-6 md:px-8 md:py-8">

                                {{-- Quote --}}
                                <p class="mb-4 leading-relaxed"
                                    style="color:#F8F8F8; line-height:1.62; font-size:clamp(13px,1.5vw,16px);">
                                    {{ $t->quote }}
                                </p>

                                {{-- Author --}}
                                <p class="mb-4"
                                    style="color:#C0C0C0; font-size:clamp(12px,1.4vw,15px); line-height:1.5;">
                                    {{ $t->author_name }}<br>
                                    <span>{{ $t->author_role }}</span>
                                </p>

                                {{-- Project label + logo --}}
                                <div>
                                    <p class="mb-2" style="color:#EDEDED; font-size:clamp(12px,1.3vw,14px);">
                                        {{ $t->project_label }}
                                    </p>
                                    @if ($t->logoUrl())
                                        <img src="{{ $t->logoUrl() }}" alt="{{ $t->project_label }}"
                                            style="height:30px; width:auto; object-fit:contain;">
                                    @endif
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
                <button class="testi-dot {{ $i === 0 ? 'is-active' : '' }}" data-goto="{{ $i }}"
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

            function goTo(index, animate) {
                if (index < 0) index = slides.length - 1;
                if (index >= slides.length) index = 0;
                current = index;

                let offsetLeft = 0;
                for (let i = 0; i < current; i++) {
                    offsetLeft += slides[i].offsetWidth;
                }
                const centerOffset = offsetLeft -
                    (viewport.offsetWidth / 2) +
                    (slides[current].offsetWidth / 2);

                track.style.transition = animate === false ? 'none' : 'transform 0.5s ease-in-out';
                track.style.transform = `translateX(-${Math.max(0, centerOffset)}px)`;

                slides.forEach((s, i) => s.classList.toggle('is-active', i === current));
                dots.forEach((d, i) => d.classList.toggle('is-active', i === current));
            }

            dots.forEach(dot =>
                dot.addEventListener('click', () => goTo(parseInt(dot.dataset.goto)))
            );

            slides.forEach((slide, i) => {
                slide.addEventListener('click', () => {
                    if (i !== current) goTo(i);
                });
            });

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
                else goTo(current);
            });

            goTo(0, false);
            window.addEventListener('resize', () => goTo(current, false));
        })();
    </script>

@endif {{-- /section active check --}}
