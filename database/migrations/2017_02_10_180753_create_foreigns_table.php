<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign',function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('personId')->unsigned();
            $table->integer('countryId')->unsigned();
            $table->integer('cityId')->unsigned();
            $table->foreign('personId')->references('id')->on('persons');
            $table->foreign('countryId')->references('id')->on('countries');
            $table->foreign('cityId')->references('id')->on('cities');
            
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
