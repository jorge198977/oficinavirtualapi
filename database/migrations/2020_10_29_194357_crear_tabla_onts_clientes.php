<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOntsClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ont_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serial');
            $table->integer('estado');
            $table->string('ssid', 100);
            $table->string('clave_wifi', 100);
            $table->integer('wifi_enabled');
            $table->integer('contrato_id')->unsigned();
            $table->integer('orden_trabajo_id')->unsigned();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('orden_trabajo_id')->references('id')->on('ordenes_trabajos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ont_clientes');
    }
}
