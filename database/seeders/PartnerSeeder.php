<?php
// SAVE AS: database/seeders/PartnerSeeder.php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\PartnerSectionSetting;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        PartnerSectionSetting::firstOrCreate([], [
            'heading' => 'Our Partners',
            'status'  => 'active',
        ]);

        $partners = [
            ['alt_text' => 'Thinkrite',               'src' => '/assets/images/Mask-group.svg'],
            ['alt_text' => 'Ellianos Coffee',          'src' => '/assets/images/Mask-group-1.svg'],
            ['alt_text' => 'Panoramic Ventures',       'src' => '/assets/images/logo-1-1.svg'],
            ['alt_text' => 'FHG',                      'src' => '/assets/images/Mask-group-2.svg'],
            ['alt_text' => 'University of Pittsburgh', 'src' => '/assets/images/Frame-1261152960-1.svg'],
            ['alt_text' => 'Virga Labs',               'src' => '/assets/images/Mask-group-3.svg'],
        ];

        foreach ($partners as $i => $p) {
            Partner::firstOrCreate(['alt_text' => $p['alt_text']], [
                'image_path'  => $p['src'],
                'sort_order'  => $i,
                'status'      => 'active',
            ]);
        }
    }
}
