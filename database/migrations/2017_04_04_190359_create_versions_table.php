<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions',function(Blueprint $table)
        {
            $table->increments('id');
            $table->char('state');
            $table->integer('nroVersion');
            
            $table->date('startDate')->nullable();
            $table->date('finishDate')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discountPrice')->nullable();
            $table->integer('enrollmentPrice')->nullable();
            $table->integer('coo_id')->unsigned()->nullable();
            $table->foreign('coo_id')->references('id')->on('rrhh');

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
