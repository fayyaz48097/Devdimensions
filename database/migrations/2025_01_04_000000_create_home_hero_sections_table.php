<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_hero_sections', function (Blueprint $table) {
            $table->id();

            // ── Status & Visibility ──
            $table->enum('status', ['active', 'inactive'])->default('active');

            // ── Heading ──
            $table->string('heading_plain', 100)->default('Build Your');        // "Build Your"
            $table->string('heading_gradient', 100)->default('Dream Team');     // "Dream Team" (gradient)

            // ── Paragraph ──
            $table->text('paragraph_text');                                      // main body text
            $table->string('paragraph_highlight_1', 100)->nullable();           // e.g. "cutting costs by 43%"
            $table->string('paragraph_highlight_2', 100)->nullable();           // e.g. "reducing staffing times by 5x"

            // ── CTA Button ──
            $table->string('cta_label', 80)->default('7 Days Free Trial');
            $table->string('cta_url', 255)->default('/contact-us');

            // ── Images ──
            $table->string('bg_image', 255)->nullable();                        // hero background
            $table->string('right_image_desktop', 255)->nullable();             // desktop right image
            $table->string('right_image_mobile', 255)->nullable();              // mobile right image

            // ── Soft Delete ──
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_hero_sections');
    }
};
