<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncargadoSitiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargado_sitios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idPlace');
            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idPlace')->references('id')->on('places')->onDelete('cascade');

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
        Schema::dropIfExists('encargado_sitios');
    }
}
