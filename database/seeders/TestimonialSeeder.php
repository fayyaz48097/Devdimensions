<?php
// SAVE AS: database/seeders/TestimonialSeeder.php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\TestimonialSectionSetting;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        TestimonialSectionSetting::firstOrCreate([], [
            'heading' => "Don't Take Our Word for it",
            'status'  => 'active',
        ]);

        $testimonials = [
            [
                'project_label' => 'Project:TripSeer',
                'quote'         => 'DevDimensions designed and developed an exceptional travel booking system and agent dashboards for TripSeer. Their expertise, seamless communication, and timely delivery exceeded our expectations. Highly recommend them for their outstanding work!',
                'author_name'   => '-Markus F.',
                'author_role'   => 'Founder & CEO TripSeer',
                'portrait'      => '/assets/images/Frame-1261153391.webp',
                'logo'          => '/assets/images/Frame-1261153383.png',
            ],
            [
                'project_label' => 'Project:Thinkrite',
                'quote'         => "We hired couple of resources from DevDimensions, and they have been exceptional. Their expertise and dedication have greatly enhanced our project's efficiency and quality. The team's professionalism and seamless collaboration make DevDimensions a fantastic choice for staffing needs.",
                'author_name'   => '-Joshua S.',
                'author_role'   => 'Founder & CEO ThinkWrite',
                'portrait'      => '/assets/images/Frame-1261153390-1.webp',
                'logo'          => '/assets/images/Frame-1261153386.png',
            ],
            [
                'project_label' => 'Project:Offerform',
                'quote'         => "We recently brought on a team from DevDimensions for a real estate project. Their deep knowledge and extensive experience in the real estate sector, coupled with their proficiency in integrating various APIs for property listings and market data, have significantly boosted our project's performance and quality.",
                'author_name'   => '-Cody T.',
                'author_role'   => 'Co-Founder OfferForm',
                'portrait'      => '/assets/images/Frame-1261153390.webp',
                'logo'          => '/assets/images/Frame-1261153385.png',
            ],
            [
                'project_label' => 'Project:RSI Motorsports',
                'quote'         => "DevDimensions team's deep understanding of the automotive market and expertise in integrating the Turn14 API has truly transformed our platform. The attention to detail and commitment they showed ensured everything ran smoothly.",
                'author_name'   => '-Ryan S.',
                'author_role'   => 'Founder RSI Motorsports',
                'portrait'      => '/assets/images/Frame-1261153392.webp',
                'logo'          => '/assets/images/Frame-1261153385-1.png',
            ],
        ];

        foreach ($testimonials as $i => $t) {
            Testimonial::firstOrCreate(['author_name' => $t['author_name']], [
                'sort_order'    => $i,
                'project_label' => $t['project_label'],
                'quote'         => $t['quote'],
                'author_role'   => $t['author_role'],
                'portrait_path' => $t['portrait'],
                'logo_path'     => $t['logo'],
                'status'        => 'active',
            ]);
        }
    }
}
