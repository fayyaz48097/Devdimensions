{{-- ============================================================
     Contact Us Section — 3-Step Form with AJAX Submission
     SAVE AS: resources/views/sections/contactuspagesection/contactussection.blade.php
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

    .dd-probar-track {
        position: absolute;
        top: 21px;
        left: 0;
        right: 0;
        height: 2px;
        background: #333;
        z-index: 0;
    }

    .dd-probar-fill {
        position: absolute;
        top: 21px;
        left: 0;
        height: 2px;
        background: linear-gradient(90deg, #B51E17 0%, #FC3F37 100%);
        z-index: 1;
        transition: width 0.4s ease;
    }

    .dd-probar .dd-point {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
    }

    .dd-probar .dd-point:nth-child(3) {
        align-items: flex-start;
        flex: 0 0 auto;
    }

    .dd-probar .dd-point:nth-child(4) {
        flex: 1;
        align-items: center;
    }

    .dd-probar .dd-point:nth-child(5) {
        flex: 0 0 auto;
        align-items: flex-end;
    }

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

    /* ─── Form card bottom ─── */
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

    .dd-btn-next:disabled,
    .dd-btn-sub:disabled {
        opacity: 0.65;
        cursor: not-allowed;
        pointer-events: none;
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

    /* Spinner inside submit btn */
    .dd-spinner {
        width: 20px;
        height: 20px;
        flex-shrink: 0;
        animation: ddSpin 0.75s linear infinite;
    }

    @keyframes ddSpin {
        to {
            transform: rotate(360deg);
        }
    }

    /* ─── Error inline ─── */
    .dd-field-err {
        display: none;
        color: #FC3F37;
        font-size: 12px;
        font-family: 'Gilroy-Regular', sans-serif;
        margin-top: 6px;
    }

    .dd-field-err.visible {
        display: block;
    }

    /* ─── Server error banner ─── */
    .dd-server-err {
        display: none;
        align-items: center;
        gap: 10px;
        padding: 14px 20px;
        margin-bottom: 24px;
        background: rgba(252, 63, 55, 0.07);
        border: 1px solid rgba(252, 63, 55, 0.22);
        border-radius: 10px;
        color: #FC3F37;
        font-size: 14px;
        font-family: 'Gilroy-Regular', sans-serif;
    }

    .dd-server-err.visible {
        display: flex;
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

    {{-- Background --}}
    <img src="{{ asset('assets/images/home-hero-1.png') }}" alt=""
        class="absolute inset-0 object-cover object-center w-full" style="z-index: -1;">

    <div
        class="mx-auto px-6 lg:px-8 max-w-full
                sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px]
                xl:max-w-[1140px] 2xl:max-w-[1360px]">

        {{-- Heading --}}
        <div id="dd-intro">
            <h1 class="text-center md:text-[58px] text-4xl"
                style="color:#E7E7E7; font-weight:600; letter-spacing:-1.16px; line-height:1.1; margin-bottom:20px;">
                Let's <span class="text-[#D62D26]">Collaborate</span>. We're All Ears!
            </h1>
            <p class="text-center grey-DB f-16" style="max-width:820px; margin:0 auto; line-height:1.65;">
                Unlock the gateway to collaboration by sharing your personal details, project aspirations,
                and desired timelines. Let our connection become the bridge that brings your vision to life,
                as we navigate together towards a shared destination.
            </p>
        </div>

        {{-- ══ FORM ══ --}}
        <div id="dd-form" class="mx-auto mt-8 dd-form md:mt-40" style="max-width:1160px;">

            {{-- ─── Server error banner (shared across steps) ─── --}}
            <div class="dd-server-err" id="dd-server-err">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.8" stroke-linecap="round" style="flex-shrink:0;">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" y1="8" x2="12" y2="12" />
                    <line x1="12" y1="16" x2="12.01" y2="16" />
                </svg>
                <span id="dd-server-err-txt"></span>
            </div>

            {{-- ──────── STEP 1 — Your Information ──────── --}}
            <div class="dd-step dd-active" id="dd-s1">

                <div class="dd-probar">
                    <div class="dd-probar-track"></div>
                    <div class="dd-probar-fill" style="width:0%;"></div>
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

                <div class="dd-card-top">
                    <div class="flex flex-wrap" style="margin:0 -16px;">

                        {{-- Full Name --}}
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>Full Name</label>
                            <input type="text" id="dd-name" placeholder="John Doe" autocomplete="name">
                            <span class="dd-field-err" id="err-name">Please enter your full name.</span>
                        </div>

                        {{-- Company --}}
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>Company / Organization</label>
                            <input type="text" id="dd-company" placeholder="Acme Inc." autocomplete="organization">
                            <span class="dd-field-err" id="err-company">Please enter your company name.</span>
                        </div>

                        {{-- Email --}}
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>Your Email</label>
                            <input type="email" id="dd-email" placeholder="you@company.com" autocomplete="email">
                            <span class="dd-field-err" id="err-email">Please enter a valid email address.</span>
                        </div>

                        {{-- Phone --}}
                        <div class="w-full md:w-1/2 dd-fg" style="padding:0 16px;">
                            <label>Contact Number</label>
                            <div class="dd-phone" id="dd-phone-wrap">
                                <div class="dd-flag-btn" id="dd-flag-btn">
                                    <img src="https://flagcdn.com/w40/us.png" id="dd-flag-img" alt="US">
                                    <span class="dd-dial" id="dd-dial-txt">+1</span>
                                    <span class="dd-caret">▾</span>
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
                        <svg class="dd-btn-icon" viewBox="0 0 24 24" fill="none" stroke="#fff"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

            </div>{{-- /s1 --}}

            {{-- ──────── STEP 2 — Project Information ──────── --}}
            <div class="dd-step" id="dd-s2">

                <div class="dd-probar">
                    <div class="dd-probar-track"></div>
                    <div class="dd-probar-fill" style="width:50%;"></div>
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
                        <input type="hidden" id="dd-services" value="">
                        <div class="dd-svc-grid">
                            @php
                                $ddSvcs = [
                                    ['UX/UI Design', 'UI-UX.svg'],
                                    ['React JS', 'react.svg'],
                                    ['React Native', 'react-native.svg'],
                                    ['Vue JS', 'vue-jus.svg'],
                                    ['Laravel', 'laraval.svg'],
                                    ['MERN Stack', 'mern-stack.svg'],
                                    ['MEAN Stack', 'mern-stockk.svg'],
                                    ['Quality Assurance', 'QA.svg'],
                                    ['DevOps', 'Dev-ops-1.svg'],
                                    ['Others', 'others.svg'],
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

            {{-- ──────── STEP 3 — Let's Finalize ──────── --}}
            <div class="dd-step" id="dd-s3">

                <div class="dd-probar">
                    <div class="dd-probar-track"></div>
                    <div class="dd-probar-fill" style="width:100%;"></div>
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

                        {{-- Engineers --}}
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

                        {{-- Type of hire --}}
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

                        {{-- Timeline --}}
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

                        {{-- Message --}}
                        <div class="w-full dd-fg" style="padding:0 16px;">
                            <label>Anything else you want to tell us</label>
                            <textarea id="dd-msg" rows="5" placeholder="Tell us more about your project…"></textarea>
                            <span class="dd-field-err" id="err-msg">Please add a brief message.</span>
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
                    <button class="dd-btn-sub" id="dd-submit-btn" onclick="ddSubmit()">
                        <span id="dd-btn-label">Submit</span>
                        <svg id="dd-btn-icon" class="dd-btn-icon" viewBox="0 0 24 24" fill="none" stroke="#fff"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="M12 5l7 7-7 7" />
                        </svg>
                        <svg id="dd-btn-spinner" class="dd-spinner" style="display:none;" viewBox="0 0 24 24"
                            fill="none" stroke="white" stroke-width="2.5">
                            <circle cx="12" cy="12" r="10" stroke-opacity="0.25" />
                            <path d="M12 2 a10 10 0 0 1 10 10" stroke-opacity="1" />
                        </svg>
                    </button>
                </div>

            </div>{{-- /s3 --}}

            {{-- ─── Success screen ─── --}}
            <div class="dd-success" id="dd-success">
                <div class="dd-tick">✓</div>
                <h3 style="color:#E7E7E7; font-size:34px; margin-bottom:14px;">
                    Thank you for reaching out!
                </h3>
                <p id="dd-success-msg" style="color:#DBDBDB; font-size:18px;">
                    We've received your message and will be in touch within 24 hours.
                </p>
            </div>

        </div>{{-- /#dd-form --}}
    </div>
</section>

<script>
    (function() {

        /* ── helpers ── */
        function isEmail(v) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
        }

        function showErr(id, msg) {
            var el = document.getElementById(id);
            if (!el) return;
            if (msg) el.textContent = msg;
            el.classList.add('visible');
        }

        function hideErr(id) {
            var el = document.getElementById(id);
            if (el) el.classList.remove('visible');
        }

        function clearInput(id) {
            var el = document.getElementById(id);
            if (el) el.classList.remove('dd-err');
        }

        function setInputErr(id) {
            var el = document.getElementById(id);
            if (el) el.classList.add('dd-err');
        }

        function showServerErr(msg) {
            var wrap = document.getElementById('dd-server-err');
            var txt = document.getElementById('dd-server-err-txt');
            if (txt) txt.textContent = msg;
            if (wrap) wrap.classList.add('visible');
        }

        function hideServerErr() {
            var wrap = document.getElementById('dd-server-err');
            if (wrap) wrap.classList.remove('visible');
        }

        /* ── step display ── */
        function ddShow(n) {
            document.querySelectorAll('.dd-step').forEach(function(el) {
                el.classList.remove('dd-active');
            });
            var t = document.getElementById('dd-s' + n);
            if (t) {
                t.classList.add('dd-active');
                hideServerErr();
                setTimeout(function() {
                    var section = document.getElementById('dd-section');
                    var top = section.getBoundingClientRect().top + window.pageYOffset;
                    window.scrollTo({
                        top: top,
                        behavior: 'smooth'
                    });
                }, 60);
            }
        }

        /* ── validate step 1 ── */
        function ddValidate1() {
            var ok = true;
            var name = document.getElementById('dd-name');
            var comp = document.getElementById('dd-company');
            var email = document.getElementById('dd-email');

            if (!name || !name.value.trim() || name.value.trim().length < 2) {
                setInputErr('dd-name');
                showErr('err-name');
                ok = false;
            } else {
                clearInput('dd-name');
                hideErr('err-name');
            }

            if (!comp || !comp.value.trim()) {
                setInputErr('dd-company');
                showErr('err-company');
                ok = false;
            } else {
                clearInput('dd-company');
                hideErr('err-company');
            }

            if (!email || !isEmail(email.value.trim())) {
                setInputErr('dd-email');
                showErr('err-email');
                ok = false;
            } else {
                clearInput('dd-email');
                hideErr('err-email');
            }

            return ok;
        }

        /* ── public nav funcs ── */
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
            var vals = Array.from(document.querySelectorAll('.dd-svc.on')).map(function(s) {
                return s.dataset.val;
            });
            document.getElementById('dd-services').value = vals.join(', ');
        };

        /* ── clear input errors on type ── */
        document.querySelectorAll('.dd-form input, .dd-form textarea').forEach(function(el) {
            el.addEventListener('input', function() {
                el.classList.remove('dd-err');
                hideServerErr();
            });
        });

        /* ── per-country phone digit length ── */
        var PHONE_LENGTHS = {
            'us': 10,
            'ca': 10,
            'gb': 10,
            'pk': 10,
            'in': 10,
            'au': 9,
            'ae': 9,
            'sa': 9,
            'de': 11,
            'fr': 9,
            'nl': 9,
            'se': 9,
            'sg': 8,
            'jp': 10,
            'cn': 11,
            'br': 11,
            'mx': 10,
            'ng': 10,
            'za': 9
        };

        var currentCountryCode = 'us'; /* default matches the flag shown */

        function getMaxLen() {
            return PHONE_LENGTHS[currentCountryCode] || 15;
        }

        function updatePhonePlaceholder() {
            if (!phInput) return;
            var len = getMaxLen();
            phInput.maxLength = len;

            /* trim existing value if it exceeds new max */
            if (phInput.value.length > len) {
                phInput.value = phInput.value.slice(0, len);
            }
        }

        /* ── flag / dial dropdown ── */
        var flagBtn = document.getElementById('dd-flag-btn');
        var countryDd = document.getElementById('dd-country-dd');
        var phInput = document.getElementById('dd-phone');

        if (flagBtn) {
            flagBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                countryDd.classList.toggle('open');
            });
        }

        document.querySelectorAll('.dd-copt').forEach(function(opt) {
            opt.addEventListener('click', function(e) {
                e.stopPropagation();
                document.getElementById('dd-flag-img').src =
                    'https://flagcdn.com/w40/' + opt.dataset.code + '.png';
                document.getElementById('dd-dial-txt').textContent = opt.dataset.dial;
                document.getElementById('dd-dial-val').value = opt.dataset.dial;
                currentCountryCode = opt.dataset.code;
                updatePhonePlaceholder();
                countryDd.classList.remove('open');
            });
        });

        document.addEventListener('click', function() {
            if (countryDd) countryDd.classList.remove('open');
        });

        /* ── phone focus styling + numbers-only + max-length ── */
        var phWrap = document.getElementById('dd-phone-wrap');
        if (phInput && phWrap) {
            phInput.setAttribute('inputmode', 'numeric');
            phInput.setAttribute('pattern', '[0-9]*');

            /* set initial maxLength for default country (us = 10) */
            updatePhonePlaceholder();

            phInput.addEventListener('focus', function() {
                phWrap.classList.add('focus');
            });
            phInput.addEventListener('blur', function() {
                phWrap.classList.remove('focus');
            });

            /* block non-digit keys */
            phInput.addEventListener('keydown', function(e) {
                var allowed = [8, 9, 13, 27, 46, 37, 38, 39, 40, 35, 36];
                if (allowed.indexOf(e.keyCode) !== -1) return;
                if ((e.ctrlKey || e.metaKey) && [65, 67, 86, 88].indexOf(e.keyCode) !== -1) return;
                if (e.key < '0' || e.key > '9') {
                    e.preventDefault();
                    return;
                }
                /* block if already at max length */
                if (this.value.length >= getMaxLen()) {
                    e.preventDefault();
                }
            });

            /* strip non-digits + enforce max length on any input (autofill etc.) */
            phInput.addEventListener('input', function() {
                var cleaned = this.value.replace(/[^0-9]/g, '').slice(0, getMaxLen());
                if (this.value !== cleaned) this.value = cleaned;
            });

            /* digits-only paste, capped at max length */
            phInput.addEventListener('paste', function(e) {
                e.preventDefault();
                var pasted = (e.clipboardData || window.clipboardData).getData('text');
                var digitsOnly = pasted.replace(/[^0-9]/g, '').slice(0, getMaxLen());
                document.execCommand('insertText', false, digitsOnly);
            });
        }

        /* ── SUBMIT — AJAX ── */
        window.ddSubmit = function() {
            /* validate message */
            var msg = document.getElementById('dd-msg');
            if (!msg || !msg.value.trim()) {
                setInputErr('dd-msg');
                showErr('err-msg');
                return;
            }
            hideErr('err-msg');
            clearInput('dd-msg');

            /* collect all values */
            var full_name = (document.getElementById('dd-name') || {}).value || '';
            var company = (document.getElementById('dd-company') || {}).value || '';
            var email = (document.getElementById('dd-email') || {}).value || '';
            var dial = (document.getElementById('dd-dial-val') || {}).value || '';
            var phone = (document.getElementById('dd-phone') || {}).value || '';
            var servicesRaw = (document.getElementById('dd-services') || {}).value || '';
            var description = msg.value.trim();

            var engEl = document.querySelector('input[name="dd-eng"]:checked');
            var hireEl = document.querySelector('input[name="dd-hire"]:checked');
            var timeEl = document.querySelector('input[name="dd-time"]:checked');

            var no_of_engineers = engEl ? engEl.value : '';
            var type_of_hire = hireEl ? hireEl.value : '';
            var quickly_hire = timeEl ? timeEl.value : '';

            /* technologies array */
            var technologies = servicesRaw ?
                servicesRaw.split(',').map(function(s) {
                    return s.trim();
                }).filter(Boolean) : [];

            /* loading state */
            var submitBtn = document.getElementById('dd-submit-btn');
            var btnLabel = document.getElementById('dd-btn-label');
            var btnIcon = document.getElementById('dd-btn-icon');
            var btnSpinner = document.getElementById('dd-btn-spinner');

            submitBtn.disabled = true;
            btnLabel.textContent = 'Sending…';
            if (btnIcon) btnIcon.style.display = 'none';
            if (btnSpinner) btnSpinner.style.display = '';
            hideServerErr();

            var csrfMeta = document.querySelector('meta[name="csrf-token"]');

            fetch('{{ route('contact.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfMeta ? csrfMeta.content : '',
                    },
                    body: JSON.stringify({
                        full_name: full_name.trim(),
                        email: email.trim(),
                        company: company.trim(),
                        technologies: technologies,
                        no_of_engineers: no_of_engineers || null,
                        type_of_hire: type_of_hire,
                        quickly_hire: quickly_hire,
                        description: description,
                    }),
                })
                .then(function(res) {
                    return res.json();
                })
                .then(function(data) {
                    /* reset button state */
                    submitBtn.disabled = false;
                    btnLabel.textContent = 'Submit';
                    if (btnIcon) btnIcon.style.display = '';
                    if (btnSpinner) btnSpinner.style.display = 'none';

                    if (data.success) {
                        ddShowSuccess(data.message);
                    } else {
                        showServerErr(data.message || 'Something went wrong. Please try again.');
                    }
                })
                .catch(function() {
                    submitBtn.disabled = false;
                    btnLabel.textContent = 'Submit';
                    if (btnIcon) btnIcon.style.display = '';
                    if (btnSpinner) btnSpinner.style.display = 'none';
                    showServerErr('Network error. Please check your connection and try again.');
                });
        };

        function ddShowSuccess(message) {
            /* hide all steps */
            document.querySelectorAll('.dd-step').forEach(function(el) {
                el.style.display = 'none';
            });
            document.getElementById('dd-server-err').classList.remove('visible');

            /* hide intro heading */
            var introEl = document.getElementById('dd-intro');
            if (introEl) introEl.style.display = 'none';

            /* stretch section */
            var section = document.getElementById('dd-section');
            if (section) {
                section.style.padding = '0';
                section.style.minHeight = '100vh';
                section.style.display = 'flex';
                section.style.alignItems = 'center';
            }

            /* show success */
            var successEl = document.getElementById('dd-success');
            var successMsg = document.getElementById('dd-success-msg');
            if (successMsg && message) successMsg.textContent = message;
            successEl.style.display = 'flex';
            successEl.style.margin = '0';

            /* scroll into view */
            setTimeout(function() {
                (section || successEl).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 60);
        }

        /* ── init services hidden value from pre-selected card ── */
        var firstSvc = document.querySelector('.dd-svc.on');
        if (firstSvc) document.getElementById('dd-services').value = firstSvc.dataset.val;

    })();
</script>
