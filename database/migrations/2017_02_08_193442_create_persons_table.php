<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('middleName');
            $table->date('birthDate');
            $table->string('personalId');
            $table->string('phone');
            $table->string('cellphone');
            $table->string('email');
            $table->char('gender'); // female, male, other [M-F-O]
            $table->char('originType');// foreign or national {N[nacional]-E{extranjero}}
            
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
