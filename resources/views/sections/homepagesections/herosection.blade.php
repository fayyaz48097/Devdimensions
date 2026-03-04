{{--
    SAVE AS: resources/views/sections/homepagesections/herosection.blade.php

    Dynamic hero section — reads from `home_hero_sections` DB record.
    Rules:
      • Hidden if no record exists
      • Hidden if record is soft-deleted
      • Hidden if status = 'inactive'
    Falls back to static assets when DB images are not yet uploaded.
--}}

@php
    use App\Models\HomeHeroSection;
    $hero = HomeHeroSection::published()->latest()->first();
@endphp

@if ($hero)
    {{-- Hero Section --}}
    <section class="relative w-full lg:pt-[284px] pt-[150px] pb-[50px] lg:pb-[126px]">

        {{-- Background Hero Image --}}
        <img src="{{ $hero->bgImageUrl() ?? asset('assets/images/home-hero-1.png') }}" alt="hero background"
            class="absolute inset-0 object-cover object-center w-full" style="z-index: -1;">

        {{-- Container --}}
        <div
            class="mx-auto px-6 lg:px-8 max-w-full sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1140px] 2xl:max-w-[1360px]">
            <div class="flex flex-wrap items-center -mx-3">

                {{-- Left Column --}}
                <div class="w-full px-3 mb-auto lg:w-1/2">

                    {{-- Heading --}}
                    <h1 class="font-gilroy text-[#E7E7E7] mb-1 md:text-[58px] text-[35px] leading-[1.2] tracking-[-1.16px]"
                        style="letter-spacing: -1.16px; font-weight: 600;">
                        <span>{{ $hero->heading_plain }} </span>
                        <span
                            style="background: linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%);
                                 -webkit-text-fill-color: transparent;
                                 -webkit-background-clip: text;
                                 background-clip: text;">{{ $hero->heading_gradient }}</span>
                    </h1>

                    {{-- Paragraph --}}
                    <p class="text-[#DCDCDC] mb-5"
                        style="max-width: 475px; width: 100%; font-weight: 500; line-height: 1.5;">
                        {{ $hero->paragraph_text }}

                        @if ($hero->paragraph_highlight_1)
                            <span
                                style="background: linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%);
                                     -webkit-text-fill-color: transparent;
                                     -webkit-background-clip: text;
                                     background-clip: text;">{{ $hero->paragraph_highlight_1 }}</span>
                        @endif

                        @if ($hero->paragraph_highlight_2)
                            and
                            <span
                                style="background: linear-gradient(90deg, rgba(181,30,23,1) 0%, rgba(252,63,55,1) 100%);
                                     -webkit-text-fill-color: transparent;
                                     -webkit-background-clip: text;
                                     background-clip: text;">{{ $hero->paragraph_highlight_2 }}</span>
                        @endif
                    </p>

                    {{-- CTA Button --}}
                    <a href="{{ $hero->cta_url }}"
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

                        {{ $hero->cta_label }}

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

                {{-- Right Column --}}
                <div class="w-full px-3 my-auto mt-10 lg:w-1/2 text-end lg:mt-0">
                    <div style="margin-top: 15px;">
                        {{-- Desktop Image --}}
                        <img src="{{ $hero->rightImageDesktopUrl() ?? asset('assets/images/Right-Side-_1_.webp') }}"
                            alt="Dream Team Right Side" class="hidden h-auto max-w-full lg:inline-block">

                        {{-- Mobile Image --}}
                        <img src="{{ $hero->rightImageMobileUrl() ?? asset('assets/images/Frame-1261152964-1-optimized-1.webp') }}"
                            alt="Dream Team Mobile" class="w-full h-auto  lg:hidden">
                    </div>
                </div>

            </div>
        </div>
    </section>
@endif
