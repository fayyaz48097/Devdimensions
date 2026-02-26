{{-- ============================================================
     Core Values Section
     resources/views/sections/aboutuspagesection/corevaluesection.blade.php
     Mirrors original WordPress structure exactly:
     .core-values[bg] > .container > h2 + .max-785.mob_none > img
                      > .core_mob > img
============================================================ --}}
<style>
    .core_mob {
        display: none;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover,
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
        -webkit-text-fill-color: #E5E5E5;
        -webkit-box-shadow: 0 0 0px 0px rgba(176, 176, 176, 0.09) inset;
        transition: background-color 5000s ease-in-out 0s;
    }

    .core-values {
        background-image: none !important;
    }

    .letter_-096 {
        letter-spacing: -0.96px;
    }
</style>
<section class="core-values" style="background-image: url({{ asset('assets/images/about-bg.png') }});">

    {{-- Desktop layout --}}
    <div
        class="mx-auto px-6 lg:px-8 max-w-full sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1140px] 2xl:max-w-[1320px]">


        <h1 class="text-[#E7E7E7] text-center mb-5 md:text-[48px] text-[35px] leading-[1.2]"
            style="font-weight:600; letter-spacing:-1.16px;">
            Our Core Values
        </h1>

        {{-- Circle diagram — desktop only (.mob_none hides on mobile) --}}
        <div class="flex justify-center mx-auto my-auto mt-10 max-785">
            <img src="{{ asset('assets/images/Frame-1261152973-1-1.png') }}" alt="Our Core Values Diagram"
                class="my-auto w-100">
        </div>

    </div>

    {{-- Circle diagram — mobile only (.core_mob shows on mobile) --}}
    <div class="core_mob ">
        <img src="{{ asset('assets/images/Frame-1261152973-1-1.png') }}" alt="Our Core Values Diagram" class="w-100">
    </div>

</section>
