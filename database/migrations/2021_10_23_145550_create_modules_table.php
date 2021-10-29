<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->string('title');
            $table->string('home_img');    
            $table->string('mudule_main_image');
            $table->text('module_description');
            $table->string('module_small_description');
            $table->integer('show_in_home_page');
            $table->integer('status');  
            $table->timestamps();
        });


        Schema::create('moduleFeatures', function (Blueprint $table) {
            $table->id();
            $table->integer('module_id');
            $table->string('feature');
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
        Schema::dropIfExists('modules');
    }
}
