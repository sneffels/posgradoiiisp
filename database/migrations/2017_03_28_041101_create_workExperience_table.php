<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workExperiences',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('institution');
            $table->string('position');
            $table->integer('personId')->unsigned();
            $table->foreign('personId')->references('id')->on('persons');
            

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
