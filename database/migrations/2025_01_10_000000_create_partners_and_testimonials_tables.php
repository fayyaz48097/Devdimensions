<?php
// SAVE AS: database/migrations/2025_01_10_000000_create_partners_and_testimonials_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── Partners: singleton settings row ─────────────────────────
        Schema::create('partner_section_settings', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 200)->default('Our Partners');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // ── Partners: individual logos ───────────────────────────────
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->string('image_path', 255)->nullable();
            $table->string('image_original_name', 255)->nullable();
            $table->string('alt_text', 150);
            $table->string('link_url', 255)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });

        // ── Testimonials: singleton settings row ─────────────────────
        Schema::create('testimonial_section_settings', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 200)->default("Don't Take Our Word for it");
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // ── Testimonials: individual cards ───────────────────────────
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->string('portrait_path', 255)->nullable();
            $table->string('portrait_original_name', 255)->nullable();
            $table->string('logo_path', 255)->nullable();
            $table->string('logo_original_name', 255)->nullable();
            $table->string('project_label', 150);          // e.g. "Project:TripSeer"
            $table->text('quote');
            $table->string('author_name', 150);            // e.g. "-Markus F."
            $table->string('author_role', 200);            // e.g. "Founder & CEO TripSeer"
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('testimonial_section_settings');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('partner_section_settings');
    }
};
