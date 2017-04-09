<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReqEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reqEnrollment',function(Blueprint $table){
            $table->increments('id');
            $table->integer('ver_enrollment_id')->unsigned();
            $table->foreign('ver_enrollment_id')->references('id')->on('versionEnrollment');
            $table->integer('req_id')->unsigned();
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
