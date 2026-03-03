<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_study_hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->default('We Win,');
            $table->string('heading_highlight')->default('When You Do.');
            $table->text('description');
            $table->string('bg_image_path')->nullable();
            $table->string('bg_image_original_name')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_study_hero_sections');
    }
};
