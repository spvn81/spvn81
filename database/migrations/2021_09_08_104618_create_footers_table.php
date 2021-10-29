<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->integer('catgory_id');
            $table->integer('menu_id');
            $table->integer('menu_order');
            $table->integer('status');
            $table->timestamps();
        });


        Schema::create('footer_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
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
        Schema::dropIfExists('footers');
    }
}
