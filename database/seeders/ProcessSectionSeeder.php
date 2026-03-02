<?php
// SAVE AS: database/seeders/ProcessSectionSeeder.php

namespace Database\Seeders;

use App\Models\ProcessSectionSetting;
use App\Models\ProcessStep;
use Illuminate\Database\Seeder;

class ProcessSectionSeeder extends Seeder
{
    public function run(): void
    {
        ProcessSectionSetting::create([
            'heading' => 'Our Approach',
            'status'  => 'active',
        ]);

        $steps = [
            [
                'sort_order'         => 0,
                'icon_path'          => '/assets/images/icon-1.svg',
                'icon_original_name' => 'icon-1.svg',
                'title'              => 'Clarify Objectives',
                'description'        => "We'll Meet to collaborate on understanding your requirements, defining your Goals, and Strategising for Your Success.",
                'status'             => 'active',
            ],
            [
                'sort_order'         => 1,
                'icon_path'          => '/assets/images/Group-39218.svg',
                'icon_original_name' => 'Group-39218.svg',
                'title'              => 'Meet Engineers',
                'description'        => 'We will save your time by efficiently connecting you with one of the Most Compatible Talents from Our Family of Experts.',
                'status'             => 'active',
            ],
            [
                'sort_order'         => 2,
                'icon_path'          => '/assets/images/Group-39216.svg',
                'icon_original_name' => 'Group-39216.svg',
                'title'              => '7 Day Try Out',
                'description'        => 'Experience a 7-day trial before deciding because we believe successful allocations build long-term partnerships.',
                'status'             => 'active',
            ],
            [
                'sort_order'         => 3,
                'icon_path'          => '/assets/images/startup-1.svg',
                'icon_original_name' => 'startup-1.svg',
                'title'              => 'Build Your Dream Team',
                'description'        => 'Embrace your chosen standout by adding them to your dream team & solidify a powerful partnership built for success.',
                'status'             => 'active',
            ],
        ];

        foreach ($steps as $s) {
            ProcessStep::create($s);
        }
    }
}
