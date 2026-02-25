<style>
    /* ══════════════════════════════════════
           FOOTER
        ══════════════════════════════════════ */

    footer {
        padding: 56px 0 36px 0;
        background-color: #000;
        width: 100%;
        clear: both;
    }

    /* ── Left widget — vertical divider ── */
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

    /* ── Tagline ── */
    .footer-tagline {
        max-width: 340px;
        width: 100%;
        color: #BBB;
        font-family: 'Gilroy-Regular', sans-serif;
        font-size: 16px;
        line-height: 1.5;
        margin-top: 52px;
        margin-bottom: 28px;
    }

    /* ── Social links ── */
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
        font-family: 'Gilroy-Medium', sans-serif;
        font-size: 14px;
        line-height: 20px;
        color: #fff;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: color 0.3s ease;
    }

    .social li a:hover {
        color: #B51E17;
    }

    .social li a svg {
        flex-shrink: 0;
    }

    /* ── Office location header ── */
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
        font-family: 'Gilroy-SemiBold', sans-serif;
        font-size: 20px;
        color: #fff;
        letter-spacing: 0;
        line-height: normal;
    }

    /* ── Contact menu ── */
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
        font-family: 'Gilroy-Regular', sans-serif;
        font-size: 14px;
        line-height: 21px;
        color: #fff;
        text-decoration: none;
        display: inline-block;
        transition: color 0.3s ease;
    }

    .contact-menu li a:hover {
        color: #B51E17;
    }

    /* ── Copyright bar ── */
    .copyright {
        color: #5B5B5B;
        font-size: 12px;
        font-family: 'Gilroy-Regular', sans-serif;
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
        transition: color 0.3s ease;
    }

    .copyright a:hover {
        color: #B51E17;
    }

    /* ── Responsive ── */
    @media (max-width: 991px) {
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

    @media (max-width: 767px) {
        footer {
            padding: 40px 0 24px;
        }
    }
</style>

{{-- ══════════════════════════════════════════════════════
 FOOTER
══════════════════════════════════════════════════════ --}}
<footer>
    <div
        class="w-full px-3 mx-auto
            sm:max-w-[540px]
            md:max-w-[720px]
            lg:max-w-[960px]
            xl:max-w-[1140px]
            2xl:max-w-[1320px]">

        <div class="flex flex-wrap -mx-3">

            {{-- ── Col 1: Logo + tagline + social ── --}}
            <div class="w-full px-3 lg:w-5/12">
                <div class="widget first">

                    {{-- Logo --}}
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/images/logo.svg') }}" alt="DevDimensions"
                            style="max-width: 180px; height: auto;">
                    </a>

                    {{-- Tagline --}}
                    <p class="footer-tagline">
                        We believe in growing together by empowering businesses through technology.
                    </p>

                    {{-- Social --}}
                    <ul class="social">
                        <li>
                            <a href="https://www.facebook.com/devdimensions/" target="_blank" rel="noopener">
                                {{-- Facebook icon --}}
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                </svg>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/company/devdimensions" target="_blank" rel="noopener">
                                {{-- LinkedIn icon --}}
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                    <rect x="2" y="9" width="4" height="12" />
                                    <circle cx="4" cy="4" r="2" />
                                </svg>
                                <span>LinkedIn</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/devdimensions.official" target="_blank" rel="noopener">
                                {{-- Instagram icon --}}
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                                </svg>
                                <span>Instagram</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            {{-- ── Col 2: United States ── --}}
            <div class="w-full px-3 mt-8 md:w-1/2 lg:w-4/12 lg:mt-0">
                <div class="widget">

                    <div class="office-loc">
                        <img src="{{ asset('assets/images/us-flag.png') }}" alt="Pakistan flag" class="flag">
                        <h6>United States</h6>
                    </div>

                    <ul class="contact-menu mt-42">

                        {{-- Address --}}
                        <li>
                            {{-- Location icon --}}
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <a href="#">10788 Lake Wynds, Boynton Beach, FL</a>
                        </li>

                        {{-- Phone + Email --}}
                        <li>
                            {{-- Phone icon --}}
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2" />
                                <line x1="12" y1="18" x2="12.01" y2="18" />
                            </svg>
                            <a href="tel:+15613360919">+1 (561) 336-0919</a><br>
                            <a href="mailto:sales@devdimensions.com">sales@devdimensions.com</a>
                        </li>

                    </ul>
                </div>
            </div>

            {{-- ── Col 3: Pakistan ── --}}
            <div class="w-full px-3 mt-8 md:w-1/2 lg:w-3/12 lg:mt-0">
                <div class="widget">

                    <div class="office-loc">
                        <img src="{{ asset('assets/images/pak-flag.png') }}" alt="Pakistan flag" class="flag">
                        <h6>Pakistan</h6>
                    </div>

                    <ul class="contact-menu mt-42">

                        {{-- Address --}}
                        <li>
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            <a href="#">26 K Service Rd, Block K, Phase 2, Johar Town Lahore, Pakistan.</a>
                        </li>

                        {{-- Phone + Email --}}
                        <li>
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.8"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect x="5" y="2" width="14" height="20" rx="2" ry="2" />
                                <line x1="12" y1="18" x2="12.01" y2="18" />
                            </svg>
                            <a href="tel:+924232296908">+92 42 322 96908</a><br>
                            <a href="mailto:info@devdimensions.com">info@devdimensions.com</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>{{-- /.flex --}}

        {{-- ── Copyright ── --}}
        <div class="copyright">
            <span>All copyrights by DevDimensions, LLC © {{ date('Y') }} –</span>
            <a href="https://www.careers-page.com/devdimensions#openings" target="_blank" rel="noopener">Careers</a>
        </div>

    </div>{{-- /.container --}}
</footer>
