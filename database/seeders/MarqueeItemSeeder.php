<?php

namespace Database\Seeders;

use App\Models\MarqueeItem;
use Illuminate\Database\Seeder;

class MarqueeItemSeeder extends Seeder
{
    /**
     * Seed all marquee items from the original hardcoded blade data.
     *
     * Icons are stored as remote URLs in `icon_path` for the seed run.
     * When an admin uploads a local file later it will overwrite this value.
     *
     * Note: The public blade reads `icon_path` via `iconUrl()`.
     * For seeded rows `icon_path` holds the full external URL directly,
     * so `asset('storage/...')` is NOT used — the blade handles this gracefully
     * by checking whether the path is a URL or a storage-relative path.
     *
     * To avoid that complexity we store the URLs directly and the blade
     * renders them as-is (see marqueesection.blade.php).
     */
    public function run(): void
    {
        // ── Row 1 — left scroll ──
        $row1 = [
            ['label' => 'WordPress',    'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Wordpress.svg'],
            ['label' => 'Vue Js',       'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Vue-Js.svg'],
            ['label' => 'Angular Js',   'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Frame-1261153381.svg'],
            ['label' => 'PhpStorm',     'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/PHP-Storm.svg'],
            ['label' => 'Python',       'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Python.svg'],
            ['label' => 'Ruby on Rails', 'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Ruby-Rails.svg'],
            ['label' => 'Webflow',      'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Webflow.svg'],
            ['label' => 'Express Js',   'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Frame-1261153380.svg'],
            ['label' => 'Shopify',      'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Frame-1261153379.svg'],
            ['label' => 'Node Js',      'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Node-js.svg'],
            ['label' => 'React Js',     'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/React-js.svg'],
            ['label' => 'Laravel',      'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Laravel.svg'],
            ['label' => '.Net',         'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Dot-Net.svg'],
            ['label' => 'iOS',          'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Apple.svg'],
            ['label' => 'Android',      'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Android.svg'],
            ['label' => 'JavaScript',   'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Java-Script.svg'],
            ['label' => 'Mongo DB',     'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Mongo-DB.svg'],
            ['label' => 'Next Js',      'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Next-js.svg'],
            ['label' => 'Nuxt Js',      'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Nuxt-Js.svg'],
        ];

        // ── Row 2 — right/reverse scroll ──
        $row2 = [
            ['label' => 'Zoho',         'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Zoho-CRM.svg'],
            ['label' => 'Zapier',       'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Zapier.svg'],
            ['label' => 'VS Code',      'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Vs-Code.svg'],
            ['label' => 'Photoshop',    'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Photo-Shop.svg'],
            ['label' => 'Adobe XD',     'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Adobe-Xd.svg'],
            ['label' => 'AI',           'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Adobe-Indesign.svg'],
            ['label' => 'Amazon',       'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Amazon.svg'],
            ['label' => 'Unbounce',     'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Unbounce.svg'],
            ['label' => 'Click Funnel', 'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Click-Funnel.svg'],
            ['label' => 'Figma',        'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Figma.svg'],
            ['label' => 'Express Js',   'icon_path' => 'https://devdimensions.com/wp-content/uploads/2024/06/Express-Js.svg'],
        ];

        foreach ($row1 as $order => $item) {
            MarqueeItem::create([
                'row'        => 1,
                'label'      => $item['label'],
                'icon_path'  => $item['icon_path'],
                'sort_order' => $order,
                'status'     => 'active',
            ]);
        }

        foreach ($row2 as $order => $item) {
            MarqueeItem::create([
                'row'        => 2,
                'label'      => $item['label'],
                'icon_path'  => $item['icon_path'],
                'sort_order' => $order,
                'status'     => 'active',
            ]);
        }
    }
}
