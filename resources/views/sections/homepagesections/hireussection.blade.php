{{-- ============================================================
     Hire Us Section
     SAVE AS: resources/views/sections/homepagesections/hireussection.blade.php

     Section-level active/inactive: hides entire section when inactive.
     Left column: heading, subheading, checklist, CTA — all from DB.
     Right column: hire boxes — title, description, image, url from DB.
     All CSS/JS is IDENTICAL to the original.
============================================================ --}}

@php
    use App\Models\HireSectionSetting;
    use App\Models\HireBox;

    $hireSetting = HireSectionSetting::instance();
    $hireBoxes = HireBox::published()->orderBy('sort_order')->get();

    // Guard against double-encoded JSON stored in DB
    $checklistItems = $hireSetting->checklist_items;
    if (is_string($checklistItems)) {
        $checklistItems = json_decode($checklistItems, true);
    }
    if (is_string($checklistItems)) {
        // Still a string = was double-encoded; decode once more
        $checklistItems = json_decode($checklistItems, true);
    }
    $checklistItems = is_array($checklistItems) ? $checklistItems : [];
@endphp

@if ($hireSetting->isActive())

    <style>
        /* ── Hire box hover effect — identical to original ── */
        .home-hire {
            transition: background 0.3s ease, border-color 0.3s ease;
        }

        .home-hire::before,
        .home-hire::after {
            content: "";
            height: 1px;
            width: 0%;
            position: absolute;
            left: 50%;
            right: 50%;
            border-radius: 20px;
            background: linear-gradient(90deg,
                    transparent 0%, #B51E17 20%, #FC3F37 50%, #B51E17 80%, transparent 100%);
            transition: all 0.35s ease-in-out;
            z-index: 1;
        }

        .home-hire::before {
            top: 0;
        }

        .home-hire::after {
            bottom: 0;
            top: auto;
        }

        .home-hire.is-hovered {
            background: rgba(35, 4, 4, 0.32) !important;
            border-top-color: transparent !important;
            border-bottom-color: transparent !important;
            border-left-color: rgba(99, 99, 99, 0.27) !important;
            border-right-color: rgba(99, 99, 99, 0.27) !important;
        }

        .home-hire.is-hovered::before,
        .home-hire.is-hovered::after {
            width: 100%;
            left: 0;
            right: 0;
        }

        .home-hire.is-hovered h4 {
            color: #B51E17 !important;
        }

        .home-hire h4 svg {
            transition: transform 0.3s ease;
            transform-origin: center;
        }

        .home-hire.is-hovered h4 svg path {
            stroke: #B51E17;
        }

        .home-hire.is-hovered h4 svg {
            transform: rotate(45deg);
        }
    </style>

    <section class="relative w-full py-16 overflow-hidden" style="background:#000;">

        {{-- Decorative glow --}}
        <div class="absolute pointer-events-none"
            style="right:0; bottom:0; width:520px; height:420px; z-index:0;
            background: radial-gradient(ellipse at 80% 80%, rgba(140,18,8,0.18) 0%, transparent 70%);">
        </div>

        <div class="container relative px-4 mx-auto" style="max-width:1320px; z-index:1;">
            <div class="flex flex-wrap -mx-4">

                {{-- ── LEFT COLUMN ────────────────────────────────────────── --}}
                <div class="flex items-center w-full px-4 lg:w-1/2">
                    <div style="max-width:510px; width:100%;">

                        <h2 class="m-0 mb-5 text-white"
                            style="font-size:clamp(36px,3.5vw,52px); line-height:1.1;
                               letter-spacing:-0.5px; font-weight:600;">
                            {{ $hireSetting->heading }}
                        </h2>

                        <p style="font-size:18px; color:#F3F3F3; line-height:1.6; margin-bottom:28px;">
                            {{ $hireSetting->subheading }}
                        </p>

                        {{-- Checklist ──────────────────────────────────────── --}}
                        @if (!empty($checklistItems))
                            <ul style="list-style:none; padding:0; margin:0 0 36px 0;">
                                @foreach ($checklistItems as $item)
                                    <li
                                        style="font-size:18px; color:#E3E3E3; padding-left:35px;
                                           position:relative; margin-bottom:16px;">
                                        <svg style="position:absolute; left:0; top:2px; width:20px; height:20px;"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="11" stroke="#fff"
                                                stroke-width="1.5" />
                                            <path d="M7.5 12.5l3 3 5.5-6" stroke="#fff" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        {{-- CTA Button ─────────────────────────────────────── --}}
                        <a href="{{ url($hireSetting->cta_url) }}"
                            class="relative inline-block mt-5 text-white transition-all duration-300 ease-in-out group"
                            style="border: 0;
                               font-size: 14px;
                               font-weight: 500;
                               text-transform: capitalize;
                               height: 44px;
                               line-height: 44px;
                               width: 228px;
                               padding: 0 46px 0 20px;
                               border-radius: 5px;
                               background: linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%);
                               text-decoration: none;
                               display: inline-block;"
                            onmouseover="this.style.background='rgba(181,30,23,1)'"
                            onmouseout="this.style.background='linear-gradient(90deg,rgba(181,30,23,1) 0%,rgba(252,63,55,1) 100%)'">

                            {{ $hireSetting->cta_label }}

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

                {{-- ── RIGHT COLUMN — Hire Boxes ──────────────────────────── --}}
                <div class="w-full px-4 mt-10 lg:w-1/2 lg:mt-0">

                    @foreach ($hireBoxes as $i => $box)
                        <div class="relative flex items-center gap-4 cursor-pointer hire-box home-hire {{ $i < $hireBoxes->count() - 1 ? 'mb-6' : '' }}"
                            style="padding:20px;
                               border-radius:6px;
                               border:1px solid #636363;
                               background:rgba(95,95,95,0.12);
                               backdrop-filter:blur(21.5px);"
                            @if ($box->box_url) data-url="{{ url($box->box_url) }}" @endif>

                            {{-- Image --}}
                            @if ($box->imageUrl())
                                <div class="shrink-0" style="width:clamp(80px,15vw,130px);">
                                    <img src="{{ $box->imageUrl() }}" alt="{{ $box->title }}"
                                        style="width:100%; height:auto; object-fit:contain; display:block;">
                                </div>
                            @endif

                            {{-- Content --}}
                            <div class="min-w-0">
                                <h4
                                    style="font-size:clamp(16px,2.2vw,28px); color:#fff;
                                       margin-bottom:10px; font-weight:500;
                                       display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
                                    {{ $box->title }}
                                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;">
                                        <path d="M7 17L17 7M17 7H9M17 7v8" stroke="#B51E17" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </h4>
                                <p
                                    style="color:#B7B7B7; font-size:clamp(12px,1.4vw,16px);
                                      line-height:1.67; margin:0;">
                                    {{ $box->description }}
                                </p>
                            </div>

                        </div>
                    @endforeach

                </div>{{-- /right col --}}

            </div>{{-- /row --}}
        </div>{{-- /container --}}

    </section>

    {{-- ── Hover + click handler — identical to original ── --}}
    <script>
        document.querySelectorAll('.home-hire').forEach(function(box) {
            box.addEventListener('mouseenter', function() {
                box.classList.add('is-hovered');
            });
            box.addEventListener('mouseleave', function() {
                box.classList.remove('is-hovered');
            });
            box.addEventListener('click', function() {
                var url = box.getAttribute('data-url');
                if (url) window.location.href = url;
            });
        });
    </script>

@endif {{-- /section active check --}}
