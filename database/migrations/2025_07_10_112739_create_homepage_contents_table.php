<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            $table->string('main_heading')->nullable();
            $table->text('main_content')->nullable();
            $table->string('plans_main_heading')->nullable();
            $table->json('plans')->nullable();
            $table->string('why_choose_us_main_heading')->nullable();
            $table->json('why_choose_us_items')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_contents');
    }
};