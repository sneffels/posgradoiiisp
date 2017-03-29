<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('cdDepartment_id')->unsigned();
            $table->foreign('cdDepartment_id')->references('id')->on('cdDepartments');
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
