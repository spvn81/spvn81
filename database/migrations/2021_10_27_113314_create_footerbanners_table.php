<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterbannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footerbanners', function (Blueprint $table) {
            $table->id();
            $table->string('bg_image')->nullable();
            $table->text('bg_link')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('bg_gradient_color_one')->nullable();
            $table->string('bg_gradient_color_two')->nullable();
            $table->text('main_title')->nullable();
            $table->text('main_description')->nullable();
            $table->text('button_link')->nullable();
            $table->string('button_name')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('footerbanners');
    }
}
