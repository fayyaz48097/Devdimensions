<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 100);
            $table->string('email', 150);
            $table->string('company', 150)->nullable();
            $table->string('status', 20)->default('pending');
            $table->json('technologies')->nullable();
            $table->string('no_of_engineers', 50)->nullable();
            $table->string('type_of_hire', 100)->nullable();
            $table->string('quickly_hire', 100)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
