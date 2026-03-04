<?php

// SAVE AS: database/migrations/2025_04_01_000001_create_footer_settings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();

            // Logo image — null falls back to assets/images/logo.svg
            $table->string('logo_path', 255)->nullable();

            // Tagline paragraph below the logo
            $table->text('tagline')->nullable();

            // Copyright bar text — supports basic placeholders e.g. {year}
            $table->string('copyright_text', 500)
                ->default('© {year} DevDimensions. All rights reserved.');

            // Section-level visibility
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};
