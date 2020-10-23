<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAutorizaSolicitudes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoriza_solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('autoriza');
            $table->date('fecha');
            $table->boolean('leido');
            $table->integer('valor');
            $table->time('hora');
            $table->integer('usuario_id')->unsigned();
            $table->integer('estado_solicitud_id')->unsigned();
            $table->timestamps();


            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_solicitud_id')->references('id')->on('estados_solicitudes')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autoriza_solicitudes');
    }
}
