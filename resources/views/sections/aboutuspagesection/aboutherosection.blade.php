{{-- ============================================================
     About Hero Section
     resources/views/sections/aboutuspagesection/aboutherosection.blade.php
============================================================ --}}

<style>
    /* ── Rotating "Get in Touch" badge ── */
    .get-touch {
        position: absolute;
        bottom: -40px;
        right: 0px;
        z-index: 3;
        width: 170px;
        height: 170px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        cursor: pointer;
    }

    /* Dark circle bg — hidden by default, shown on hover */
    .get-touch::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background: rgba(10, 10, 10, 0.82);
        border: 1px solid rgba(255, 255, 255, 0.12);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 1;
    }

    .get-touch:hover::before {
        opacity: 1;
    }

    .get-circle {
        position: absolute;
        inset: 0;
        animation: rotateGetCircle 15s linear infinite;
        z-index: 2;
    }

    .get-circle img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .get-arrow {
        position: relative;
        z-index: 3;
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    /* Arrow SVG — base transition */
    .get-arrow svg {
        transition: transform 0.3s ease;
    }

    .get-touch:hover .get-arrow svg {
        transform: rotate(45deg);
    }

    .get-touch:hover .get-arrow svg path {
        stroke: #fff;
    }

    @keyframes rotateGetCircle {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }



    @media (max-width: 767px) {
        .get-touch {
            width: 50%;
            height: 50%;
            bottom: -70px;
            right: 25%;
        }


    }
</style>

{{-- Section — identical background structure to herosection.blade.php --}}
<section class="relative w-full pt-[120px] md:pt-[186px] md:pb-[97px] pb-[60px]">

    {{-- Background Hero Image — exact same tag as herosection.blade.php --}}
    <img src="{{ asset('assets/images/home-hero-1.png') }}" alt="hero background"
        class="absolute inset-0 object-cover object-center w-full " style="z-index: -1;">

    {{-- Container — _rel so get-touch positions relative to it --}}
    <div class="about-hero-container relative mx-auto px-6 lg:px-8 max-w-full sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1140px] 2xl:max-w-[1360px]"
        style="padding-bottom: 160px;">

        {{-- Centred content --}}
        <div class="max-w-[802px] mx-auto text-center">

            <h1 class="text-[#E7E7E7] mb-5 md:text-[58px] text-[35px] leading-[1.2]"
                style="font-weight:700; letter-spacing:-1.16px;">
                Discover DevDimensions:<br>
                <span
                    style="background:linear-gradient(90deg,rgba(181,30,23,1) 0%,rgba(252,63,55,1) 100%);
                             -webkit-text-fill-color:transparent;
                             -webkit-background-clip:text;
                             background-clip:text;">
                    Your Premier Talent Partner
                </span>
            </h1>

            <p class="text-[#DBDBDB] mb-0" style=" font-size:clamp(14px,1.5vw,17px); line-height:1.65;">
                At DD, we're all about the people. From our talent, teams, to partners:
                We believe the real magic lies in harnessing human potential. Winning,
                to us, means creating lasting relationships with our partners. We want
                to run marathons with you, not just the sprints.
            </p>

        </div>


        {{-- Rotating "Get in Touch" badge — inside container, absolute bottom-right --}}
        <a href="{{ url('/contact-us') }}" class="get-touch" aria-label="Get in Touch">
            <div class="get-circle">
                <img src="{{ asset('assets/images/about-get.png') }}" alt="Get in Touch">
            </div>
            <div class="get-arrow">
                <svg width="70" height="70" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 17L17 7M17 7H9M17 7v8" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </a>

    </div>{{-- /.container --}}

</section>
