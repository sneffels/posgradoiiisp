<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VersionModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versionModules',function(Blueprint $table){
            $table->increments('id');
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('versions');
            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');
            $table->char('state');
            $table->date('startDate');
            $table->date('finishDate');
            $table->integer('credits');
            
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
