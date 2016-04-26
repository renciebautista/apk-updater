<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVersionNameOnApksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apks', function (Blueprint $table) {
            $table->string('version_name')->after('version');
            $table->integer('downloads')->after('token');
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apks', function (Blueprint $table) {
            $table->dropColumn(['version_name', 'downloads']);
        });
    }
}
