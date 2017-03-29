<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->char('dependencyState'); //I o D 
            $table->integer('countryId')->unsigned();
            $table->integer('cityId')->unsigned();
            $table->integer('institutionTypeId')->unsigned();
            $table->foreign('countryId')->references('id')->on('countries');
            $table->foreign('cityId')->references('id')->on('cities');
            $table->foreign('institutionTypeId')->references('id')->on('institutionTypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
;
