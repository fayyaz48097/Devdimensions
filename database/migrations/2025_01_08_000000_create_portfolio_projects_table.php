<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();

            // Display order for the slider
            $table->unsignedSmallInteger('sort_order')->default(0);

            // Project identity
            $table->string('title', 150);
            $table->string('slug', 160)->unique();

            // Categories — stored as JSON array (e.g. ["Design","Development"])
            $table->json('categories');

            // Description shown on the card
            $table->text('description');

            // Desktop image (large horizontal card ~900px)
            $table->string('img_desktop_path', 255)->nullable();
            $table->string('img_desktop_original_name', 255)->nullable();

            // Mobile image (compact vertical card ~340px)
            $table->string('img_mobile_path', 255)->nullable();
            $table->string('img_mobile_original_name', 255)->nullable();

            // Optional deep-link to a case-study page
            $table->string('project_url', 255)->nullable();

            // Visibility
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_projects');
    }
};
