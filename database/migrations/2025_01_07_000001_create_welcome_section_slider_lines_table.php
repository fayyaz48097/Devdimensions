<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * welcome_section_slider_lines — the three animated text rows.
     *
     * Each row has:
     *  • prefix_text  — the static label shown before the slider (e.g. "I need a")
     *  • sort_order   — controls display position (0, 1, 2)
     *  • status       — active | inactive
     *
     * The three cycling words per row are stored in welcome_section_slider_items.
     */
    public function up(): void
    {
        Schema::create('welcome_section_slider_lines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('welcome_section_id')
                ->constrained('welcome_sections')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->string('prefix_text', 120);   // e.g. "I need a"
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('welcome_section_slider_lines');
    }
};
