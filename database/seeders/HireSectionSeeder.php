<?php
// SAVE AS: database/seeders/HireSectionSeeder.php

namespace Database\Seeders;

use App\Models\HireBox;
use App\Models\HireSectionSetting;
use Illuminate\Database\Seeder;

class HireSectionSeeder extends Seeder
{
    public function run(): void
    {
        HireSectionSetting::create([
            'status'          => 'active',
            'heading'         => "We're the Utility Player",
            'subheading'      => "Whether you need niche expertise or an entire project force, we'll work directly with you to bring your project to life helping cover any skill gaps along the way.",
            'checklist_items' => json_encode([
                'Hire Individual Resource',
                'Hire Multiple Resources',
                'Hire Entire Team or Department',
            ]),
            'cta_label' => 'Get Free Consultation',
            'cta_url'   => '/contact-us',
        ]);

        $boxes = [
            [
                'sort_order'          => 0,
                'image_path'          => '/assets/images/HE.svg',
                'image_original_name' => 'HE.svg',
                'title'               => 'Hire Team Member',
                'description'         => "Have a team but need to add a key player or two? Draft your MVP's here. Our curated pool of talent seamlessly integrates with your existing team, ensuring rapid and efficient results.",
                'box_url'             => null,
                'status'              => 'active',
            ],
            [
                'sort_order'          => 1,
                'image_path'          => '/assets/images/Group-626683-2.svg',
                'image_original_name' => 'Group-626683-2.svg',
                'title'               => 'Hire Entire Team',
                'description'         => "Have an idea but no team to build it? Stack your team or department with our designers, developers, and project managers to ensure your core focus remains on business growth.",
                'box_url'             => null,
                'status'              => 'active',
            ],
        ];

        foreach ($boxes as $b) {
            HireBox::create($b);
        }
    }
}
