<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * welcome_sections — singleton content block for the homepage Welcome section.
     *
     * Manages:
     *  • heading           — main H2 heading text
     *  • description       — body paragraph below the heading
     *  • cta_text          — button label (e.g. "Request Quote")
     *  • cta_url           — button href
     *  • hero_image_path   — right-side uploaded image
     *  • hero_image_alt    — alt text for accessibility
     *  • status            — active | inactive (hides section when inactive/deleted)
     */
    public function up(): void
    {
        Schema::create('welcome_sections', function (Blueprint $table) {
            $table->id();

            // ── Heading & Body ──
            $table->string('heading', 255)->default('Welcome to DevDimensions');
            $table->text('description');

            // ── CTA Button ──
            $table->string('cta_text', 80)->default('Request Quote');
            $table->string('cta_url', 255)->default('/contact-us');

            // ── Right-side Hero Image ──
            $table->string('hero_image_path', 255)->nullable();
            $table->string('hero_image_original_name', 255)->nullable();
            $table->string('hero_image_alt', 255)->nullable()->default('DevDimensions');

            // ── Visibility ──
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('welcome_sections');
    }
};
