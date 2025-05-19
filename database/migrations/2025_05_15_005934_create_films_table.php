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
        Schema::create('films', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('original_title');
            $table->string('original_title_romanised');
            $table->string('image');
            $table->string('movie_banner');
            $table->text('description');
            $table->string('director');
            $table->string('producer');
            $table->string('release_date');
            $table->string('running_time');
            $table->string('rt_score');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
