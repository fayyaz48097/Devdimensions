{{-- ============================================================
     FAQ Section
     resources/views/sections/homepagesections/faqsection.blade.php
============================================================ --}}

<style>
    /* ── Accordion item ── */
    .faq-item {
        border: 1px solid #929292;
        border-radius: 4px;
        background: transparent;
        margin-bottom: 25px;
        overflow: hidden;
        transition: border-color 0.3s ease;
    }

    /* ── Trigger button ── */
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

    /* ── Chevron icon ── */
    .faq-chevron {
        flex-shrink: 0;
        width: 22px;
        height: 22px;
        transition: transform 0.3s ease;
    }

    /* ── Body (collapsed by default) ── */
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

    /* ── Open state ── */
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
                    style="
                           
                           letter-spacing: 0;
                           font-weight: 500;
                           line-height: 1.1;">
                    Frequently Asked Questions
                </h2>
                <p class="text-sm md:text-xl"
                    style="
                           line-height: 1.6;
                          ">
                    We value long-term partnerships, and we bet you do too.
                </p>
            </div>

            {{-- ── RIGHT: Accordion ── --}}
            <div class="w-full px-4 lg:w-7/12">
                <div style="max-width:790px; margin-left:auto;" id="faq-accordion">

                    @php
                        $faqs = [
                            [
                                'q' => 'Why wouldn\'t I just hire a freelancer?',
                                'a' =>
                                    'You could but it\'s a pain in the ass. In our experience, it often doesn\'t end well unless you have experience managing freelancers, which is a headache in itself. We remove all the risk by managing the process and quality checks for you.',
                            ],
                            [
                                'q' => 'What separates you? How do you vet your talent?',
                                'a' =>
                                    'We utilize the GWC method to ensure talent alignment. This ensures candidates "get" their role and your culture, genuinely "want" the job, and have the "capacity" both in skills and time to excel.<br><br>1 - Technical Test: Customized assessments for engineers/designers to gauge proficiency in required tools and languages.<br><br>2 - Language Literacy Test: Evaluates spoken and written English capabilities, ensuring clarity in conveying technical and non-technical concepts.<br><br>3 - Personality Tests (Myers-Briggs & Team Dimensions Profile): These pinpoint a candidate\'s strengths and preferred role in team settings.<br><br>4 - 9-Step Peer to Peer Evaluation (HHS System): Determines if a candidate embodies the traits of being Humble, Hungry, and Smart.',
                            ],
                            [
                                'q' => 'Can I set up video calls or check-ins with my resource(s)?',
                                'a' =>
                                    'Our talents are equipped to handle video meetings, ensuring effective communication and project alignment.',
                            ],
                            [
                                'q' => 'What is the "7-day risk-free trial"?',
                                'a' =>
                                    'It\'s our confidence in our talent. Try out our recommended standout for 7 days. If they aren\'t the right fit, there\'s no charge.',
                            ],
                            [
                                'q' => 'Can I hire both individual resources and complete teams?',
                                'a' =>
                                    'Absolutely! Whether you need one expert or an entire department, we\'ve got you covered.',
                            ],
                            [
                                'q' => 'How does Billing work?',
                                'a' =>
                                    'We establish the monthly salary of an engineer by referencing their per-hour rate. This total is determined and processed by our firm.',
                            ],
                            [
                                'q' => 'Are there any long-term contracts or commitments?',
                                'a' =>
                                    'We believe in flexibility. While we aim for long-term partnerships, we don\'t bind you with lengthy contracts.',
                            ],
                            [
                                'q' => 'Can I cancel if I don\'t like it?',
                                'a' =>
                                    'There\'s no contracts or long-term agreements. We give our clients the flexibility they deserve. You can pause or cancel at any time.<br><br>However, if we have a dedicated resource that has started work on your project before you decide to cancel, you won\'t be eligible for a refund.',
                            ],
                            [
                                'q' => 'How do you make sure I am happy with the work?',
                                'a' =>
                                    'Our customer experience team will provide bi-weekly check-ins to make sure the resource is performing to the DevDimensions standard with both you and our resources. Our CX team acts as an accountability partner to your dedicated resource. They are available for scheduled meetings to discuss any mishaps or gaps that need to be addressed.',
                            ],
                        ];
                    @endphp

                    @foreach ($faqs as $i => $faq)
                        <div class="faq-item" id="faq-item-{{ $i }}">

                            <button class="text-[13px] md:text-xl md:font-bold faq-trigger"
                                onclick="toggleFaq({{ $i }})" type="button">
                                <span>{{ $faq['q'] }}</span>
                                {{-- Chevron SVG --}}
                                <svg class="faq-chevron" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9l6 6 6-6" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>

                            <div class="faq-body text-[12px] md:text-lg " id="faq-body-{{ $i }}">
                                <div class="faq-body-inner">
                                    <p>{!! $faq['a'] !!}</p>
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

            // Close all open items
            document.querySelectorAll('.faq-item.is-open').forEach(function(el) {
                el.classList.remove('is-open');
                el.querySelector('.faq-body').style.maxHeight = null;
            });

            // If it was closed, open it
            if (!isOpen) {
                item.classList.add('is-open');
                body.style.maxHeight = body.scrollHeight + 'px';
            }
        }

        // expose globally for onclick
        window.toggleFaq = toggleFaq;
    })();
</script>
