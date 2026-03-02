<?php
// SAVE AS: database/seeders/CtaSeeder.php

namespace Database\Seeders;

use App\Models\CtaSectionSetting;
use Illuminate\Database\Seeder;

class CtaSeeder extends Seeder
{
    public function run(): void
    {
        CtaSectionSetting::firstOrCreate([], [
            'heading'             => 'Connect With The Top 3% Where Brilliance Ignites Extraordinary Achievements.',
            'btn_primary_label'   => 'Hire Engineers',
            'btn_primary_url'     => '/contact-us',
            'btn_secondary_label' => 'Develop With Us',
            'btn_secondary_url'   => '/contact-us',
            'status'              => 'active',
        ]);
    }
}
