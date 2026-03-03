<?php

namespace Database\Seeders;

use App\Models\CaseStudyProject;
use Illuminate\Database\Seeder;

class CaseStudyProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Skip if records already exist (idempotent)
        if (CaseStudyProject::withTrashed()->exists()) {
            return;
        }

        $projects = [
            [
                'title'       => 'Literal Co',
                'slug'        => 'literal-co',
                'categories'  => ['Design'],
                'image_path'  => 'Frame-1261153157-21.png',
                'description' => 'The first retail media platform that unites on-site and off-site capabilities. We empower brands and retailers to seamlessly connect with their audiences wherever they are. With our innovative solutions.',
                'tools'       => ['tool-1.png', 'tool-2.png'],
                'sort_order'  => 0,
                'status'      => 'active',
            ],
            [
                'title'       => 'EMD',
                'slug'        => 'emd',
                'categories'  => ['Design & Development'],
                'image_path'  => 'Frame-1261153157-15.png',
                'description' => 'The EMD Construction Company landing page was designed with a clean, professional aesthetic to highlight their expertise and commitment to quality. The layout features a striking hero section with a bold headline and an image of a recent project to capture attention.',
                'tools'       => ['tool-1.png', 'tool-2.png'],
                'sort_order'  => 1,
                'status'      => 'active',
            ],
            [
                'title'       => 'Vanrock Holdings',
                'slug'        => 'vanrock-holdings',
                'categories'  => ['Design', 'Development'],
                'image_path'  => 'Frame-1261153157-13.png',
                'description' => 'VanRock is a project that exemplifies the fusion of design and functionality, aimed at delivering robust financial results for investors through expert management. We began by crafting intuitive and visually appealing designs in Figma, focusing on clarity and user experience.',
                'tools'       => ['tool-1.png', 'tool-2.png'],
                'sort_order'  => 2,
                'status'      => 'active',
            ],
            [
                'title'       => 'Performance Tours',
                'slug'        => 'performance-tours',
                'categories'  => ['Design', 'Development'],
                'image_path'  => 'Frame-1261153157-19.png',
                'description' => "The website for Performance Tours showcases a thrilling rafting experience tailored for families seeking adventure in a bold and maximalist aesthetic. Emphasizing safety and excitement, the site's vibrant visuals and dynamic layout capture the essence of exhilarating river.",
                'tools'       => ['tool-1.png', 'tool-2.png'],
                'sort_order'  => 3,
                'status'      => 'active',
            ],
            [
                'title'       => 'Express Flooring',
                'slug'        => 'express-flooring',
                'categories'  => ['Design', 'Development'],
                'image_path'  => 'Frame-1261153157-10.png',
                'description' => '"Express Flooring" is a dynamic website specializing in interior flooring solutions and products, including a wide range of tiles. Utilizing blue as the accent color, the design conveys a sense of trust and professionalism while maintaining a modern and clean aesthetic.',
                'tools'       => ['tool-1.png', 'tool-2.png'],
                'sort_order'  => 4,
                'status'      => 'active',
            ],
            [
                'title'       => 'Soy Kitty',
                'slug'        => 'soy-kitty',
                'categories'  => ['Design'],
                'image_path'  => 'Frame-1261153157-7.png',
                'description' => '"Soy Kitty" is a thoughtfully designed website that caters to environmentally conscious cat owners seeking non-toxic, odor-free, and eco-friendly cat litter options. The site features a simple yet elegant layout, utilizing soothing pastel colors to create a calming and user-friendly experience.',
                'tools'       => ['tool-1.png', 'tool-2.png'],
                'sort_order'  => 5,
                'status'      => 'active',
            ],
        ];

        foreach ($projects as $project) {
            CaseStudyProject::create($project);
        }
    }
}
