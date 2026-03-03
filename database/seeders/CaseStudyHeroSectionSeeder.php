<?php

namespace Database\Seeders;

use App\Models\CaseStudyHeroSection;
use Illuminate\Database\Seeder;

class CaseStudyHeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        // Skip if a record already exists (idempotent)
        if (CaseStudyHeroSection::withTrashed()->exists()) {
            return;
        }

        CaseStudyHeroSection::create([
            'heading'           => 'We Win,',
            'heading_highlight' => 'When You Do.',
            'description'       => "You can't build a winning product without a winning team. Discover what's possible with our seasoned designers, veteran developers, & technical strategists.",
            'bg_image_path'     => null,   // falls back to assets/images/home-hero-1.png
            'status'            => 'active',
        ]);
    }
}
