<?php

// SAVE AS: database/seeders/FooterSeeder.php

namespace Database\Seeders;

use App\Models\FooterOffice;
use App\Models\FooterSetting;
use App\Models\FooterSocialLink;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        // ── Settings (logo falls back to static asset) ──
        FooterSetting::create([
            'logo_path'      => null, // uses assets/images/logo.svg
            'tagline'        => 'We believe in growing together by empowering businesses through technology.',
            'copyright_text' => '© {year} DevDimensions. All rights reserved.',
            'status'         => 'active',
        ]);

        // ── Social Links ──
        $socials = [
            ['platform' => 'Facebook',  'url' => 'https://www.facebook.com/devdimensions/',           'icon_key' => 'facebook',  'sort_order' => 0],
            ['platform' => 'LinkedIn',  'url' => 'https://www.linkedin.com/company/devdimensions',    'icon_key' => 'linkedin',  'sort_order' => 1],
            ['platform' => 'Instagram', 'url' => 'https://www.instagram.com/devdimensions.official',  'icon_key' => 'instagram', 'sort_order' => 2],
        ];

        foreach ($socials as $s) {
            FooterSocialLink::create(array_merge($s, ['status' => 'active']));
        }

        // ── Offices ──
        FooterOffice::create([
            'country'     => 'United States',
            'flag_path'   => null,   // uses assets/images/us-flag.png as fallback in blade
            'address'     => '10788 Lake Wynds, Boynton Beach, FL',
            'phone'       => '+1 (561) 336-0919',
            'email'       => 'info@devdimensions.com',
            'address_url' => '#',
            'sort_order'  => 0,
            'status'      => 'active',
        ]);

        FooterOffice::create([
            'country'     => 'Pakistan',
            'flag_path'   => null,   // uses assets/images/pak-flag.png as fallback in blade
            'address'     => '26 K Service Rd, Block K, Phase 2, Johar Town Lahore, Pakistan.',
            'phone'       => '+92 42 322 96908',
            'email'       => 'info@devdimensions.com',
            'address_url' => '#',
            'sort_order'  => 1,
            'status'      => 'active',
        ]);
    }
}
