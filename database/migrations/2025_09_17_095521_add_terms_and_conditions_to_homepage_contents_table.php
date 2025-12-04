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
        Schema::table('homepage_contents', function (Blueprint $table) {
            // Add the new column. 'text' is suitable for a text editor.
            // It's nullable as requested.
            $table->longText('terms_and_conditions')->nullable()->after('why_choose_us_items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homepage_contents', function (Blueprint $table) {
            // This will remove the column if you roll back the migration
            $table->dropColumn('terms_and_conditions');
        });
    }
};