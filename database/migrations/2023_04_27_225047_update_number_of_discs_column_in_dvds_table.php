<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('dvds', function (Blueprint $table) {
            $table->integer('number_of_discs')->default(1)->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('dvds', function (Blueprint $table) {
            $table->integer('number_of_discs')->change();
        });
    }
};
