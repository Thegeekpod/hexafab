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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tag')->default('BLOG'); // BLOG, CAMPAIGN, WEBINAR, etc.
            $table->text('description')->nullable(); // Card excerpt
            $table->longText('content')->nullable(); // Full article content
            $table->string('image_path')->nullable();
            $table->string('link_text')->default('Read more →');
            $table->string('author')->nullable()->default('Hexafab Editorial Team');
            $table->string('reading_time')->nullable()->default('5 min read');
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
