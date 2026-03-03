{{-- ============================================================
     Join Now Section  —  DYNAMIC
     SAVE AS: resources/views/sections/aboutuspagesection/joinnowsection.blade.php

     Data source : AboutJoinNowSection::live()
     Hides automatically when: no record, soft-deleted, or status = inactive.
============================================================ --}}

@php
    use App\Models\AboutJoinNowSection;
    $joinNow = AboutJoinNowSection::live();
@endphp

@if ($joinNow)

    <section class="relative w-full overflow-hidden py-14">

        {{-- Decorative dots --}}
        <span class="absolute left-[15%] top-[25%] w-2 h-2 rounded-full bg-gray-600 opacity-60"></span>
        <span class="absolute right-[25%] top-[18%] w-2 h-2 rounded-full bg-cyan-600 opacity-70"></span>

        <div class="container px-4 pb-12 mx-auto">
            <div class="max-w-[766px] mx-auto text-center">

                {{-- Logo --}}
                @if ($joinNow->logoUrl())
                    <img src="{{ $joinNow->logoUrl() }}" alt="{{ $joinNow->logo_alt ?? 'DevDimensions logo' }}"
                        class="mx-auto mb-10">
                @endif

                {{-- Heading --}}
                <h2
                    class="text-[#E7E7E7] text-4xl md:text-5xl font-semibold tracking-[-0.96px] mt-10 mb-5 leading-tight">
                    {{ $joinNow->heading }}
                </h2>

                {{-- Paragraph --}}
                <p class="text-[#DBDBDB] max-w-[671px] mx-auto text-base leading-relaxed mb-6">
                    {{ $joinNow->description }}
                </p>

                {{-- CTA Button --}}
                <a href="{{ url($joinNow->cta_url) }}"
                    class="relative inline-block mt-5 text-white transition-all duration-300 ease-in-out group"
                    style="border: 0;
                       font-size: 14px;
                       font-weight: 500;
                       text-transform: capitalize;
                       height: 44px;
                       line-height: 44px;
                       width: 188px;
                       padding: 0 60px 0 20px;
                       border-radius: 5px;
                       background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
                       text-decoration: none;
                       display: inline-block;"
                    onmouseover="this.style.background='rgba(181, 30, 23, 1)';"
                    onmouseout="this.style.background='linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%)'">

                    {{ $joinNow->cta_text }}

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
    </section>

@endif
