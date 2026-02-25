{{-- ============================================================
     Our Partners Section
     resources/views/sections/homepagesections/ourclientsection.blade.php
============================================================ --}}

<section class="w-full py-16 bg-black">
    <div class="px-6 mx-auto max-w-7xl">

        {{-- Heading --}}
        <h2 class="text-5xl font-semibold tracking-tight text-center text-white mb-14"
            style="font-family:'Gilroy-SemiBold', sans-serif; letter-spacing:-0.5px;">
            Our Partners
        </h2>

        {{-- Logo row --}}
        <div class="grid items-center grid-cols-2 gap-[5.25rem] gap-y-10 md:grid-cols-3 lg:grid-cols-6">

            @php
                $partners = [
                    ['src' => 'Mask-group.svg', 'alt' => 'Thinkrite'],
                    ['src' => 'Mask-group-1.svg', 'alt' => 'Ellianos Coffee'],
                    ['src' => 'logo-1-1.svg', 'alt' => 'Panoramic Ventures'],
                    ['src' => 'Mask-group-2.svg', 'alt' => 'FHG'],
                    ['src' => 'Frame-1261152960-1.svg', 'alt' => 'University of Pittsburgh'],
                    ['src' => 'Mask-group-3.svg', 'alt' => 'Virga Labs'],
                ];
            @endphp

            @foreach ($partners as $partner)
                <div class="flex items-center justify-center ">
                    <img src="{{ asset('assets/images/' . $partner['src']) }}" alt="{{ $partner['alt'] }}"
                        class="object-contain h-auto max-w-full">
                </div>
            @endforeach

        </div>

    </div>
</section>
