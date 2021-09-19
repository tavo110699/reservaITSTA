<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('idUser');
            $table->string('name',255);
            $table->string('apPaterno',255);
            $table->string('apMaterno',255);
            $table->string('Telefono',10);
            $table->string('RFC',13);
            $table->string('CURP',18);
            $table->dateTime('fechaNacimiento');
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
        Schema::dropIfExists('personal_dates');
    }
}
