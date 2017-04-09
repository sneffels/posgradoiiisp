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
            $table->integer('nroCredits');
            $table->date('startDate');
            $table->date('finishDate');
            $table->integer('price');
            $table->integer('discountPrice');
            $table->integer('enrollmentPrice');
            $table->integer('coo_id')->unsigned();
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
