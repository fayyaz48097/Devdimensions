{{--
    SAVE AS: resources/views/sections/homepagesections/marqueesection.blade.php

    Dynamic marquee — reads active, non-deleted items from `marquee_items`.
    • Row 1 → scrolls left
    • Row 2 → scrolls right (reverse)
    Section is hidden entirely when both rows have zero active items.

    Icon rendering:
      Seeded rows store a full external URL in `icon_path`.
      Uploaded rows store a storage-relative path — resolved via iconUrl().
      We detect which by checking for "http" prefix.
--}}

@php
    use App\Models\MarqueeItem;
    $row1 = MarqueeItem::published()->forRow(1)->orderBy('sort_order')->get();
    $row2 = MarqueeItem::published()->forRow(2)->orderBy('sort_order')->get();
@endphp

@if ($row1->isNotEmpty() || $row2->isNotEmpty())

    @push('styles')
        <style>
            .marquee-wrapper {
                --gap: 10px;
                --duration: 40s;
            }

            .marquee {
                display: flex;
                overflow: hidden;
                user-select: none;
                gap: var(--gap);
                mask-image: linear-gradient(var(--mask-direction, to right),
                        hsl(0 0% 0% / 0),
                        hsl(0 0% 0% / 1) 20%,
                        hsl(0 0% 0% / 1) 80%,
                        hsl(0 0% 0% / 0));
                -webkit-mask-image: linear-gradient(var(--mask-direction, to right),
                        hsl(0 0% 0% / 0),
                        hsl(0 0% 0% / 1) 20%,
                        hsl(0 0% 0% / 1) 80%,
                        hsl(0 0% 0% / 0));
            }

            .marquee__group {
                flex-shrink: 0;
                display: flex;
                align-items: center;
                justify-content: space-around;
                gap: var(--gap);
                min-width: 100%;
                animation: scroll-x var(--duration) linear infinite;
            }

            .marquee--reverse .marquee__group {
                animation-direction: reverse;
                animation-delay: -3s;
            }

            @keyframes scroll-x {
                from {
                    transform: translateX(0);
                }

                to {
                    transform: translateX(-100%);
                }
            }

            .marqueeImg-parent {
                max-width: 220px;
                aspect-ratio: 16 / 9;
                height: 60px;
                display: flex;
                align-items: center;
                border-radius: 40px;
                background: rgb(220 220 220 / 7%);
                justify-content: center;
                padding: 0px 25px;
                width: 220px !important;
                margin: 0 10px;
                border: 1px solid #dcdcdc4f;
                flex-shrink: 0;
                transition: background 0.3s ease, border-color 0.3s ease;
            }

            .marqueeImg-parent:hover {
                background: rgb(220 220 220 / 13%);
                border-color: #dcdcdc90;
            }

            .marqueeImg {
                width: 100% !important;
                padding: 0 !important;
                max-width: 30px !important;
                margin-right: 8px !important;
                display: flex;
                justify-content: flex-start;
                flex-shrink: 0;
            }

            .marqueeImg img {
                max-width: 30px !important;
                height: 28px !important;
                width: 100% !important;
                object-fit: contain;
                padding: 0 !important;
            }

            .marqueeText {
                font-size: 15px;
                color: #E7E7E7;
                white-space: nowrap;
            }

            .marquee--reverse {
                margin-top: 10px;
            }

            .marquee-wrapper {
                display: flex;
                flex-direction: column;
                gap: var(--gap);
                max-width: 100vw;
            }

            @media (prefers-reduced-motion: reduce) {
                .marquee__group {
                    animation-play-state: paused;
                }
            }
        </style>
    @endpush

    <section class="relative py-10 overflow-hidden">
        <article class="marquee-wrapper">

            {{-- ── Row 1: scrolls left ── --}}
            @if ($row1->isNotEmpty())
                <div class="marquee">
                    {{-- Real items --}}
                    <div class="marquee__group">
                        @foreach ($row1 as $item)
                            <div class="marqueeImg-parent">
                                <div class="marqueeImg">
                                    @php
                                        $src = str_starts_with($item->icon_path ?? '', 'http')
                                            ? $item->icon_path
                                            : $item->iconUrl();
                                    @endphp
                                    <img src="{{ $src }}" alt="{{ $item->label }}">
                                </div>
                                <div class="marqueeText">{{ $item->label }}</div>
                            </div>
                        @endforeach
                    </div>
                    {{-- Duplicate for seamless loop --}}
                    <div class="marquee__group" aria-hidden="true">
                        @foreach ($row1 as $item)
                            <div class="marqueeImg-parent">
                                <div class="marqueeImg">
                                    @php
                                        $src = str_starts_with($item->icon_path ?? '', 'http')
                                            ? $item->icon_path
                                            : $item->iconUrl();
                                    @endphp
                                    <img src="{{ $src }}" alt="{{ $item->label }}">
                                </div>
                                <div class="marqueeText">{{ $item->label }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- ── Row 2: scrolls right (reverse) ── --}}
            @if ($row2->isNotEmpty())
                <div class="marquee marquee--reverse">
                    <div class="marquee__group">
                        @foreach ($row2 as $item)
                            <div class="marqueeImg-parent">
                                <div class="marqueeImg">
                                    @php
                                        $src = str_starts_with($item->icon_path ?? '', 'http')
                                            ? $item->icon_path
                                            : $item->iconUrl();
                                    @endphp
                                    <img src="{{ $src }}" alt="{{ $item->label }}">
                                </div>
                                <div class="marqueeText">{{ $item->label }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="marquee__group" aria-hidden="true">
                        @foreach ($row2 as $item)
                            <div class="marqueeImg-parent">
                                <div class="marqueeImg">
                                    @php
                                        $src = str_starts_with($item->icon_path ?? '', 'http')
                                            ? $item->icon_path
                                            : $item->iconUrl();
                                    @endphp
                                    <img src="{{ $src }}" alt="{{ $item->label }}">
                                </div>
                                <div class="marqueeText">{{ $item->label }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </article>
    </section>

    @push('scripts')
        <script>
            (function() {
                const NORMAL_RATE = 0.50;
                const SLOW_RATE = 0.30;

                document.querySelectorAll('.marquee').forEach(function(track) {
                    track.addEventListener('mouseenter', function() {
                        track.querySelectorAll('.marquee__group').forEach(function(group) {
                            group.getAnimations().forEach(function(anim) {
                                anim.updatePlaybackRate(SLOW_RATE);
                            });
                        });
                    });

                    track.addEventListener('mouseleave', function() {
                        track.querySelectorAll('.marquee__group').forEach(function(group) {
                            group.getAnimations().forEach(function(anim) {
                                anim.updatePlaybackRate(NORMAL_RATE);
                            });
                        });
                    });
                });
            })();
        </script>
    @endpush

@endif {{-- end: at least one row has items --}}
