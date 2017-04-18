<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moduleEnrollment',function(Blueprint $table){
           $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->integer('grade')->nullable();
            $table->text('obs')->nullable;
            $table->char('enrollmentType'); //Nuevp-repitente
            $table->integer('enrollment_id')->unsigned();
            $table->integer('course_id')->unsigned();

            $table->foreign('student_id')->references('id')->on('persons');
            $table->foreign('module_id')->references('id')->on('versionModules');
            $table->foreign('enrollment_id')->references('id')->on('versionEnrollment');

            $table->foreign('course_id')->references('id')->on('courses');

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
