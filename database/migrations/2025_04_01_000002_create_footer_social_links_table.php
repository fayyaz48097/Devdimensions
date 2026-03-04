<?php

// SAVE AS: database/migrations/2025_04_01_000002_create_footer_social_links_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footer_social_links', function (Blueprint $table) {
            $table->id();

            // e.g. "Facebook", "LinkedIn", "Instagram"
            $table->string('platform', 80);

            // Full URL
            $table->string('url', 500);

            // Which SVG icon to use — matches platform name slug
            // e.g. "facebook" | "linkedin" | "instagram" | "twitter" | "youtube"
            $table->string('icon_key', 40)->default('link');

            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_social_links');
    }
};
