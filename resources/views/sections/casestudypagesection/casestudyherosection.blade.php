{{-- ============================================================
     Case Study Hero Section  —  DYNAMIC
     SAVE AS: resources/views/sections/casestudypagesection/casestudyherosection.blade.php

     Data source : CaseStudyHeroSection::live()
     Hides automatically when: no record, soft-deleted, or status = inactive.
============================================================ --}}

@php
    use App\Models\CaseStudyHeroSection;
    $hero = CaseStudyHeroSection::live();
@endphp

@if ($hero)
    <section class="relative w-full md:pt-[218px] pt-[140px] md:pb-[97px] pb-[60px]">

        {{-- Background Hero Image --}}
        <img src="{{ $hero->bgImageUrl() }}" alt="hero background"
            class="absolute inset-0 object-cover object-center w-full" style="z-index: -1;">

        {{-- Container --}}
        <div
            class="relative mx-auto px-6 lg:px-8
            max-w-full
            sm:max-w-[540px]
            md:max-w-[720px]
            lg:max-w-[960px]
            xl:max-w-[1140px]
            2xl:max-w-[1360px]">

            {{-- Centered content block --}}
            <div class="max-w-[802px] mx-auto text-center">

                {{-- Heading --}}
                <h1
                    class="text-[#E7E7E7] font-semibold tracking-[-1.16px]
                            text-[36px] sm:text-[48px] md:text-[58px]
                            leading-tight mb-5">
                    {{ $hero->heading }}
                    <span class="bg-gradient-to-r from-[#B51E17] to-[#FC3F37] bg-clip-text text-transparent"
                        style="-webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        {{ $hero->heading_highlight }}
                    </span>
                </h1>

                {{-- Paragraph --}}
                <p class="text-[#DBDBDB] leading-[26px] mb-0 text-base">
                    {{ $hero->description }}
                </p>

            </div>

        </div>

    </section>
@endif
