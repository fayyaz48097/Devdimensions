<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marquee_items', function (Blueprint $table) {
            $table->id();

            // Which scroll row this item belongs to (1 = left, 2 = right/reverse)
            $table->unsignedTinyInteger('row')->default(1);

            // Display label (e.g. "React Js")
            $table->string('label', 100);

            // Uploaded icon — stored path relative to storage/public
            $table->string('icon_path', 255)->nullable();

            // Original filename, useful for showing the admin what was uploaded
            $table->string('icon_original_name', 255)->nullable();

            // Display order within its row (lower = earlier)
            $table->unsignedSmallInteger('sort_order')->default(0);

            // Active / Inactive — controls visibility without deleting
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marquee_items');
    }
};
