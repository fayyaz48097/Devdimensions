<?php

namespace Database\Seeders;

use App\Models\AboutCoreValueSection;
use Illuminate\Database\Seeder;

class AboutCoreValueSectionSeeder extends Seeder
{
    /**
     * Seeds the exact hardcoded content from corevaluesection.blade.php.
     *
     * diagram_image_path starts with '/' — the model's diagramImageUrl()
     * returns it as-is (static public asset, not a storage-disk file).
     */
    public function run(): void
    {
        AboutCoreValueSection::create([
            'title'                      => 'Our Core Values',
            'diagram_image_path'         => '/assets/images/Frame-1261152973-1-1.png',
            'diagram_image_original_name' => 'Frame-1261152973-1-1.png',
            'diagram_image_alt'          => 'Our Core Values Diagram',
            'status'                     => 'active',
        ]);
    }
}
