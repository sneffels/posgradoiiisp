<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencies',function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('institutionId')->unsigned();
            $table->integer('dependencyId')->unsigned();
            $table->foreign('institutionId')->references('id')->on('institutions');
            $table->foreign('dependencyId')->references('id')->on('institutions');
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
