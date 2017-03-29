<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationals',function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('personId')->unsigned();
            $table->integer('cdDepartmentId')->unsigned();
            $table->integer('provinceId')->unsigned();
            $table->foreign('personId')->references('id')->on('persons');
            $table->foreign('cdDepartmentId')->references('id')->on('cdDepartments');
            $table->foreign('provinceId')->references('id')->on('provinces'); 
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
