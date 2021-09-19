<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('idUser');
            $table->string('gradoAcademico');
            $table->string('carreraProfesional');
            $table->string('puesto');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesional_dates');
    }
}
