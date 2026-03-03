<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutMissionVision;

class AboutMissionVisionSeeder extends Seeder
{
    public function run(): void
    {
        AboutMissionVision::create([
            'status'                => 'active',
            'mission_title'         => 'Our Mission',
            'mission_description'   => "Our mission is to enable the talent, cultivating a fertile ground where professional growth and innovation bloom. Our aim is to channel this reservoir of expertise into building success stories for clients.",
            'vision_title'          => 'Our Vision',
            'vision_description'    => "Our vision is a world where every company has access to a dream team to accelerate their success. We provide a pain free way to source global talent, setting the stage for a lifetime of innovation.",
            // Icons optional — admin can upload later
        ]);
    }
}
