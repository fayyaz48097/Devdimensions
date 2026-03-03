<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            // ── Content seeders ──
            MarqueeItemSeeder::class,
            FindTalentStepSeeder::class,
            WelcomeSectionSeeder::class,
            PortfolioProjectSeeder::class,
            AdminSeeder::class,
            ProcessSectionSeeder::class,   // ← ADD
            HireSectionSeeder::class,
            PartnerSeeder::class,
            TestimonialSeeder::class,
            CtaSeeder::class,
            FaqSeeder::class,
            AboutHeroSectionSeeder::class
        ]);
    }
}
