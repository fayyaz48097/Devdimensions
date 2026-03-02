<?php
// SAVE AS: database/seeders/FaqSeeder.php

namespace Database\Seeders;

use App\Models\FaqItem;
use App\Models\FaqSectionSetting;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        FaqSectionSetting::firstOrCreate([], [
            'heading'    => 'Frequently Asked Questions',
            'subheading' => 'We value long-term partnerships, and we bet you do too.',
            'status'     => 'active',
        ]);

        $faqs = [
            [
                'question' => "Why wouldn't I just hire a freelancer?",
                'answer'   => "You could but it's a pain in the ass. In our experience, it often doesn't end well unless you have experience managing freelancers, which is a headache in itself. We remove all the risk by managing the process and quality checks for you.",
            ],
            [
                'question' => 'What separates you? How do you vet your talent?',
                'answer'   => "We utilize the GWC method to ensure talent alignment. This ensures candidates \"get\" their role and your culture, genuinely \"want\" the job, and have the \"capacity\" both in skills and time to excel.<br><br>1 - Technical Test: Customized assessments for engineers/designers to gauge proficiency in required tools and languages.<br><br>2 - Language Literacy Test: Evaluates spoken and written English capabilities, ensuring clarity in conveying technical and non-technical concepts.<br><br>3 - Personality Tests (Myers-Briggs & Team Dimensions Profile): These pinpoint a candidate's strengths and preferred role in team settings.<br><br>4 - 9-Step Peer to Peer Evaluation (HHS System): Determines if a candidate embodies the traits of being Humble, Hungry, and Smart.",
            ],
            [
                'question' => 'Can I set up video calls or check-ins with my resource(s)?',
                'answer'   => 'Our talents are equipped to handle video meetings, ensuring effective communication and project alignment.',
            ],
            [
                'question' => 'What is the "7-day risk-free trial"?',
                'answer'   => "It's our confidence in our talent. Try out our recommended standout for 7 days. If they aren't the right fit, there's no charge.",
            ],
            [
                'question' => 'Can I hire both individual resources and complete teams?',
                'answer'   => "Absolutely! Whether you need one expert or an entire department, we've got you covered.",
            ],
            [
                'question' => 'How does Billing work?',
                'answer'   => 'We establish the monthly salary of an engineer by referencing their per-hour rate. This total is determined and processed by our firm.',
            ],
            [
                'question' => 'Are there any long-term contracts or commitments?',
                'answer'   => "We believe in flexibility. While we aim for long-term partnerships, we don't bind you with lengthy contracts.",
            ],
            [
                'question' => "Can I cancel if I don't like it?",
                'answer'   => "There's no contracts or long-term agreements. We give our clients the flexibility they deserve. You can pause or cancel at any time.<br><br>However, if we have a dedicated resource that has started work on your project before you decide to cancel, you won't be eligible for a refund.",
            ],
            [
                'question' => 'How do you make sure I am happy with the work?',
                'answer'   => "Our customer experience team will provide bi-weekly check-ins to make sure the resource is performing to the DevDimensions standard with both you and our resources. Our CX team acts as an accountability partner to your dedicated resource. They are available for scheduled meetings to discuss any mishaps or gaps that need to be addressed.",
            ],
        ];

        foreach ($faqs as $i => $faq) {
            FaqItem::firstOrCreate(['question' => $faq['question']], [
                'answer'     => $faq['answer'],
                'sort_order' => $i,
                'status'     => 'active',
            ]);
        }
    }
}
