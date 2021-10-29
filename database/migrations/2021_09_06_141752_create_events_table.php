<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->string('event_name');
            $table->string('event_type');
            $table->string('event_duration');
            $table->string('event_start');
            $table->string('event_emd');
            $table->string('image');
            $table->integer('descreption');
            $table->text('is_home');
            $table->integer('is_home_top');
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
        Schema::dropIfExists('events');
    }
}
