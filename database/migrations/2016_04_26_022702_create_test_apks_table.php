<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestApksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_apks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('app_name')->unique();
            $table->string('pkgname')->unique();
            $table->string('version');
            $table->string('version_name');
            $table->string('md5');
            $table->string('filename');
            $table->string('filesize');
            $table->string('token');
            $table->integer('downloads');
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
        Schema::drop('test_apks');
    }
}
