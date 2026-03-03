<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * about_join_now_sections — singleton content block for the About Us
     * "Join Now" (call-to-action) section.
     *
     * Elements:
     *   logo_path / logo_original_name / logo_alt  — top logo image
     *   heading                                    — main H2 text
     *   description                                — paragraph below heading
     *   cta_text                                   — button label
     *   cta_url                                    — button href
     *   status                                     — active | inactive
     */
    public function up(): void
    {
        Schema::create('about_join_now_sections', function (Blueprint $table) {
            $table->id();

            // Logo image
            $table->string('logo_path', 255)->nullable();
            $table->string('logo_original_name', 255)->nullable();
            $table->string('logo_alt', 255)->nullable()->default('DevDimensions logo');

            // Text content
            $table->string('heading', 255)->default('Your turn to step up to the plate!');
            $table->text('description')->nullable();

            // CTA button
            $table->string('cta_text', 100)->default("Let's Dive In");
            $table->string('cta_url', 255)->default('/contact-us');

            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_join_now_sections');
    }
};
