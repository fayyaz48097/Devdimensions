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
                        style="font-family:'Gilroy-SemiBold',sans-serif;
                               font-size:clamp(36px,3.5vw,52px);
                               line-height:1.1;
                               letter-spacing:-0.5px;
                               font-weight:600;">
                        We're the Utility Player
                    </h2>

                    <p
                        style="font-family:'Gilroy-Regular',sans-serif;
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
                                style="font-family:'Gilroy-Regular',sans-serif;
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
                    <button class=" btn-theme" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"
                        style="display:inline-flex; align-items:center; gap:10px;
                                   background:linear-gradient(90deg,#B51E17 0%,#FC3F37 100%);
                                   border:0; color:#fff; font-size:16px;
                                   font-family:'Gilroy-Medium',sans-serif;
                                   font-weight:500; height:48px; line-height:1;
                                   padding:0 48px 0 20px; border-radius:5px;
                                   cursor:pointer; position:relative; min-width:172px;
                                   text-align:left;">
                        Get Free Consultation
                        <svg style="position:absolute; right:10px; top:50%; transform:translateY(-50%);
                                    width:26px; height:26px;"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 17L17 7M17 7H9M17 7v8" stroke="#fff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>

                </div>
            </div>

            {{-- ── RIGHT COLUMN — Hire Boxes ── --}}
            <div class="w-full px-4 mt-10 lg:w-1/2 lg:mt-0">

                {{-- Box 1 — Hire Team Member --}}
                <div class="mb-6 hire-box home-hire"
                    style="padding:30px;
                            border-radius:6px;
                            border:1px solid #636363;
                            background:rgba(95,95,95,0.12);
                            backdrop-filter:blur(21.5px);
                            padding-left:210px;
                            display:flex;
                            align-items:center;
                            position:relative;
                            cursor:pointer;">
                    <img src="{{ asset('assets/images/HE.svg') }}" alt="Hire Team Member"
                        style="width:130px; position:absolute; left:30px; top:50%;
                                transform:translateY(-50%); object-fit:contain;">
                    <div>
                        <h4
                            style="font-family:'Gilroy-Medium',sans-serif;
                                   font-size:28px; color:#fff;
                                   margin-bottom:15px; font-weight:500;
                                   display:flex; align-items:center; gap:10px;">
                            Hire Team Member
                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 17L17 7M17 7H9M17 7v8" stroke="#B51E17" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </h4>
                        <p
                            style="color:#B7B7B7; font-size:16px; line-height:1.67;
                                  max-width:380px; width:100%; margin:0;
                                  font-family:'Gilroy-Regular',sans-serif;">
                            Have a team but need to add a key player or two?
                            Draft your MVP's here. Our curated pool of talent
                            seamlessly integrates with your existing team,
                            ensuring rapid and efficient results.
                        </p>
                    </div>
                </div>

                {{-- Box 2 — Hire Entire Team --}}
                <div class="hire-box home-hire"
                    style="padding:30px;
                            border-radius:6px;
                            border:1px solid #636363;
                            background:rgba(95,95,95,0.12);
                            backdrop-filter:blur(21.5px);
                            padding-left:210px;
                            display:flex;
                            align-items:center;
                            position:relative;
                            cursor:pointer;">
                    <img src="{{ asset('assets/images/Group-626683-2.svg') }}" alt="Hire Entire Team"
                        style="width:130px; position:absolute; left:30px; top:50%;
                                transform:translateY(-50%); object-fit:contain;">
                    <div>
                        <h4
                            style="font-family:'Gilroy-Medium',sans-serif;
                                   font-size:28px; color:#fff;
                                   margin-bottom:15px; font-weight:500;
                                   display:flex; align-items:center; gap:10px;">
                            Hire Entire Team
                            <svg width="35" height="35" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 17L17 7M17 7H9M17 7v8" stroke="#B51E17" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </h4>
                        <p
                            style="color:#B7B7B7; font-size:16px; line-height:1.67;
                                  max-width:380px; width:100%; margin:0;
                                  font-family:'Gilroy-Regular',sans-serif;">
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
