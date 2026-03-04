{{-- ============================================================
     FAQ Section
     SAVE AS: resources/views/sections/homepagesections/faqsection.blade.php

     Section-level active/inactive: hides entire section when inactive.
     Heading, subheading, Q&A items — all from DB.
     All CSS/JS is IDENTICAL to the original.
============================================================ --}}

@php
    use App\Models\FaqSectionSetting;
    use App\Models\FaqItem;

    $faqSetting = FaqSectionSetting::instance();
    $faqItems = FaqItem::published()->orderBy('sort_order')->get();
@endphp

@if ($faqSetting->isActive() && $faqItems->isNotEmpty())

    <style>
        .faq-item {
            border: 1px solid #929292;
            border-radius: 4px;
            background: transparent;
            margin-bottom: 25px;
            overflow: hidden;
            transition: border-color 0.3s ease;
        }

        .faq-trigger {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 22px 20px;
            background: transparent;
            border: none;
            cursor: pointer;
            text-align: left;
            color: #E9E9E9;
            letter-spacing: -0.36px;
            line-height: 1.4;
        }

        .faq-chevron {
            flex-shrink: 0;
            width: 22px;
            height: 22px;
            transition: transform 0.3s ease;
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
        }

        .faq-body-inner {
            padding: 0 20px 22px 20px;
            border-top: 1px solid #929292;
            padding-top: 22px;
            color: #F3F3F3;
            line-height: 1.7;
        }

        .faq-body-inner p {
            margin: 0;
        }

        .faq-item.is-open .faq-chevron {
            transform: rotate(180deg);
        }
    </style>

    <section class="w-full py-16 bg-black">
        <div class="px-4 mx-auto" style="max-width:1320px;">
            <div class="flex flex-col -mx-4 md:flex-row">

                {{-- ── LEFT: Heading + subtext ── --}}
                <div class="w-full px-4 mb-10 lg:w-5/12 lg:mb-0">
                    <h2 class="mb-5 text-3xl leading-tight text-white md:text-5xl"
                        style="letter-spacing:0; font-weight:500; line-height:1.1;">
                        {{ $faqSetting->heading }}
                    </h2>
                    <p class="text-sm md:text-xl" style="line-height:1.6;">
                        {{ $faqSetting->subheading }}
                    </p>
                </div>

                {{-- ── RIGHT: Accordion ── --}}
                <div class="w-full px-4 lg:w-7/12">
                    <div style="max-width:790px; margin-left:auto;" id="faq-accordion">

                        @foreach ($faqItems as $i => $faq)
                            <div class="faq-item" id="faq-item-{{ $i }}">

                                <button class="text-[13px] md:text-xl font-bold faq-trigger"
                                    onclick="toggleFaq({{ $i }})" type="button">
                                    <span>{{ $faq->question }}</span>
                                    <svg class="faq-chevron" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 9l6 6 6-6" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>

                                <div class="faq-body text-[12px] md:text-lg" id="faq-body-{{ $i }}">
                                    <div class="faq-body-inner">
                                        <p>{!! $faq->answer !!}</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        (function() {
            function toggleFaq(index) {
                const item = document.getElementById('faq-item-' + index);
                const body = document.getElementById('faq-body-' + index);
                const isOpen = item.classList.contains('is-open');

                document.querySelectorAll('.faq-item.is-open').forEach(function(el) {
                    el.classList.remove('is-open');
                    el.querySelector('.faq-body').style.maxHeight = null;
                });

                if (!isOpen) {
                    item.classList.add('is-open');
                    body.style.maxHeight = body.scrollHeight + 'px';
                }
            }

            window.toggleFaq = toggleFaq;
        })();
    </script>

@endif {{-- /section active check --}}
