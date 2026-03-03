<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * about_core_value_sections — singleton content block for the About Us
     * Core Values section.
     *
     * Elements:
     *   title          — the H1 heading ("Our Core Values")
     *   diagram_image_path          — the circle diagram image (desktop + mobile)
     *   diagram_image_original_name — original filename for display
     *   diagram_image_alt           — alt text for accessibility
     *   status         — active | inactive
     */
    public function up(): void
    {
        Schema::create('about_core_value_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title', 255)->default('Our Core Values');

            // Diagram image (same file used for both desktop and mobile views)
            $table->string('diagram_image_path', 255)->nullable();
            $table->string('diagram_image_original_name', 255)->nullable();
            $table->string('diagram_image_alt', 255)->nullable()->default('Our Core Values Diagram');

            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_core_value_sections');
    }
};
