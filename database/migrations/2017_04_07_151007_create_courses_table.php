<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses',function(Blueprint $table){
           $table->increments('id');
            $table->integer('version_id')->unsigned();
            $table->integer('version_module_id')->unsigned();
            $table->foreign('version_id')->references('id')->on('versions');
            $table->foreign('version_module_id')->references('id')->on('versionModules');
            $table->integer('professor_id')->unsigned()->nullable();
            $table->foreign('professor_id')->references('id')->on('rrhh');
            $table->string('course');

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
