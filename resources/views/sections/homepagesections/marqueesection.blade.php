@push('styles')
    <style>
        /* ── CSS Variables ── */
        .marquee-wrapper {
            --gap: 10px;
            --duration: 40s;
        }

        /* ── Marquee Track ── */
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

        /* ── Marquee Group ── */
        .marquee__group {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-around;
            gap: var(--gap);
            min-width: 100%;
            animation: scroll-x var(--duration) linear infinite;
        }

        /* Row 2 — reverse direction with offset so it doesn't start blank */
        .marquee--reverse .marquee__group {
            animation-direction: reverse;
            animation-delay: -3s;
        }

        /* Slow on hover — handled via JS to avoid animation restart */

        @keyframes scroll-x {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-100%);
            }
        }

        /* ── Pill Badge — exact original CSS ── */
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

        /* second row spacing */
        .marquee--reverse {
            margin-top: 10px;
        }

        /* Wrapper */
        .marquee-wrapper {
            display: flex;
            flex-direction: column;
            gap: var(--gap);
            max-width: 100vw;
        }

        /* ── Reduced motion ── */
        @media (prefers-reduced-motion: reduce) {
            .marquee__group {
                animation-play-state: paused;
            }
        }
    </style>
@endpush


{{-- ══════════════════════════════════════════════════════
     MARQUEE SECTION
     background: solid #000 — prevents hero image bleed
══════════════════════════════════════════════════════ --}}
<section class="relative py-10 overflow-hidden">

    @php
        $row1 = [
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Wordpress.svg', 'label' => 'WordPress'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Vue-Js.svg', 'label' => 'Vue Js'],
            [
                'img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Frame-1261153381.svg',
                'label' => 'Angular Js',
            ],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/PHP-Storm.svg', 'label' => 'PhpStorm'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Python.svg', 'label' => 'Python'],
            [
                'img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Ruby-Rails.svg',
                'label' => 'Ruby on Rails',
            ],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Webflow.svg', 'label' => 'Webflow'],
            [
                'img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Frame-1261153380.svg',
                'label' => 'Express Js',
            ],
            [
                'img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Frame-1261153379.svg',
                'label' => 'Shopify',
            ],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Node-js.svg', 'label' => 'Node Js'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/React-js.svg', 'label' => 'React Js'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Laravel.svg', 'label' => 'Laravel'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Dot-Net.svg', 'label' => '.Net'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Apple.svg', 'label' => 'iOS'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Android.svg', 'label' => 'Android'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Java-Script.svg', 'label' => 'JavaScript'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Mongo-DB.svg', 'label' => 'Mongo DB'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Next-js.svg', 'label' => 'Next Js'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Nuxt-Js.svg', 'label' => 'Nuxt Js'],
        ];

        $row2 = [
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Zoho-CRM.svg', 'label' => 'Zoho'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Zapier.svg', 'label' => 'Zapier'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Vs-Code.svg', 'label' => 'VS Code'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Photo-Shop.svg', 'label' => 'Photoshop'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Adobe-Xd.svg', 'label' => 'Adobe XD'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Adobe-Indesign.svg', 'label' => 'AI'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Amazon.svg', 'label' => 'Amazon'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Unbounce.svg', 'label' => 'Unbounce'],
            [
                'img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Click-Funnel.svg',
                'label' => 'Click Funnel',
            ],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Figma.svg', 'label' => 'Figma'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Express-Js.svg', 'label' => 'Express Js'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Zoho-CRM.svg', 'label' => 'Zoho'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Zapier.svg', 'label' => 'Zapier'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Vs-Code.svg', 'label' => 'VS Code'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Photo-Shop.svg', 'label' => 'Photoshop'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Figma.svg', 'label' => 'Figma'],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Amazon.svg', 'label' => 'Amazon'],
            [
                'img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Click-Funnel.svg',
                'label' => 'Click Funnel',
            ],
            ['img' => 'https://devdimensions.com/wp-content/uploads/2024/06/Unbounce.svg', 'label' => 'Unbounce'],
        ];
    @endphp

    <article class="marquee-wrapper">

        {{-- ── Row 1: left scroll ── --}}
        <div class="marquee">
            <div class="marquee__group">
                @foreach ($row1 as $item)
                    <div class="marqueeImg-parent">
                        <div class="marqueeImg">
                            <img src="{{ $item['img'] }}" alt="{{ $item['label'] }}">
                        </div>
                        <div class="marqueeText">{{ $item['label'] }}</div>
                    </div>
                @endforeach
            </div>
            <div class="marquee__group" aria-hidden="true">
                @foreach ($row1 as $item)
                    <div class="marqueeImg-parent">
                        <div class="marqueeImg">
                            <img src="{{ $item['img'] }}" alt="{{ $item['label'] }}">
                        </div>
                        <div class="marqueeText">{{ $item['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- ── Row 2: right scroll (reverse) ── --}}
        <div class="marquee marquee--reverse">
            <div class="marquee__group">
                @foreach ($row2 as $item)
                    <div class="marqueeImg-parent">
                        <div class="marqueeImg">
                            <img src="{{ $item['img'] }}" alt="{{ $item['label'] }}">
                        </div>
                        <div class="marqueeText">{{ $item['label'] }}</div>
                    </div>
                @endforeach
            </div>
            <div class="marquee__group" aria-hidden="true">
                @foreach ($row2 as $item)
                    <div class="marqueeImg-parent">
                        <div class="marqueeImg">
                            <img src="{{ $item['img'] }}" alt="{{ $item['label'] }}">
                        </div>
                        <div class="marqueeText">{{ $item['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

    </article>

</section>

@push('scripts')
    <script>
        (function() {
            /**
             * Smooth marquee slow-down on hover.
             *
             * Problem with CSS-only approach:
             *   Changing animation-duration resets the animation back to its start
             *   position, causing a visible "jump" (e.g. suddenly showing Amazon
             *   instead of whatever was mid-scroll).
             *
             * Solution:
             *   We use a WAAPI trick — getAnimations() lets us read & set
             *   playbackRate on the live animation WITHOUT restarting it.
             *   Rate 1 = normal, Rate 0.2 = 5× slower. The transition between
             *   rates is interpolated smoothly via updatePlaybackRate().
             */

            const NORMAL_RATE = 0.50;
            const SLOW_RATE = 0.30; // very slow but still visibly moving

            document.querySelectorAll('.marquee').forEach(function(track) {
                track.addEventListener('mouseenter', function() {
                    track.querySelectorAll('.marquee__group').forEach(function(group) {
                        group.getAnimations().forEach(function(anim) {
                            // updatePlaybackRate smoothly interpolates — no jump
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
