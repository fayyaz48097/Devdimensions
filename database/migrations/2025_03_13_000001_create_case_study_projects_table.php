<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('case_study_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            // JSON array of category strings e.g. ["Design","Development"]
            $table->json('categories');
            $table->string('image_path')->nullable();
            $table->string('image_original_name')->nullable();
            $table->text('description');
            // JSON array of tool image paths e.g. ["tool-1.png","tool-2.png"]
            $table->json('tools')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('case_study_projects');
    }
};
