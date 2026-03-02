<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('find_talent_steps', function (Blueprint $table) {
            $table->id();

            // Display order (s-1 through s-5 positions are CSS-fixed, but order controls cycling)
            $table->unsignedTinyInteger('sort_order')->default(0);

            // Icon — uploaded SVG/image
            $table->string('icon_path', 255)->nullable();
            $table->string('icon_original_name', 255)->nullable();

            // Title: two-part — "plain text" + "bold text" (rendered as <strong>)
            // e.g. title_plain="Exhausting" title_bold="Interviews" bold_first=false
            // → "Exhausting\nInterviews" but bold part is wrapped in <strong>
            $table->string('title_plain', 100);        // the non-bold word(s)
            $table->string('title_bold', 100);         // the bolded word(s)
            $table->boolean('bold_first')->default(true); // true = bold on top, false = plain on top

            // Tooltip text shown on hover / auto-cycle
            $table->string('tooltip_text', 255);

            // Visibility
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('find_talent_steps');
    }
};
