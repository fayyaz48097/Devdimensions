<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_mission_vision', function (Blueprint $table) {
            $table->id();

            $table->enum('status', ['active', 'inactive'])->default('active');

            // Mission
            $table->string('mission_title', 100)->default('Our Mission');
            $table->text('mission_description');

            // Vision
            $table->string('vision_title', 100)->default('Our Vision');
            $table->text('vision_description');

            // Icons (small 50×50 images)
            $table->string('mission_icon', 255)->nullable();
            $table->string('vision_icon', 255)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_mission_vision');
    }
};
