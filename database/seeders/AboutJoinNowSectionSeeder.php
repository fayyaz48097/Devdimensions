<?php

namespace Database\Seeders;

use App\Models\AboutJoinNowSection;
use Illuminate\Database\Seeder;

class AboutJoinNowSectionSeeder extends Seeder
{
    /**
     * Seeds the exact hardcoded content from joinnowsection.blade.php.
     *
     * logo_path starts with '/' — the model's logoUrl() returns it as-is
     * (static public asset, not a storage-disk file).
     * logo_d.svg already exists at public/assets/images/logo_d.svg per the folder structure.
     */
    public function run(): void
    {
        AboutJoinNowSection::create([
            'logo_path'          => '/assets/images/logo_d.svg',
            'logo_original_name' => 'logo_d.svg',
            'logo_alt'           => 'DevDimensions logo',
            'heading'            => 'Your turn to step up to the plate!',
            'description'        => "You've gotten to know the line-up behind DevDimensions, now it's our turn to learn about your game plan. Join our team and let's huddle to talk strategy.",
            'cta_text'           => "Let's Dive In",
            'cta_url'            => '/contact-us',
            'status'             => 'active',
        ]);
    }
}
