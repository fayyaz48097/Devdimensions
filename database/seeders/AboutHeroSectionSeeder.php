<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutHeroSection;

class AboutHeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        AboutHeroSection::create([
            'status'                => 'active',
            'heading_plain'         => 'Discover DevDimensions:',
            'heading_gradient'      => 'Your Premier Talent Partner',
            'paragraph_text'        => "At DD, we're all about the people. From our talent, teams, to partners:\nWe believe the real magic lies in harnessing human potential. Winning, to us, means creating lasting relationships with our partners. We want to run marathons with you, not just the sprints.",
            'get_in_touch_url'      => '/contact-us',
            // Images are optional — admin can upload later
        ]);
    }
}
