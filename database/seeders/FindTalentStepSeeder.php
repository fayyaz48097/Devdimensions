<?php

namespace Database\Seeders;

use App\Models\FindTalentStep;
use Illuminate\Database\Seeder;

class FindTalentStepSeeder extends Seeder
{
    /**
     * Seeds the 5 original steps from the hardcoded blade.
     * icon_path stores the asset() path — the model's iconUrl() returns it as-is
     * since it starts with '/'.
     */
    public function run(): void
    {
        $steps = [
            [
                'sort_order'  => 0,
                'icon_path'   => '/assets/images/engineer.svg',
                'title_bold'  => 'Exhausting',
                'title_plain' => 'Interviews',
                'bold_first'  => true,
                'tooltip_text' => '30+ interviews for every 1 job slot',
            ],
            [
                'sort_order'  => 1,
                'icon_path'   => '/assets/images/clarity_talk-bubbles-line.svg',
                'title_plain' => 'Communication',
                'title_bold'  => 'Gaps',
                'bold_first'  => false,
                'tooltip_text' => 'Communication across time zones is slow, unclear, & difficult',
            ],
            [
                'sort_order'  => 2,
                'icon_path'   => '/assets/images/like-shapes.svg',
                'title_bold'  => 'Quality',
                'title_plain' => 'Issues',
                'bold_first'  => true,
                'tooltip_text' => "Quality isn't worth money/time spent",
            ],
            [
                'sort_order'  => 3,
                'icon_path'   => '/assets/images/uim_process.svg',
                'title_bold'  => 'Minimal',
                'title_plain' => 'Systems',
                'bold_first'  => true,
                'tooltip_text' => 'Minimal consistency across projects without systems',
            ],
            [
                'sort_order'  => 4,
                'icon_path'   => '/assets/images/fluent_clock-28-regular.svg',
                'title_bold'  => 'Timeline',
                'title_plain' => 'Constraints',
                'bold_first'  => true,
                'tooltip_text' => 'No guarantee on project timeline or completion',
            ],
        ];

        foreach ($steps as $step) {
            FindTalentStep::create(array_merge($step, [
                'status'             => 'active',
                'icon_original_name' => null,
            ]));
        }
    }
}
