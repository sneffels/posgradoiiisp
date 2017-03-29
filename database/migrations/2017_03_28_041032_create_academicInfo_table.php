<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicInfos',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('graduationDegree');
            $table->integer('personId')->unsigned();
            $table->foreign('personId')->references('id')->on('persons');
            $table->integer('institutionId')->unsigned();
            $table->foreign('institutionId')->references('id')->on('institutions');

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
