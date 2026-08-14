<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('badge')->nullable();
            $table->string('image_path')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_desc')->nullable();
            $table->json('specifications')->nullable();
            
            // New dynamic fields for full control
            $table->json('spec_bar')->nullable();
            $table->string('app_heading')->nullable();
            $table->string('app_commercial_title')->nullable();
            $table->text('app_commercial_desc')->nullable();
            $table->string('app_commercial_image')->nullable();
            $table->string('app_industrial_title')->nullable();
            $table->text('app_industrial_desc')->nullable();
            $table->string('app_industrial_image')->nullable();
            $table->json('details')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
