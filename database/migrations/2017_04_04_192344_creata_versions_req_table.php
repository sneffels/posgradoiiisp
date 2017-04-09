<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreataVersionsReqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ReqVersions',function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('version_id')->unsigned();
            $table->integer('req_id')->unsigned();
            $table->foreign('version_id')->references('id')->on('versions');
            $table->foreign('req_id')->references('id')->on('requirements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
