<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAndroidAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('android_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('android_app_permission_id');
            $table->foreign('android_app_permission_id')->references('id')->on('permissions');
            $table->string('version');
            $table->string('description');
            $table->boolean('available');
            $table->double('price');
            $table->string('avatar');

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
        Schema::dropIfExists('android_apps');
    }
}
