{{-- ============================================================
     Hire Us Section
     resources/views/sections/homepagesections/hireussection.blade.php
============================================================ --}}

<style>
    /* ── Hire box hover effect ── */
    .home-hire {
        transition: background 0.3s ease, border-color 0.3s ease;
    }

    /* Top + bottom gradient line pseudo-elements */
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
                transparent 0%,
                #B51E17 20%,
                #FC3F37 50%,
                #B51E17 80%,
                transparent 100%);
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

    /* Active (hover) state */
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

    /* Title turns red on hover */
    .home-hire.is-hovered h4 {
        color: #B51E17 !important;
    }

    /* Arrow SVG — base: transition for rotation */
    .home-hire h4 svg {
        transition: transform 0.3s ease;
        transform-origin: center;
    }

    /* Arrow SVG stroke turns red on hover */
    .home-hire.is-hovered h4 svg path {
        stroke: #B51E17;
    }

    /* Arrow rotates 45deg on hover — points right (→) */
    .home-hire.is-hovered h4 svg {
        transform: rotate(45deg);
    }
</style>

<section class="relative w-full py-16 overflow-hidden" style="background:#000;">


    {{-- Right shape (invisible / decorative) --}}
    {{-- No right image in local assets; glow handled via CSS below --}}
    <div class="absolute pointer-events-none"
        style="right:0; bottom:0; width:520px; height:420px; z-index:0;
                background: radial-gradient(ellipse at 80% 80%, rgba(140,18,8,0.18) 0%, transparent 70%);">
    </div>

    <div class="container relative px-4 mx-auto" style="max-width:1320px; z-index:1;">
        <div class="flex flex-wrap -mx-4">

            {{-- ── LEFT COLUMN ── --}}
            <div class="flex items-center w-full px-4 lg:w-1/2">
                <div style="max-width:510px; width:100%;">

                    <h2 class="m-0 mb-5 text-white"
                        style="
                               font-size:clamp(36px,3.5vw,52px);
                               line-height:1.1;
                               letter-spacing:-0.5px;
                               font-weight:600;">
                        We're the Utility Player
                    </h2>

                    <p
                        style="
                              font-size:18px;
                              color:#F3F3F3;
                              line-height:1.6;
                              margin-bottom:28px;">
                        Whether you need niche expertise or an entire project force,
                        we'll work directly with you to bring your project to life helping
                        cover any skill gaps along the way.
                    </p>

                    {{-- Check list --}}
                    <ul style="list-style:none; padding:0; margin:0 0 36px 0;">
                        @foreach (['Hire Individual Resource', 'Hire Multiple Resources', 'Hire Entire Team or Department'] as $item)
                            <li
                                style="
                                   font-size:18px;
                                   color:#E3E3E3;
                                   padding-left:35px;
                                   position:relative;
                                   margin-bottom:16px;">
                                {{-- Circle check icon via SVG inline --}}
                                <svg style="position:absolute; left:0; top:2px; width:20px; height:20px;"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="11" stroke="#fff" stroke-width="1.5" />
                                    <path d="M7.5 12.5l3 3 5.5-6" stroke="#fff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                {{ $item }}
                            </li>
                        @endforeach
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
         width: 228px;
          padding: 0 46px 0 20px;
          border-radius: 5px;
          background: linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%);
          text-decoration: none;
          display: inline-block;"
                        onmouseover="this.style.background='rgba(181, 30, 23, 1)';"
                        onmouseout="this.style.background='linear-gradient(90deg, rgba(181, 30, 23, 1) 0%, rgba(252, 63, 55, 1) 100%)'">

                        Get Free Consultation

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

            {{-- ── RIGHT COLUMN — Hire Boxes ── --}}
            <div class="w-full px-4 mt-10 lg:w-1/2 lg:mt-0">

                {{-- Box 1 — Hire Team Member --}}
                <div class="relative flex items-center gap-4 mb-6 cursor-pointer hire-box home-hire"
                    style="padding:20px;
                            border-radius:6px;
                            border:1px solid #636363;
                            background:rgba(95,95,95,0.12);
                            backdrop-filter:blur(21.5px);">
                    {{-- Image: fixed width, never squishes --}}
                    <div class="shrink-0" style="width:clamp(80px,15vw,130px);">
                        <img src="{{ asset('assets/images/HE.svg') }}" alt="Hire Team Member"
                            style="width:100%; height:auto; object-fit:contain; display:block;">
                    </div>
                    {{-- Content --}}
                    <div class="min-w-0">
                        <h4
                            style="
                                   font-size:clamp(16px,2.2vw,28px); color:#fff;
                                   margin-bottom:10px; font-weight:500;
                                   display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
                            Hire Team Member
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;">
                                <path d="M7 17L17 7M17 7H9M17 7v8" stroke="#B51E17" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </h4>
                        <p
                            style="color:#B7B7B7; font-size:clamp(12px,1.4vw,16px); line-height:1.67;
                                  margin:0; ">
                            Have a team but need to add a key player or two?
                            Draft your MVP's here. Our curated pool of talent
                            seamlessly integrates with your existing team,
                            ensuring rapid and efficient results.
                        </p>
                    </div>
                </div>

                {{-- Box 2 — Hire Entire Team --}}
                <div class="relative flex items-center gap-4 cursor-pointer hire-box home-hire"
                    style="padding:20px;
                            border-radius:6px;
                            border:1px solid #636363;
                            background:rgba(95,95,95,0.12);
                            backdrop-filter:blur(21.5px);">
                    {{-- Image: fixed width, never squishes --}}
                    <div class="shrink-0" style="width:clamp(80px,15vw,130px);">
                        <img src="{{ asset('assets/images/Group-626683-2.svg') }}" alt="Hire Entire Team"
                            style="width:100%; height:auto; object-fit:contain; display:block;">
                    </div>
                    {{-- Content --}}
                    <div class="min-w-0">
                        <h4
                            style="
                                   font-size:clamp(16px,2.2vw,28px); color:#fff;
                                   margin-bottom:10px; font-weight:500;
                                   display:flex; align-items:center; gap:8px; flex-wrap:wrap;">
                            Hire Entire Team
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" style="flex-shrink:0;">
                                <path d="M7 17L17 7M17 7H9M17 7v8" stroke="#B51E17" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </h4>
                        <p
                            style="color:#B7B7B7; font-size:clamp(12px,1.4vw,16px); line-height:1.67;
                                  margin:0; ">
                            Have an idea but no team to build it? Stack your
                            team or department with our designers, developers,
                            and project managers to ensure your core focus
                            remains on business growth.
                        </p>
                    </div>
                </div>

            </div>{{-- /right col --}}

        </div>{{-- /row --}}
    </div>{{-- /container --}}

</section>

{{-- ── Hover + click handler for hire-box --}}
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
