<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_hero_sections', function (Blueprint $table) {
            $table->id();

            // ── Status & Visibility ──
            $table->enum('status', ['active', 'inactive'])->default('active');

            // ── Heading ──
            $table->string('heading_plain', 100)->default('Discover DevDimensions:');
            $table->string('heading_gradient', 100)->default('Your Premier Talent Partner');

            // ── Paragraph ──
            $table->text('paragraph_text');

            // ── Background Image ──
            $table->string('bg_image', 255)->nullable();

            // ── Get in Touch Badge ──
            $table->string('get_in_touch_image', 255)->nullable();     // rotating circle image
            $table->string('get_in_touch_url', 255)->default('/contact-us');

            // ── Soft Delete & Timestamps ──
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_hero_sections');
    }
};
