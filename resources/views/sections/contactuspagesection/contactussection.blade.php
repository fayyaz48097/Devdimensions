{{-- ============================================================
     Contact Us Section — 3-Step Form
     Pixel-perfect match to original WordPress design
============================================================ --}}

<style>
    /* ─── Progress Bar ─── */
    .dd-probar {
        display: flex;
        align-items: flex-start;
        position: relative;
        padding-bottom: 0;
        margin-bottom: 0;
    }

    /* the full grey track */
    .dd-probar-track {
        position: absolute;
        top: 21px;
        left: 0;
        right: 0;
        height: 2px;
        background: #333;
        z-index: 0;
    }

    /* red filled portion */
    .dd-probar-fill {
        position: absolute;
        top: 21px;
        left: 0;
        height: 2px;
        background: linear-gradient(90deg, #B51E17 0%, #FC3F37 100%);
        z-index: 1;
        transition: width 0.4s ease;
    }

    /* each point col */
    .dd-probar .dd-point {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
    }

    .dd-probar .dd-point:nth-child(3) {
        /* 01 — left */
        align-items: flex-start;
        flex: 0 0 auto;
    }

    .dd-probar .dd-point:nth-child(4) {
        /* 02 — center */
        flex: 1;
        align-items: center;
    }

    .dd-probar .dd-point:nth-child(5) {
        /* 03 — right */
        flex: 0 0 auto;
        align-items: flex-end;
    }

    /* the circle */
    .dd-point .dd-circle {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-family: 'Gilroy-SemiBold', sans-serif;
        letter-spacing: 0.3px;
        border: 1.5px solid #444;
        background: #111;
        color: #888;
        transition: all 0.3s;
    }

    .dd-point.active .dd-circle {
        background: linear-gradient(135deg, #B51E17 0%, #FC3F37 100%);
        border-color: transparent;
        color: #fff;
    }

    .dd-point .dd-label {
        margin-top: 16px;
        font-size: 14px;
        line-height: 1.45;
        font-family: 'Gilroy-Regular', sans-serif;
        color: rgba(229, 229, 229, 0.35);
        transition: color 0.3s;
    }

    .dd-point.active .dd-label {
        color: #E5E5E5;
        font-family: 'Gilroy-SemiBold', sans-serif;
    }

    /* 01 label left, 02 label center, 03 label right */
    .dd-probar .dd-point:nth-child(3) .dd-label {
        text-align: left;
    }

    .dd-probar .dd-point:nth-child(4) .dd-label {
        text-align: center;
    }

    .dd-probar .dd-point:nth-child(5) .dd-label {
        text-align: right;
    }

    /* ─── Steps ─── */
    .dd-step {
        display: none;
    }

    .dd-step.dd-active {
        display: block;
    }

    /* ─── Form card top ─── */
    .dd-card-top {
        margin-top: 30px;
        background: rgba(22, 14, 14, 0.72);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-bottom: none;
        border-radius: 12px 12px 0 0;
        padding: 40px 48px 12px;
    }

    /* ─── Form card bottom (button row) ─── */
    .dd-card-bot {
        background: rgba(22, 14, 14, 0.72);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 0 0 12px 12px;
        padding: 28px 48px 44px;
        display: flex;
        justify-content: flex-end;
        gap: 14px;
    }

    .dd-card-bot.spaced {
        justify-content: space-between;
    }

    /* ─── Labels ─── */
    .dd-form label {
        display: block;
        color: #E5E5E5;
        font-size: 20px;
        font-family: 'Gilroy-Regular', sans-serif;
        margin-bottom: 12px;
        font-weight: 400;
    }

    .dd-form .dd-fg {
        margin-bottom: 32px;
    }

    /* ─── Text inputs ─── */
    .dd-form input[type="text"],
    .dd-form input[type="email"],
    .dd-form textarea {
        display: block;
        width: 100%;
        height: 56px;
        border-radius: 8px;
        border: 1px solid #2b2b2b;
        background: rgba(255, 255, 255, 0.035);
        color: #E5E5E5;
        padding: 0 18px;
        font-size: 16px;
        font-family: 'Gilroy-Regular', sans-serif;
        outline: none;
        transition: border-color 0.25s;
        box-sizing: border-box;
    }

    .dd-form input[type="text"]:focus,
    .dd-form input[type="email"]:focus,
    .dd-form textarea:focus {
        border-color: rgba(181, 30, 23, 0.55);
    }

    .dd-form input.dd-err,
    .dd-form textarea.dd-err {
        border-color: #dc3232 !important;
    }

    .dd-form textarea {
        height: 170px;
        padding: 16px 18px;
        resize: vertical;
    }

    /* ─── Phone row ─── */
    .dd-phone {
        display: flex;
        height: 56px;
        border-radius: 8px;
        border: 1px solid #2b2b2b;
        background: rgba(255, 255, 255, 0.035);
        position: relative;
        overflow: visible;
        transition: border-color 0.25s;
    }

    .dd-phone.focus {
        border-color: rgba(181, 30, 23, 0.55);
    }

    .dd-flag-btn {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 0 14px;
        border-right: 1px solid #2b2b2b;
        cursor: pointer;
        flex-shrink: 0;
        user-select: none;
        position: relative;
        height: 100%;
    }

    .dd-flag-btn img {
        width: 24px;
        height: 16px;
        object-fit: cover;
        border-radius: 2px;
    }

    .dd-flag-btn .dd-dial {
        color: #E5E5E5;
        font-size: 15px;
        font-family: 'Gilroy-Regular', sans-serif;
    }

    .dd-flag-btn .dd-caret {
        color: #555;
        font-size: 8px;
        margin-top: 1px;
    }

    .dd-phone input[type="text"] {
        border: none !important;
        background: transparent;
        height: 100%;
        flex: 1;
        border-radius: 0;
        padding-left: 14px;
    }

    .dd-country-dd {
        display: none;
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        z-index: 9999;
        background: #161616;
        border: 1px solid #2b2b2b;
        border-radius: 10px;
        width: 270px;
        max-height: 230px;
        overflow-y: auto;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
    }

    .dd-country-dd.open {
        display: block;
    }

    .dd-country-dd .dd-copt {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        cursor: pointer;
        color: #E5E5E5;
        font-size: 13px;
        font-family: 'Gilroy-Regular', sans-serif;
    }

    .dd-country-dd .dd-copt:hover {
        background: rgba(181, 30, 23, 0.18);
    }

    .dd-country-dd .dd-copt img {
        width: 22px;
        height: 14px;
        object-fit: cover;
        border-radius: 2px;
    }

    .dd-country-dd .dd-copt .dd-cdial {
        margin-left: auto;
        color: #555;
        font-size: 12px;
    }

    /* ─── Buttons ─── */
    .dd-btn-next,
    .dd-btn-back,
    .dd-btn-sub {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        height: 52px;
        padding: 0 24px;
        border-radius: 10px;
        border: none;
        font-size: 16px;
        font-family: 'Gilroy-Medium', sans-serif;
        color: #fff;
        cursor: pointer;
        transition: all 0.25s;
        min-width: 135px;
        justify-content: space-between;
    }

    .dd-btn-next,
    .dd-btn-sub {
        background: linear-gradient(90deg, #B51E17 0%, #FC3F37 100%);
    }

    .dd-btn-next:hover,
    .dd-btn-sub:hover {
        background: #B51E17;
    }

    .dd-btn-back {
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.1);
        min-width: 115px;
    }

    .dd-btn-back:hover {
        background: rgba(255, 255, 255, 0.11);
    }

    .dd-btn-icon {
        width: 22px;
        height: 22px;
        flex-shrink: 0;
    }

    /* ─── Service cards (step 2) ─── */
    .dd-svc-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 16px;
    }

    .dd-svc {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 8px;
        border: 1px solid #2b2b2b;
        background: rgba(255, 255, 255, 0.035);
        color: #E5E5E5;
        font-size: 14px;
        font-family: 'Gilroy-Regular', sans-serif;
        cursor: pointer;
        transition: border-color 0.22s;
        flex: 1 0 calc(20% - 10px);
        min-width: 140px;
    }

    .dd-svc img {
        width: 28px;
        height: 28px;
        object-fit: contain;
    }

    .dd-svc:hover {
        border-color: rgba(181, 30, 23, 0.45);
    }

    .dd-svc.on {
        border-color: #B51E17;
        background: rgba(181, 30, 23, 0.07);
    }

    /* ─── Radio pills (step 3) ─── */
    .dd-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 12px;
    }

    .dd-pills label {
        cursor: pointer;
        margin: 0;
    }

    .dd-pills label input {
        display: none;
    }

    .dd-pills label span {
        display: block;
        padding: 10px 20px;
        border-radius: 8px;
        border: 1px solid #2b2b2b;
        background: rgba(255, 255, 255, 0.035);
        color: #E5E5E5;
        font-size: 14px;
        font-family: 'Gilroy-Regular', sans-serif;
        transition: border-color 0.22s;
        white-space: nowrap;
    }

    .dd-pills label input:checked+span {
        border-color: #B51E17;
        background: rgba(181, 30, 23, 0.07);
    }

    .dd-pills label span:hover {
        border-color: rgba(181, 30, 23, 0.45);
    }

    /* ─── Success ─── */
    .dd-success {
        display: none;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 80px 30px;
        background: rgba(22, 14, 14, 0.72);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        width: 100%;
        max-width: 1160px;
        margin: 0 auto;
    }

    .dd-success .dd-tick {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: linear-gradient(135deg, #B51E17 0%, #FC3F37 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 24px;
        font-size: 34px;
        color: #fff;
    }

    @media(max-width: 767px) {
        .dd-card-top {
            padding: 28px 22px 8px;
        }

        .dd-card-bot {
            padding: 20px 22px 32px;
        }

        .dd-svc {
            flex: 1 0 calc(50% - 10px);
        }

        .dd-probar .dd-point .dd-label {
            font-size: 11px;
        }
    }
</style>

{{-- ══ SECTION ══ --}}
<section id="dd-section" class="relative w-full overflow-hidden" style="padding: 185px 0 100px;">

    {{-- Background — identical to herosection.blade.php --}}
    <img src="{{ asset('assets/images/home-hero-1.png') }}" alt=""
        class="absolute inset-0 object-cover object-center w-full" style="z-index: -1;">

    <div
        class="mx-auto px-6 lg:px-8 max-w-full
                sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px]
                xl:max-w-[1140px] 2xl:max-w-[1360px]">

        {{-- Heading --}}
        <div id="dd-intro">
            <h1 class="text-center md:text-[58px] text-4xl"
                style="
                   color:#E7E7E7;  font-weight:600;
                   letter-spacing:-1.16px; line-height:1.1; margin-bottom:20px;">
                Let's <span class="text-[#D62D26]">Collaborate</span>. We're All Ears!
            </h1>

            {{-- Subtitle --}}
            <p class="text-center grey-DB f-16" style="max-width:820px; margin:0 auto; line-height:1.65;">
                Unlock the gateway to collaboration by sharing your personal details, project aspirations,
                and desired timelines. Let our connection become the bridge that brings your vision to life,
                as we navigate together towards a shared destination.
            </p>
        </div>{{-- /#dd-intro --}}

        {{-- ══ FORM ══ --}}
        <div id="dd-form" class="mx-auto mt-8 dd-form md:mt-40" style="max-width:1160px; ">

            {{-- ──────── STEP 1 ──────── --}}
            <div class="dd-step dd-active" id="dd-s1">

                {{-- Progress bar --}}
                <div class="dd-probar">
                    <div class="dd-probar-track"></div>
                    <div class="dd-probar-fill" style="width: 0%;"></div>

                    <div class="dd-point active">
                        <div class="dd-circle">01</div>
                        <div class="dd-label">Your<br>Information</div>
                    </div>
                    <div class="dd-point">
                        <div class="dd-circle">02</div>
                        <div class="dd-label">Project<br>Information</div>
                    </div>
                    <div class="dd-point">
                        <div class="dd-circle">03</div>
                        <div class="dd-label">Let's<br>finalize</div>
                    </div>
                </div>

                {{-- Form card --}}
                <div class="dd-card-top">
                    <div class="flex flex-wrap" style="margin:0 -16px;">
                        {{-- Full Name --}}
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>Full Name</label>
                            <input type="text" id="dd-name" placeholder="">
                        </div>
                        {{-- Company --}}
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>Company/Organization</label>
                            <input type="text" id="dd-company" placeholder="">
                        </div>
                        {{-- Email --}}
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>Your Email</label>
                            <input type="email" id="dd-email" placeholder="">
                        </div>
                        {{-- Phone --}}
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>Contact Number</label>
                            <div class="dd-phone" id="dd-phone-wrap">
                                <div class="dd-flag-btn" id="dd-flag-btn">
                                    <img src="https://flagcdn.com/w40/us.png" id="dd-flag-img" alt="US">
                                    <span class="dd-dial" id="dd-dial-txt">+1</span>
                                    <span class="dd-caret">▾</span>
                                    {{-- Dropdown --}}
                                    <div class="dd-country-dd" id="dd-country-dd">
                                        @php
                                            $ddCountries = [
                                                ['us', '+1', 'United States'],
                                                ['gb', '+44', 'United Kingdom'],
                                                ['pk', '+92', 'Pakistan'],
                                                ['in', '+91', 'India'],
                                                ['au', '+61', 'Australia'],
                                                ['ca', '+1', 'Canada'],
                                                ['ae', '+971', 'UAE'],
                                                ['sa', '+966', 'Saudi Arabia'],
                                                ['de', '+49', 'Germany'],
                                                ['fr', '+33', 'France'],
                                                ['nl', '+31', 'Netherlands'],
                                                ['se', '+46', 'Sweden'],
                                                ['sg', '+65', 'Singapore'],
                                                ['jp', '+81', 'Japan'],
                                                ['cn', '+86', 'China'],
                                                ['br', '+55', 'Brazil'],
                                                ['mx', '+52', 'Mexico'],
                                                ['ng', '+234', 'Nigeria'],
                                                ['za', '+27', 'South Africa'],
                                            ];
                                        @endphp
                                        @foreach ($ddCountries as [$code, $dial, $name])
                                            <div class="dd-copt" data-code="{{ $code }}"
                                                data-dial="{{ $dial }}">
                                                <img src="https://flagcdn.com/w40/{{ $code }}.png"
                                                    alt="{{ $name }}">
                                                {{ $name }}
                                                <span class="dd-cdial">{{ $dial }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <input type="text" id="dd-phone" autocomplete="off" placeholder="">
                                <input type="hidden" id="dd-dial-val" value="+1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dd-card-bot">
                    <button class="dd-btn-next" onclick="ddNext(2)">
                        Next
                        <svg class="dd-btn-icon" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>{{-- /s1 --}}

            {{-- ──────── STEP 2 ──────── --}}
            <div class="dd-step" id="dd-s2">

                <div class="dd-probar">
                    <div class="dd-probar-track"></div>
                    <div class="dd-probar-fill" style="width: 50%;"></div>
                    <div class="dd-point active">
                        <div class="dd-circle">01</div>
                        <div class="dd-label">Your<br>Information</div>
                    </div>
                    <div class="dd-point active">
                        <div class="dd-circle">02</div>
                        <div class="dd-label">Project<br>Information</div>
                    </div>
                    <div class="dd-point">
                        <div class="dd-circle">03</div>
                        <div class="dd-label">Let's<br>finalize</div>
                    </div>
                </div>

                <div class="dd-card-top">
                    <div class="dd-fg">
                        <label style="font-size:18px;">Are there any technologies you want to specify?</label>
                        <input type="hidden" id="dd-services" value="UX/UI Design">
                        <div class="dd-svc-grid">
                            @php
                                $ddSvcs = [
                                    ['UX/UI Design', 'icon-1.svg'],
                                    ['React JS', 'Frame-1261153157-10.png'],
                                    ['React Native', 'Frame-1261153157-13.png'],
                                    ['Vue JS', 'Frame-1261153157-15.png'],
                                    ['Laravel', 'Frame-1261153157-19.png'],
                                    ['MERN Stack', 'Frame-1261153157-21.png'],
                                    ['MEAN Stack', 'Frame-1261153383.png'],
                                    ['Quality Assurance', 'Frame-1261153385.png'],
                                    ['DevOps', 'Frame-1261153386.png'],
                                    ['Others', 'startup-1.svg'],
                                ];
                            @endphp
                            @foreach ($ddSvcs as [$lbl, $ico])
                                <div class="dd-svc{{ $loop->first ? ' on' : '' }}" data-val="{{ $lbl }}"
                                    onclick="ddToggleSvc(this)">
                                    <img src="{{ asset('assets/images/' . $ico) }}" alt="{{ $lbl }}">
                                    {{ $lbl }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="dd-card-bot spaced">
                    <button class="dd-btn-back" onclick="ddBack(1)">
                        <svg class="dd-btn-icon" viewBox="0 0 24 24" fill="none" stroke="#fff"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 12H5" />
                            <path d="M12 5l-7 7 7 7" />
                        </svg>
                        Back
                    </button>
                    <button class="dd-btn-next" onclick="ddNext(3)">
                        Next
                        <svg class="dd-btn-icon" viewBox="0 0 24 24" fill="none" stroke="#fff"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>{{-- /s2 --}}

            {{-- ──────── STEP 3 ──────── --}}
            <div class="dd-step" id="dd-s3">

                <div class="dd-probar">
                    <div class="dd-probar-track"></div>
                    <div class="dd-probar-fill" style="width: 100%;"></div>
                    <div class="dd-point active">
                        <div class="dd-circle">01</div>
                        <div class="dd-label">Your<br>Information</div>
                    </div>
                    <div class="dd-point active">
                        <div class="dd-circle">02</div>
                        <div class="dd-label">Project<br>Information</div>
                    </div>
                    <div class="dd-point active">
                        <div class="dd-circle">03</div>
                        <div class="dd-label">Let's<br>finalize</div>
                    </div>
                </div>

                <div class="dd-card-top">
                    <div class="flex flex-wrap" style="margin:0 -16px;">
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>How many Engineers do you want?</label>
                            <div class="dd-pills">
                                @foreach (['1 - 2', '2 - 5', 'More than 5'] as $v)
                                    <label>
                                        <input type="radio" name="dd-eng" value="{{ $v }}"
                                            {{ $loop->first ? 'checked' : '' }}>
                                        <span>{{ $v }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>What type of Hire do you need?</label>
                            <div class="dd-pills">
                                @foreach (['Full Time', 'Part Time'] as $v)
                                    <label>
                                        <input type="radio" name="dd-hire" value="{{ $v }}"
                                            {{ $loop->first ? 'checked' : '' }}>
                                        <span>{{ $v }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-full dd-fg" style="padding:0 16px;">
                            <label>How Quickly do you want to hire?</label>
                            <div class="dd-pills">
                                @foreach (['Immediately', 'Within 2 Weeks', 'Within a month', 'Within 1-2 Months', 'No Specific Timeline'] as $v)
                                    <label>
                                        <input type="radio" name="dd-time" value="{{ $v }}"
                                            {{ $loop->first ? 'checked' : '' }}>
                                        <span>{{ $v }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-full dd-fg" style="padding:0 16px;">
                            <label>Anything else you want to tell us</label>
                            <textarea id="dd-msg" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="dd-card-bot spaced">
                    <button class="dd-btn-back" onclick="ddBack(2)">
                        <svg class="dd-btn-icon" viewBox="0 0 24 24" fill="none" stroke="#fff"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 12H5" />
                            <path d="M12 5l-7 7 7 7" />
                        </svg>
                        Back
                    </button>
                    <button class="dd-btn-sub" onclick="ddSubmit()">
                        Submit
                        <svg class="dd-btn-icon" viewBox="0 0 24 24" fill="none" stroke="#fff"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>{{-- /s3 --}}

            {{-- Success --}}
            <div class="dd-success" id="dd-success">
                <div class="dd-tick">✓</div>
                <h3 style=" color:#E7E7E7;
                           font-size:34px; margin-bottom:14px;">
                    Thank you for reaching out!
                </h3>
                <p style="color:#DBDBDB; font-size:18px;">
                    We've received your message and will be in touch within 24 hours.
                </p>
            </div>

        </div>{{-- /#dd-form --}}
    </div>
</section>

<script>
    (function() {

        /* ── show step ── */
        function ddShow(n) {
            document.querySelectorAll('.dd-step').forEach(el => el.classList.remove('dd-active'));
            const t = document.getElementById('dd-s' + n);
            if (t) {
                t.classList.add('dd-active');
                setTimeout(() => {
                    const section = document.getElementById('dd-section');
                    const top = section.getBoundingClientRect().top + window.pageYOffset;
                    window.scrollTo({
                        top: top,
                        behavior: 'smooth'
                    });
                }, 60);
            }
        }

        /* ── validate step 1 ── */
        function ddValidate1() {
            let ok = true;
            ['dd-name', 'dd-company', 'dd-email'].forEach(id => {
                const el = document.getElementById(id);
                if (!el || !el.value.trim()) {
                    el && el.classList.add('dd-err');
                    ok = false;
                } else el.classList.remove('dd-err');
            });
            const em = document.getElementById('dd-email');
            if (em && em.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em.value)) {
                em.classList.add('dd-err');
                ok = false;
            }
            return ok;
        }

        /* ── public funcs ── */
        window.ddNext = function(n) {
            if (n === 2 && !ddValidate1()) return;
            ddShow(n);
        };
        window.ddBack = function(n) {
            ddShow(n);
        };

        /* ── service multi-select ── */
        window.ddToggleSvc = function(el) {
            el.classList.toggle('on');
            const vals = [...document.querySelectorAll('.dd-svc.on')].map(s => s.dataset.val);
            document.getElementById('dd-services').value = vals.join(', ');
        };

        /* ── remove err on type ── */
        document.querySelectorAll('.dd-form input, .dd-form textarea').forEach(el => {
            el.addEventListener('input', () => el.classList.remove('dd-err'));
        });

        /* ── flag / dial dropdown ── */
        const flagBtn = document.getElementById('dd-flag-btn');
        const countryDd = document.getElementById('dd-country-dd');
        if (flagBtn) {
            flagBtn.addEventListener('click', e => {
                e.stopPropagation();
                countryDd.classList.toggle('open');
            });
        }
        document.querySelectorAll('.dd-copt').forEach(opt => {
            opt.addEventListener('click', e => {
                e.stopPropagation();
                document.getElementById('dd-flag-img').src =
                    `https://flagcdn.com/w40/${opt.dataset.code}.png`;
                document.getElementById('dd-dial-txt').textContent = opt.dataset.dial;
                document.getElementById('dd-dial-val').value = opt.dataset.dial;
                countryDd.classList.remove('open');
            });
        });
        document.addEventListener('click', () => {
            if (countryDd) countryDd.classList.remove('open');
        });

        /* ── phone focus styling ── */
        const phInput = document.getElementById('dd-phone');
        const phWrap = document.getElementById('dd-phone-wrap');
        if (phInput && phWrap) {
            phInput.addEventListener('focus', () => phWrap.classList.add('focus'));
            phInput.addEventListener('blur', () => phWrap.classList.remove('focus'));
        }

        /* ── submit (template only) ── */
        window.ddSubmit = function() {
            const msg = document.getElementById('dd-msg');
            if (msg && !msg.value.trim()) {
                msg.classList.add('dd-err');
                return;
            }
            document.querySelectorAll('.dd-step').forEach(el => el.style.display = 'none');
            // Hide intro heading/subtitle
            const introEl = document.getElementById('dd-intro');
            if (introEl) introEl.style.display = 'none';
            // Make the section fill the viewport and center its content
            const section = document.getElementById('dd-section');
            if (section) {
                section.style.padding = '0';
                section.style.minHeight = '100vh';
                section.style.display = 'flex';
                section.style.alignItems = 'center';
            }
            // Show success
            const successEl = document.getElementById('dd-success');
            successEl.style.display = 'flex';
            successEl.style.margin = '0';
            // Scroll section into view
            setTimeout(() => {
                section ? section.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    }) :
                    successEl.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
            }, 60);
        };

        /* ── init service hidden val ── */
        const firstSvc = document.querySelector('.dd-svc.on');
        if (firstSvc) document.getElementById('dd-services').value = firstSvc.dataset.val;

    })();
</script>
