<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * welcome_section_slider_items — the individual cycling words/phrases
     * inside each slider line.
     *
     * Each item belongs to a slider_line.
     * The blade duplicates the first item at the end for a seamless CSS loop —
     * that duplication is handled in the blade, not stored here.
     *
     * sort_order controls the cycle sequence.
     */
    public function up(): void
    {
        Schema::create('welcome_section_slider_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('slider_line_id')
                ->constrained('welcome_section_slider_lines')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->string('item_text', 150);    // e.g. "Full Stack Developer"
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('welcome_section_slider_items');
    }
};
