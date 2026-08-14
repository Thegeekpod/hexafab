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
        Schema::table('resource_items', function (Blueprint $table) {
            $table->string('pdf_path')->nullable()->after('description');
            $table->string('icon_type')->default('brochure')->after('pdf_path'); // brochure, manual, specs, custom
            $table->string('tag')->nullable()->change();
            $table->string('image_path')->nullable()->change();
            $table->string('link_text')->default('Download PDF')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resource_items', function (Blueprint $table) {
            $table->dropColumn(['pdf_path', 'icon_type']);
        });
    }
};
