<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminHomeControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_home_controllers_sectionone', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('background_img')->nullable();
            $table->text('content');
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('admin_home_controllers_footer_menu_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('menu_id');
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
        Schema::dropIfExists('admin_home_controllers');
    }
}
