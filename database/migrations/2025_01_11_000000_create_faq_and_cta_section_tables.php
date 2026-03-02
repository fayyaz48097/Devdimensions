<?php
// SAVE AS: database/migrations/2025_01_11_000000_create_faq_and_cta_section_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── FAQ: singleton settings row ──────────────────────────────
        Schema::create('faq_section_settings', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 200)->default('Frequently Asked Questions');
            $table->string('subheading', 500)->default('We value long-term partnerships, and we bet you do too.');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // ── FAQ: individual Q&A items ────────────────────────────────
        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->string('question', 500);
            $table->text('answer');                  // supports basic HTML (line-breaks via <br>)
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });

        // ── CTA: singleton settings row ──────────────────────────────
        Schema::create('cta_section_settings', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 400)->default('Connect With The Top 3% Where Brilliance Ignites Extraordinary Achievements.');
            $table->string('btn_primary_label', 100)->default('Hire Engineers');
            $table->string('btn_primary_url', 255)->default('/contact-us');
            $table->string('btn_secondary_label', 100)->default('Develop With Us');
            $table->string('btn_secondary_url', 255)->default('/contact-us');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cta_section_settings');
        Schema::dropIfExists('faq_items');
        Schema::dropIfExists('faq_section_settings');
    }
};
