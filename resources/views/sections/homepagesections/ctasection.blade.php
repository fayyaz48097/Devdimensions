{{-- ============================================================
     CTA Section
     SAVE AS: resources/views/sections/homepagesections/ctasection.blade.php

     Section-level active/inactive: hides entire section when inactive.
     Heading, both button labels + URLs — all from DB.
     All CSS is IDENTICAL to the original.
============================================================ --}}

@php
    use App\Models\CtaSectionSetting;

    $ctaSetting = CtaSectionSetting::instance();
@endphp

@if ($ctaSetting->isActive())
    @push('styles')
        <style>
            section.cta {
                padding: 50px 0;
                clear: both;
                width: 100%;
            }

            .cta-box {
                padding: 74px 40px;
                border-radius: 20px;
                position: relative;
                overflow: hidden;
                text-align: center;
                background: linear-gradient(135deg,
                        #6b0b07 0%,
                        #8c1009 20%,
                        #B51E17 50%,
                        #8c1009 80%,
                        #6b0b07 100%);
            }

            .cta-box::before {
                content: "";
                position: absolute;
                width: 200px;
                height: 200px;
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.06);
                top: -30px;
                left: 60px;
                transform: rotate(-8deg);
                pointer-events: none;
            }

            .cta-box::after {
                content: "";
                position: absolute;
                width: 260px;
                height: 260px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.06);
                top: 20px;
                right: 40px;
                pointer-events: none;
            }

            .cta-box .cta-shape-br {
                position: absolute;
                width: 180px;
                height: 130px;
                border-radius: 14px;
                background: rgba(255, 255, 255, 0.05);
                bottom: -20px;
                right: 140px;
                transform: rotate(5deg);
                pointer-events: none;
            }

            .cta-box h4 {
                font-size: 32px;
                line-height: 1.3;
                color: #fff;
                margin-bottom: 0;
                position: relative;
                z-index: 2;
            }

            .cta-box .btns-holder {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 16px;
                margin-top: 35px;
                flex-wrap: wrap;
                position: relative;
                z-index: 2;
            }

            .btn-2 {
                padding: 0 24px;
                min-width: 249px;
                height: 66px;
                line-height: 63px;
                border-radius: 20px;
                background-color: #fff;
                color: #B51E17;
                text-align: left;
                display: inline-flex;
                align-items: center;
                justify-content: space-between;
                width: fit-content;
                border: 1.5px solid #fff;
                font-size: 16px;
                text-decoration: none;
                transition: all 0.3s ease-in-out;
            }

            .btn-2 .arrow-icon {
                width: 35px;
                height: 35px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
                flex-shrink: 0;
            }

            .btn-2:hover {
                background-color: transparent;
                color: #fff;
            }

            .btn-2:hover .arrow-icon svg {
                stroke: #fff;
            }

            .btn-2:hover .arrow-icon {
                transform: rotate(45deg);
            }

            .btn-2.outline {
                background-color: transparent;
                color: #fff;
            }

            .btn-2.outline .arrow-icon svg {
                stroke: #fff;
            }

            .btn-2.outline:hover {
                background-color: #fff;
                color: #B51E17;
            }

            .btn-2.outline:hover .arrow-icon svg {
                stroke: #B51E17;
            }

            .btn-2.outline:hover .arrow-icon {
                transform: rotate(45deg);
            }

            @media (max-width: 699px) {
                .cta-box {
                    padding: 50px 20px;
                    background: linear-gradient(160deg, #6b0b07 0%, #B51E17 60%, #8c1009 100%);
                }

                .cta-box h4 {
                    font-size: 24px;
                }

                .btn-2 {
                    min-width: 200px;
                    width: 100%;
                    justify-content: space-between;
                }

                .cta-box .btns-holder {
                    flex-direction: column;
                    align-items: stretch;
                    padding: 0 10px;
                }
            }
        </style>
    @endpush

    <section class="w-full cta">
        <div
            class="w-full px-3 mx-auto
                sm:max-w-[540px]
                md:max-w-[720px]
                lg:max-w-[960px]
                xl:max-w-[1140px]
                2xl:max-w-[1320px]">

            <div class="cta-box">

                <span class="cta-shape-br" aria-hidden="true"></span>

                <h4 class="font-medium">{{ $ctaSetting->heading }}</h4>

                <div class="btns-holder">

                    {{-- Solid white button --}}
                    <a href="{{ url($ctaSetting->btn_primary_url) }}" class="btn-2">
                        {{ $ctaSetting->btn_primary_label }}
                        <span class="arrow-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#B51E17"
                                stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7" />
                                <polyline points="7 7 17 7 17 17" />
                            </svg>
                        </span>
                    </a>

                    {{-- Outline white button --}}
                    <a href="{{ url($ctaSetting->btn_secondary_url) }}" class="btn-2 outline">
                        {{ $ctaSetting->btn_secondary_label }}
                        <span class="arrow-icon">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff"
                                stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7" />
                                <polyline points="7 7 17 7 17 17" />
                            </svg>
                        </span>
                    </a>

                </div>
            </div>

        </div>
    </section>
@endif
