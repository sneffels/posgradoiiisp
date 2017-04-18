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
            $table->char('type');//administrativo, academico, D->administrativo, A->academic
            $table->date('startDate')->nullable();
            $table->string('curriculumFilePath')->nullable();
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->longText('description')->nullable();//short description about his o her job at iiisp
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
