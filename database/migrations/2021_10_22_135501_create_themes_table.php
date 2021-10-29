<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('nav_background_color');
            $table->string('font_color');
            $table->string('navbar_on_mouser_hover');
            $table->string('footer_part_one');
            $table->string('footer_part_one_font');
            $table->string('footer_part_two');
            $table->string('footer_part_two_fount');
            $table->string('footer_part_three');
            $table->string('footer_part_three_fount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
