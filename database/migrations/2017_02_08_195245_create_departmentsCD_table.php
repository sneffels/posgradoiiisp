<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsCDTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Department as Country Division (CD)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdDepartments', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');

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
