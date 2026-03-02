<?php

namespace Database\Seeders;

use App\Models\WelcomeSection;
use App\Models\WelcomeSectionSliderLine;
use App\Models\WelcomeSectionSliderItem;
use Illuminate\Database\Seeder;

class WelcomeSectionSeeder extends Seeder
{
    /**
     * Seeds the exact hardcoded content from welcomesection.blade.php.
     *
     * hero_image_path starts with '/' — the model's heroImageUrl()
     * returns it as-is (static public asset, not storage).
     */
    public function run(): void
    {
        // ── Main section record ──
        /** @var WelcomeSection $section */
        $section = WelcomeSection::create([
            'heading'          => 'Welcome to DevDimensions',
            'description'      => "We solve those hiring headaches. No we aren't doctors, just former exited founders with a proven process that has worked for us. From websites, applications, to enterprise solutions, we don't just design + develop; we become your innovation partner.",
            'cta_text'         => 'Request Quote',
            'cta_url'          => '/contact-us',
            'hero_image_path'  => '/assets/images/submit-hire.png',
            'hero_image_alt'   => '3:1 Submit to Hire',
            'status'           => 'active',
        ]);

        // ── Slider lines with their cycling items ──
        $lines = [
            [
                'sort_order'  => 0,
                'prefix_text' => 'I need a',
                'items'       => [
                    'Full Stack Developer',
                    'Product Designer',
                    'QA Testing Analyst',
                ],
            ],
            [
                'sort_order'  => 1,
                'prefix_text' => 'that specializes in',
                'items'       => [
                    'MERN Stack',
                    'Prototyping',
                    'Automated Testing',
                ],
            ],
            [
                'sort_order'  => 2,
                'prefix_text' => 'for',
                'items'       => [
                    'Web Application',
                    'UX Optimization',
                    'Bug Detection',
                ],
            ],
        ];

        foreach ($lines as $lineData) {
            /** @var WelcomeSectionSliderLine $line */
            $line = WelcomeSectionSliderLine::create([
                'welcome_section_id' => $section->id,
                'sort_order'         => $lineData['sort_order'],
                'prefix_text'        => $lineData['prefix_text'],
                'status'             => 'active',
            ]);

            foreach ($lineData['items'] as $idx => $text) {
                WelcomeSectionSliderItem::create([
                    'slider_line_id' => $line->id,
                    'sort_order'     => $idx,
                    'item_text'      => $text,
                    'status'         => 'active',
                ]);
            }
        }
    }
}
