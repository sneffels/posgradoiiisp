<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRrhhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rrhh',function(Blueprint $table){
            $table->increments('id');

            $table->char('state');//activo, inactivo
            $table->char('type');//administrativo, academico
            $table->date('startDate');
            $table->string('curriculumFilePath');
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->longText('description');//short description about his o her job at iiisp
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
