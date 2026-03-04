{{-- ============================================================
     Our Partners Section
     SAVE AS: resources/views/sections/homepagesections/ourclientsection.blade.php

     Section-level active/inactive: hides entire section when inactive.
     Partners: logo image, alt text — all from DB.
     All CSS/layout is IDENTICAL to the original.
============================================================ --}}

@php
    use App\Models\PartnerSectionSetting;
    use App\Models\Partner;

    $partnerSetting = PartnerSectionSetting::instance();
    $partners = Partner::published()->orderBy('sort_order')->get();
@endphp

@if ($partnerSetting->isActive())

    <section class="w-full py-16 bg-black">
        <div class="px-6 mx-auto max-w-7xl">

            {{-- Heading --}}
            <h2 class="block text-3xl tracking-tight text-center text-white md:hidden md:text-5xl mb-14"
                style="letter-spacing:-0.5px;">
                {{ $partnerSetting->heading }}
            </h2>
            <h2 class="hidden text-3xl font-semibold tracking-tight text-center text-white md:block md:text-5xl mb-14"
                style="letter-spacing:-0.5px;">
                {{ $partnerSetting->heading }}
            </h2>


            {{-- Logo row --}}
            @if ($partners->isNotEmpty())
                <div
                    class="grid items-center grid-cols-3 gap-[3rem] md:gap-[5.25rem] gap-y-10 md:grid-cols-3 lg:grid-cols-6">
                    @foreach ($partners as $partner)
                        <div class="flex items-center justify-center">
                            @if ($partner->link_url)
                                <a href="{{ url($partner->link_url) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ $partner->imageUrl() }}" alt="{{ $partner->alt_text }}"
                                        class="object-contain h-auto max-w-full">
                                </a>
                            @else
                                <img src="{{ $partner->imageUrl() }}" alt="{{ $partner->alt_text }}"
                                    class="object-contain h-auto max-w-full">
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </section>

@endif {{-- /section active check --}}
