<?php
// SAVE AS: database/migrations/2025_01_09_000000_create_process_and_hire_section_tables.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── Process: singleton settings row ──────────────────────────
        Schema::create('process_section_settings', function (Blueprint $table) {
            $table->id();
            $table->string('heading', 150)->default('Our Approach');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });

        // ── Process: individual steps ────────────────────────────────
        Schema::create('process_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->string('icon_path', 255)->nullable();
            $table->string('icon_original_name', 255)->nullable();
            $table->string('title', 150);
            $table->text('description');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });

        // ── Hire: singleton settings row ─────────────────────────────
        Schema::create('hire_section_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('heading', 200)->default("We're the Utility Player");
            $table->text('subheading');
            $table->json('checklist_items');          // JSON array of strings
            $table->string('cta_label', 100)->default('Get Free Consultation');
            $table->string('cta_url', 255)->default('/contact-us');
            $table->timestamps();
        });

        // ── Hire: right-column boxes ─────────────────────────────────
        Schema::create('hire_boxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->string('image_path', 255)->nullable();
            $table->string('image_original_name', 255)->nullable();
            $table->string('title', 150);
            $table->text('description');
            $table->string('box_url', 255)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hire_boxes');
        Schema::dropIfExists('hire_section_settings');
        Schema::dropIfExists('process_steps');
        Schema::dropIfExists('process_section_settings');
    }
};
