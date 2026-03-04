{{--
    SAVE AS: resources/views/components/footer.blade.php

    Dynamic footer. Reads from DB. Hidden entirely when:
    • No FooterSetting record exists
    • Record is soft-deleted
    • Record is inactive
--}}

@php
    use App\Models\FooterOffice;
    use App\Models\FooterSetting;
    use App\Models\FooterSocialLink;

    $footerSetting = FooterSetting::published()->latest()->first();
@endphp

@if ($footerSetting)

    @php
        $footerSocials = FooterSocialLink::published()->get();
        $footerOffices = FooterOffice::published()->get();

        // Fallback flag map for offices seeded without uploaded flags
        $flagFallbacks = [
            'United States' => 'us-flag.png',
            'Pakistan' => 'pak-flag.png',
        ];
    @endphp

    <style>
        footer {
            padding: 56px 0 36px 0;
            background-color: #000;
            width: 100%;
            clear: both;
        }

        .widget.first {
            position: relative;
            margin-right: 50px;
        }

        .widget.first::after {
            content: "";
            background-color: #4E4E4E;
            width: 1px;
            height: 207px;
            position: absolute;
            right: 0;
            top: 15px;
        }

        .footer-tagline {
            max-width: 340px;
            width: 100%;
            color: #BBB;
            font-size: 16px;
            line-height: 1.5;
            margin-top: 52px;
            margin-bottom: 28px;
        }

        .social {
            list-style: none;
            padding-left: 0;
            margin: 0;
            display: flex;
            gap: 0;
            flex-wrap: wrap;
        }

        .social li:not(:last-child) {
            margin-right: 30px;
        }

        .social li a {
            font-size: 14px;
            line-height: 20px;
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color .3s ease;
        }

        .social li a:hover {
            color: #B51E17;
        }

        .social li a svg {
            flex-shrink: 0;
        }

        .office-loc {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 0;
        }

        .office-loc .flag {
            width: 40px;
            height: 28px;
            object-fit: cover;
            border-radius: 3px;
            flex-shrink: 0;
        }

        .office-loc h6 {
            margin: 0;
            font-size: 20px;
            color: #fff;
            letter-spacing: 0;
            line-height: normal;
        }

        .contact-menu {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .contact-menu.mt-42 {
            margin-top: 42px;
        }

        .contact-menu li {
            position: relative;
            padding-left: 28px;
            color: #fff;
        }

        .contact-menu li:not(:last-child) {
            margin-bottom: 42px;
        }

        .contact-menu li .icon {
            position: absolute;
            left: 0;
            top: 2px;
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        .contact-menu li a {
            font-size: 14px;
            line-height: 21px;
            color: #fff;
            text-decoration: none;
            display: inline-block;
            transition: color .3s ease;
        }

        .contact-menu li a:hover {
            color: #B51E17;
        }

        .copyright {
            color: #5B5B5B;
            font-size: 12px;
            text-align: center;
            margin-top: 41px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .copyright a {
            color: #5B5B5B;
            text-decoration: none;
            transition: color .3s ease;
        }

        .copyright a:hover {
            color: #B51E17;
        }

        @media(max-width:991px) {
            .widget.first::after {
                display: none;
            }

            .widget.first {
                margin-right: 0;
                margin-bottom: 40px;
            }

            .footer-tagline {
                margin-top: 24px;
            }
        }

        @media(max-width:767px) {
            footer {
                padding: 40px 0 24px;
            }
        }
    </style>

    <footer>
        <div
            class="w-full px-[1rem] mx-auto sm:max-w-[540px] md:max-w-[720px] lg:max-w-[960px] xl:max-w-[1140px] 2xl:max-w-[1320px]">

            <div class="flex flex-wrap -mx-3">

                {{-- ── Col 1: Logo + tagline + social ── --}}
                <div class="w-full px-3 lg:w-5/12">
                    <div class="widget first">

                        {{-- Logo --}}
                        <a href="{{ url('/') }}">
                            <img src="{{ $footerSetting->logoUrl() }}" alt="DevDimensions"
                                style="max-width:180px; height:auto;">
                        </a>

                        {{-- Tagline --}}
                        @if ($footerSetting->tagline)
                            <p class="footer-tagline">{{ $footerSetting->tagline }}</p>
                        @endif

                        {{-- Social links --}}
                        @if ($footerSocials->isNotEmpty())
                            <ul class="social">
                                @foreach ($footerSocials as $social)
                                    <li>
                                        <a href="{{ $social->url }}" target="_blank" rel="noopener">
                                            {{-- Inline SVG icon by key --}}
                                            @switch($social->icon_key)
                                                @case('facebook')
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                                    </svg>
                                                @break

                                                @case('linkedin')
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6z" />
                                                        <rect x="2" y="9" width="4" height="12" />
                                                        <circle cx="4" cy="4" r="2" />
                                                    </svg>
                                                @break

                                                @case('instagram')
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <rect x="2" y="2" width="20" height="20" rx="5"
                                                            ry="5" />
                                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                                                    </svg>
                                                @break

                                                @case('twitter')
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                                                    </svg>
                                                @break

                                                @case('youtube')
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.54C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.96A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z" />
                                                        <polygon fill="#000"
                                                            points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" />
                                                    </svg>
                                                @break

                                                @default
                                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                                        <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
                                                        <path
                                                            d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
                                                    </svg>
                                            @endswitch
                                            <span class="hidden sm:block">{{ $social->platform }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                    </div>
                </div>

                {{-- ── Office columns (dynamic, first = 4/12, rest = 3/12) ── --}}
                @foreach ($footerOffices as $i => $office)
                    @php
                        $colClass = $loop->first ? 'lg:w-4/12' : 'lg:w-3/12';
                        // Resolve flag image
                        if ($office->flag_path) {
                            $flagSrc = $office->flagUrl();
                        } else {
                            $fbKey = $flagFallbacks[$office->country] ?? null;
                            $flagSrc = $fbKey ? asset('assets/images/' . $fbKey) : null;
                        }
                    @endphp
                    <div class="w-full px-3 mt-8 md:w-1/2 {{ $colClass }} lg:mt-0">
                        <div class="widget">

                            <div class="office-loc">
                                @if ($flagSrc)
                                    <img src="{{ $flagSrc }}" alt="{{ $office->country }} flag" class="flag">
                                @endif
                                <h6>{{ $office->country }}</h6>
                            </div>

                            <ul class="contact-menu mt-42">

                                {{-- Address --}}
                                @if ($office->address)
                                    <li>
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#fff"
                                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z" />
                                            <circle cx="12" cy="10" r="3" />
                                        </svg>
                                        <a href="{{ $office->address_url ?? '#' }}">{{ $office->address }}</a>
                                    </li>
                                @endif

                                {{-- Phone + Email --}}
                                @if ($office->phone || $office->email)
                                    <li>
                                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#fff"
                                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="5" y="2" width="14" height="20" rx="2"
                                                ry="2" />
                                            <line x1="12" y1="18" x2="12.01" y2="18" />
                                        </svg>
                                        @if ($office->phone)
                                            <a href="{{ $office->phoneHref() }}">{{ $office->phone }}</a>
                                        @endif
                                        @if ($office->phone && $office->email)
                                            <br>
                                        @endif
                                        @if ($office->email)
                                            <a href="mailto:{{ $office->email }}">{{ $office->email }}</a>
                                        @endif
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>{{-- /.flex --}}

            {{-- ── Copyright ── --}}
            <div class="copyright">
                {{ $footerSetting->parsedCopyright() }}
            </div>

        </div>
    </footer>

@endif
