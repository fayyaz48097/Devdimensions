{{--
    SAVE AS: resources/views/sections/homepagesections/welcomesection.blade.php

    Strategy: Keep the ORIGINAL hardcoded CSS and layout 100% intact.
    Only the text content, CTA url, and hero image are pulled from DB.
    The animation classes tex_slide1/2/3 and @keyframes slot1/2/3 are
    kept exactly as the original — no dynamic CSS generation needed.
    Section hides if no active record exists in DB.
--}}

@php
    use App\Models\WelcomeSection;
    $welcome = WelcomeSection::live();
@endphp

@if ($welcome)

    @push('styles')
        <style>
            /* ── Vertical slot-machine text slider ── */
            .we-needs li {
                color: #D3D3D3;
                list-style: none;
                position: relative;
                font-weight: 500;
                display: flex;
                align-items: baseline;
                gap: 8px;
                overflow: hidden;
            }

            .we-needs li:not(:last-child) {
                margin-bottom: 18px;
            }

            /* The sliding container — clipped to one line height */
            .slide-hold {
                height: 30px;
                overflow: hidden;
                display: inline-block;
            }

            /* Inner track that animates upward */
            .slide-track {
                display: flex;
                flex-direction: column;
            }

            .slide-track span {
                height: 30px;
                line-height: 30px;
                display: block;
                white-space: nowrap;
                background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            /* Slot animations — 3 items cycling */
            .tex_slide1 {
                animation: slot1 6s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            }

            .tex_slide2 {
                animation: slot2 6s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            }

            .tex_slide3 {
                animation: slot3 6s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            }

            /* hire image alignment */
            .hire {
                margin-left: 20px;
            }
        </style>
    @endpush

    {{--
    @keyframes MUST live outside @push('styles') — Blade mangles @ inside
    @push blocks. This plain <style> tag is output verbatim by Blade.
    The keyframes themselves are hardcoded (not generated dynamically)
    which avoids ALL the { } / @ parsing issues entirely.
--}}
    <style>
        @keyframes slot1 {
            0% {
                transform: translateY(0);
            }

            28% {
                transform: translateY(0);
            }

            33% {
                transform: translateY(-30px);
            }

            61% {
                transform: translateY(-30px);
            }

            66% {
                transform: translateY(-60px);
            }

            94% {
                transform: translateY(-60px);
            }

            99%,
            100% {
                transform: translateY(-90px);
            }
        }

        @keyframes slot2 {
            0% {
                transform: translateY(0);
            }

            28% {
                transform: translateY(0);
            }

            33% {
                transform: translateY(-30px);
            }

            61% {
                transform: translateY(-30px);
            }

            66% {
                transform: translateY(-60px);
            }

            94% {
                transform: translateY(-60px);
            }

            99%,
            100% {
                transform: translateY(-90px);
            }
        }

        @keyframes slot3 {
            0% {
                transform: translateY(0);
            }

            28% {
                transform: translateY(0);
            }

            33% {
                transform: translateY(-30px);
            }

            61% {
                transform: translateY(-30px);
            }

            66% {
                transform: translateY(-60px);
            }

            94% {
                transform: translateY(-60px);
            }

            99%,
            100% {
                transform: translateY(-90px);
            }
        }
    </style>

    {{-- ══════════════════════════════════════════════════════
     WELCOME SECTION
══════════════════════════════════════════════════════ --}}
    <section class="need w-full py-[50px] relative clear-both bg-no-repeat bg-cover bg-center">
        <div
            class="w-full px-3 mx-auto
                sm:max-w-[540px]
                md:max-w-[720px]
                lg:max-w-[960px]
                xl:max-w-[1140px]
                2xl:max-w-[1320px]">

            <div class="flex flex-wrap -mx-3">

                {{-- ── Left Column ── --}}
                <div class="w-full px-3 lg:w-7/12">
                    <div style="max-width: 606px; width: 100%;">

                        {{-- Heading — from DB --}}
                        <h2 class="text-4xl md:text-5xl"
                            style="line-height: normal; letter-spacing: -0.96px; margin-bottom: 20px; color: #fff;">
                            {{ $welcome->heading }}
                        </h2>

                        {{-- Description — from DB --}}
                        <p class="text-sm md:text-[16px]" style="color: #DBDBDB; line-height: 2; margin-bottom: 20px;">
                            {{ $welcome->description }}
                        </p>

                        {{-- ── Vertical Text Slider List ── --}}
                        {{--
                        Each line maps to a DB slider line ordered by sort_order.
                        Items map to DB slider items within each line.
                        Animation classes tex_slide1/2/3 are kept hardcoded —
                        they correspond to lines in sort_order 0, 1, 2.
                        Falls back gracefully if fewer than 3 lines exist.
                    --}}
                        @php
                            $lines = $welcome->activeSliderLines;
                            $slideClasses = ['tex_slide1', 'tex_slide2', 'tex_slide3'];
                        @endphp

                        @if ($lines->isNotEmpty())
                            <ul class="we-needs text-lg md:text-2xl mt-[44px] mb-0 p-0">
                                @foreach ($lines->take(3) as $idx => $line)
                                    @php $activeItems = $line->activeItems; @endphp
                                    @if ($activeItems->isNotEmpty())
                                        <li>
                                            <span class="shrink-0">{{ $line->prefix_text }}</span>
                                            <div class="slide-hold">
                                                <div class="slide-track {{ $slideClasses[$idx] ?? 'tex_slide1' }}">
                                                    @foreach ($activeItems as $item)
                                                        <span> {{ $item->item_text }}</span>
                                                    @endforeach
                                                    {{-- Duplicate first item for seamless CSS loop --}}
                                                    <span> {{ $activeItems->first()->item_text }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                        {{-- CTA Button — from DB --}}
                        <a href="{{ url($welcome->cta_url) }}"
                            class="relative inline-block mt-5 text-white transition-all duration-300 ease-in-out group"
                            style="border: 0;
                               font-size: 14px;
                               font-weight: 500;
                               text-transform: capitalize;
                               height: 44px;
                               line-height: 44px;
                               width: 170px;
                               padding: 0 36px 0 20px;
                               border-radius: 5px;
                               background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
                               text-decoration: none;
                               display: inline-block;"
                            onmouseover="this.style.background='rgba(181, 30, 23, 1)';"
                            onmouseout="this.style.background='linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%)'">

                            {{ $welcome->cta_text }}

                            {{-- Icon Wrapper --}}
                            <span
                                class="absolute top-1/2 right-2 -translate-y-1/2 flex items-center justify-center w-[30px] h-[30px]">
                                <span
                                    class="absolute inset-0 bg-white/20 rounded-[4px] transition-all duration-300 ease-in-out group-hover:rotate-[45deg] group-hover:bg-white/10"></span>
                                <svg class="relative z-10 transition-all duration-300 ease-in-out -rotate-45 translate-x-0 group-hover:rotate-0 group-hover:translate-x-0"
                                    width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white"
                                    stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                    <polyline points="12 5 19 12 12 19" />
                                </svg>
                            </span>
                        </a>

                    </div>
                </div>

                {{-- ── Right Column — hero image from DB ── --}}
                <div class="w-full px-3 my-auto lg:w-5/12">
                    <img src="{{ $welcome->heroImageUrl() ?? asset('assets/images/submit-hire.png') }}"
                        alt="{{ $welcome->hero_image_alt ?? '3:1 Submit to Hire' }}"
                        class="h-auto max-w-[97%] md:max-w-full mt-10 hire">
                </div>

            </div>
        </div>
    </section>

@endif
