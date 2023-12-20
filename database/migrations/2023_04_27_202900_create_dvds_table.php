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
        Schema::create('dvds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('location_id');
            $table->string('name');
            $table->string('official_website')->nullable();
            $table->string('imdb_link')->nullable();
            $table->decimal('rating', 2, 1)->nullable();
            $table->integer('number_of_discs');
            $table->integer('number_of_episodes')->nullable();
            $table->timestamps();

            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dvds');
    }
};
