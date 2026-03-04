<?php

// SAVE AS: database/migrations/2025_04_01_000003_create_footer_offices_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footer_offices', function (Blueprint $table) {
            $table->id();

            // Country / office label e.g. "United States", "Pakistan"
            $table->string('country', 120);

            // Flag image — null falls back to static asset if any
            $table->string('flag_path', 255)->nullable();

            // Street / city address
            $table->string('address', 500)->nullable();

            // Clickable phone number — stored without formatting, displayed as-is
            $table->string('phone', 60)->nullable();

            // Contact email
            $table->string('email', 180)->nullable();

            // Address href — defaults to "#"
            $table->string('address_url', 500)->default('#');

            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_offices');
    }
};
