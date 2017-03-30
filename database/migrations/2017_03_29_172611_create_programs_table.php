<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('academic_offer_id')->unsigned();
            $table->foreign('academic_offer_id')->references('id')->on('academicOffers');
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
