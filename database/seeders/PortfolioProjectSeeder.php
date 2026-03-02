<?php

namespace Database\Seeders;

use App\Models\PortfolioProject;
use Illuminate\Database\Seeder;

class PortfolioProjectSeeder extends Seeder
{
    /**
     * Seeds the 7 hardcoded projects that were previously in the blade template.
     * img_desktop_path and img_mobile_path use the static asset convention
     * (leading slash) so PortfolioProject::resolveImageUrl() routes them
     * through asset() correctly.
     */
    public function run(): void
    {
        $projects = [
            [
                'sort_order'    => 1,
                'title'         => 'Literal Co',
                'slug'          => 'literal-co',
                'categories'    => ['Design'],
                'description'   => 'The first retail media platform that unites on-site and off-site capabilities. We empower brands and retailers to seamlessly connect with their audiences wherever they are. With our innovative solutions.',
                'img_desktop_path'          => '/assets/images/frame-1261153219-3-668d2b050ac7a.webp',
                'img_desktop_original_name' => 'frame-1261153219-3-668d2b050ac7a.webp',
                'img_mobile_path'           => '/assets/images/Frame-1261153157-21.png',
                'img_mobile_original_name'  => 'Frame-1261153157-21.png',
                'project_url'   => '/project/literal-co',
                'status'        => 'active',
            ],
            [
                'sort_order'    => 2,
                'title'         => 'EMD',
                'slug'          => 'emd',
                'categories'    => ['Design & Development'],
                'description'   => 'The EMD Construction Company landing page was designed with a clean, professional aesthetic to highlight their expertise and commitment to quality. The layout features a striking hero section with a bold headline and an image of a recent project to capture attention.',
                'img_desktop_path'          => '/assets/images/frame-1261153220-1-668d297b1a2ea.webp',
                'img_desktop_original_name' => 'frame-1261153220-1-668d297b1a2ea.webp',
                'img_mobile_path'           => '/assets/images/Frame-1261153157-15.png',
                'img_mobile_original_name'  => 'Frame-1261153157-15.png',
                'project_url'   => '/project/emd',
                'status'        => 'active',
            ],
            [
                'sort_order'    => 3,
                'title'         => 'Vanrock Holdings',
                'slug'          => 'vanrock-holdings',
                'categories'    => ['Design', 'Development'],
                'description'   => 'VanRock is a project that exemplifies the fusion of design and functionality, aimed at delivering robust financial results for investors through expert management. We began by crafting intuitive and visually appealing designs in Figma, focusing on clarity and user experience.',
                'img_desktop_path'          => '/assets/images/frame-1261153213-1-668d2867370a2.webp',
                'img_desktop_original_name' => 'frame-1261153213-1-668d2867370a2.webp',
                'img_mobile_path'           => '/assets/images/Frame-1261153157-13.png',
                'img_mobile_original_name'  => 'Frame-1261153157-13.png',
                'project_url'   => '/project/vanrock-holdings',
                'status'        => 'active',
            ],
            [
                'sort_order'    => 4,
                'title'         => 'Performance Tours',
                'slug'          => 'performance-tours',
                'categories'    => ['Design', 'Development'],
                'description'   => "The website for Performance Tours showcases a thrilling rafting experience tailored for families seeking adventure in a bold and maximalist aesthetic. Emphasizing safety and excitement, the site's vibrant visuals and dynamic layout capture the essence of exhilarating river.",
                'img_desktop_path'          => '/assets/images/frame-1261153219-2-668d290a3710a.webp',
                'img_desktop_original_name' => 'frame-1261153219-2-668d290a3710a.webp',
                'img_mobile_path'           => '/assets/images/Frame-1261153157-19.png',
                'img_mobile_original_name'  => 'Frame-1261153157-19.png',
                'project_url'   => '/project/performance-tours',
                'status'        => 'active',
            ],
            [
                'sort_order'    => 5,
                'title'         => 'Express Flooring',
                'slug'          => 'express-flooring',
                'categories'    => ['Design', 'Development'],
                'description'   => '"Express Flooring" is a dynamic website specializing in interior flooring solutions and products, including a wide range of tiles. Utilizing blue as the accent color, the design conveys a sense of trust and professionalism while maintaining a modern and clean aesthetic.',
                'img_desktop_path'          => '/assets/images/frame-1261153221-1-668d272b32aee.webp',
                'img_desktop_original_name' => 'frame-1261153221-1-668d272b32aee.webp',
                'img_mobile_path'           => '/assets/images/Frame-1261153157-10.png',
                'img_mobile_original_name'  => 'Frame-1261153157-10.png',
                'project_url'   => '/project/express-flooring',
                'status'        => 'active',
            ],
            [
                'sort_order'    => 6,
                'title'         => 'Soy Kitty',
                'slug'          => 'soy-kitty',
                'categories'    => ['Design'],
                'description'   => '"Soy Kitty" is a thoughtfully designed website that caters to environmentally conscious cat owners seeking non-toxic, odor-free, and eco-friendly cat litter options. The site features a simple yet elegant layout, utilizing soothing pastel colors to create a calming and user-friendly experience.',
                'img_desktop_path'          => '/assets/images/frame-1261153219-3-668d2b050ac7a.webp',
                'img_desktop_original_name' => 'frame-1261153219-3-668d2b050ac7a.webp',
                'img_mobile_path'           => '/assets/images/Frame-1261153157-21.png',
                'img_mobile_original_name'  => 'Frame-1261153157-21.png',
                'project_url'   => '/project/soy-kitty',
                'status'        => 'active',
            ],
            [
                'sort_order'    => 7,
                'title'         => 'Walter On Wine',
                'slug'          => 'walter-on-wine',
                'categories'    => ['Design'],
                'description'   => '"Walter on Wine" is a sleek and modern website that is designed to cater to wine enthusiasts and novices alike. Owned by an experienced sommelier, the site offers comprehensive information about various wines, guiding users to find the best selections tailored to their preferences.',
                'img_desktop_path'          => '/assets/images/frame-1261153213-1-668d2867370a2.webp',
                'img_desktop_original_name' => 'frame-1261153213-1-668d2867370a2.webp',
                'img_mobile_path'           => '/assets/images/Frame-1261153157-13.png',
                'img_mobile_original_name'  => 'Frame-1261153157-13.png',
                'project_url'   => '/project/walter-on-wine',
                'status'        => 'active',
            ],
        ];

        foreach ($projects as $project) {
            PortfolioProject::create($project);
        }
    }
}
