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
            $table->string('middleName')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('personalId');
            $table->string('phone')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('email')->nullable();
            $table->char('gender')->nullable(); // female, male, other [M-F-O]
            $table->char('originType')->nullable();// foreign or national {N[nacional]-E{extranjero}}
            $table->unique('personalId');
            $table->unique('email');
            
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
