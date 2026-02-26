@push('styles')
    <style>
        /* ── Vertical slot-machine text slider ── */
        .we-needs li {

            color: #D3D3D3;
            list-style: none;
            position: relative;
            font-weight: 500;
            display: flex;
            align-items: baseline;
            gap: 8px;
            overflow: hidden;
        }

        .we-needs li:not(:last-child) {
            margin-bottom: 18px;
        }

        /* The sliding container — clipped to one line height */
        .slide-hold {
            height: 30px;
            overflow: hidden;
            display: inline-block;
        }

        /* Inner track that animates upward */
        .slide-track {
            display: flex;
            flex-direction: column;
        }

        .slide-track span {
            height: 30px;
            line-height: 30px;
            display: block;
            white-space: nowrap;
            background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;

        }

        /* Slot 1 — 3 items cycling */
        .tex_slide1 {
            animation: slot1 6s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        .tex_slide2 {
            animation: slot2 6s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        .tex_slide3 {
            animation: slot3 6s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        }

        /* Each cycle: 3 items × 30px = 90px total. Pause on each for 2s, slide in 0.4s */
        @keyframes slot1 {
            0% {
                transform: translateY(0);
            }

            28% {
                transform: translateY(0);
            }

            33% {
                transform: translateY(-30px);
            }

            61% {
                transform: translateY(-30px);
            }

            66% {
                transform: translateY(-60px);
            }

            94% {
                transform: translateY(-60px);
            }

            99%,
            100% {
                transform: translateY(-90px);
            }
        }

        @keyframes slot2 {
            0% {
                transform: translateY(0);
            }

            28% {
                transform: translateY(0);
            }

            33% {
                transform: translateY(-30px);
            }

            61% {
                transform: translateY(-30px);
            }

            66% {
                transform: translateY(-60px);
            }

            94% {
                transform: translateY(-60px);
            }

            99%,
            100% {
                transform: translateY(-90px);
            }
        }

        @keyframes slot3 {
            0% {
                transform: translateY(0);
            }

            28% {
                transform: translateY(0);
            }

            33% {
                transform: translateY(-30px);
            }

            61% {
                transform: translateY(-30px);
            }

            66% {
                transform: translateY(-60px);
            }

            94% {
                transform: translateY(-60px);
            }

            99%,
            100% {
                transform: translateY(-90px);
            }
        }

        /* btn-theme — matches original */
        .btn-theme {
            position: relative;
            border: 0;
            font-size: 16px;
            font-weight: 500;
            text-transform: capitalize;
            height: 44px;
            line-height: 44px;
            min-width: 172px;
            padding: 0 48px 0 20px !important;
            border-radius: 5px;
            background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);

            color: #fff;
            display: inline-block;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-theme:hover {
            background: rgba(181, 30, 23, 1);
            color: #fff;
        }

        /* Arrow icon inside button */
        .btn-theme .btn-arrow {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translate(0, -50%) rotate(-45deg);
            width: 27px;
            height: 27px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease-in-out;
        }

        .btn-theme:hover .btn-arrow {
            transform: translate(0, -50%) rotate(0deg);
        }

        /* hire image alignment */
        .hire {
            margin-left: 20px;

        }
    </style>
@endpush


{{-- ══════════════════════════════════════════════════════
     WELCOME SECTION
══════════════════════════════════════════════════════ --}}
<section class="need w-full py-[50px] relative clear-both bg-no-repeat bg-cover bg-center">
    <div
        class="w-full px-3 mx-auto
                sm:max-w-[540px]
                md:max-w-[720px]
                lg:max-w-[960px]
                xl:max-w-[1140px]
                2xl:max-w-[1320px]">

        <div class="flex flex-wrap -mx-3">

            {{-- ── Left Column ── --}}
            <div class="w-full px-3 lg:w-7/12">
                <div style="max-width: 606px; width: 100%;">

                    {{-- Heading --}}
                    <h2 class="text-4xl md:text-5xl"
                        style="
                        line-height: normal;
                        letter-spacing: -0.96px;
                        margin-bottom: 20px;
                        color: #fff;
                    ">
                        Welcome to DevDimensions
                    </h2>

                    {{-- Subtext --}}
                    <p class="text-sm md:text-[16px]" style="color: #DBDBDB;  line-height: 2; margin-bottom: 20px;">
                        We solve those hiring headaches. No we aren't doctors, just former exited
                        founders with a proven process that has worked for us. From websites,
                        applications, to enterprise solutions, we don't just design + develop;
                        we become your innovation partner.
                    </p>

                    {{-- ── Vertical Text Slider List ── --}}
                    <ul class="we-needs mt-[44px] mb-0 p-0 ">

                        {{-- Line 1: I need a [role] --}}
                        <li>
                            <span class=" shrink-0">I need a</span>
                            <div class="slide-hold">
                                <div class="slide-track tex_slide1">
                                    <span> Full Stack Developer</span>
                                    <span> Product Designer</span>
                                    <span> QA Testing Analyst</span>
                                    {{-- duplicate first for seamless loop --}}
                                    <span> Full Stack Developer</span>
                                </div>
                            </div>
                        </li>

                        {{-- Line 2: that specializes in [skill] --}}
                        <li>
                            <span class="shrink-0">that specializes in</span>
                            <div class="slide-hold">
                                <div class="slide-track tex_slide2">
                                    <span> MERN Stack</span>
                                    <span> Prototyping</span>
                                    <span> Automated Testing</span>
                                    <span> MERN Stack</span>
                                </div>
                            </div>
                        </li>

                        {{-- Line 3: for [purpose] --}}
                        <li>
                            <span class="shrink-0">for</span>
                            <div class="slide-hold">
                                <div class="slide-track tex_slide3">
                                    <span> Web Application</span>
                                    <span> UX Optimization</span>
                                    <span> Bug Detection</span>
                                    <span> Web Application</span>
                                </div>
                            </div>
                        </li>

                    </ul>

                    {{-- CTA Button --}}
                    <a href="{{ url('/contact-us') }}"
                        class="relative inline-block mt-5 text-white transition-all duration-300 ease-in-out group"
                        style="border: 0;
          
          font-size: 14px;
          font-weight: 500;
          text-transform: capitalize;
          height: 44px;
          line-height: 44px;
         width: 170px;
          padding: 0 36px 0 20px;
          border-radius: 5px;
          background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
          text-decoration: none;
          display: inline-block;"
                        onmouseover="this.style.background='rgba(181, 30, 23, 1)';"
                        onmouseout="this.style.background='linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%)'">

                        Request Quote

                        {{-- Icon Wrapper --}}
                        <span
                            class="absolute top-1/2 right-2 -translate-y-1/2 flex items-center justify-center w-[30px] h-[30px]">

                            {{-- Diamond Background Shape (Starts at 0, rotates to 45) --}}
                            <span
                                class="absolute inset-0 bg-white/20 rounded-[4px] transition-all duration-300 ease-in-out group-hover:rotate-[45deg] group-hover:bg-white/10"></span>

                            {{-- Arrow Icon (Starts horizontal, rotates to top-right corner) --}}
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

            {{-- ── Right Column ── --}}
            <div class="w-full px-3 my-auto lg:w-5/12">
                <img src="{{ asset('assets/images/submit-hire.png') }}" alt="3:1 Submit to Hire"
                    class="h-auto max-w-[97%] md:max-w-full mt-10 hire">
            </div>

        </div>
    </div>
</section>
