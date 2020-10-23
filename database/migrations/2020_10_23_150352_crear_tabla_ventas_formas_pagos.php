<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaVentasFormasPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_formas_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nro_documento');
            $table->integer('valor');
            $table->date('fecha_vencimiento');
            $table->string('rut', 12);
            $table->integer('venta_id')->unsigned();
            $table->integer('forma_pago_id')->unsigned();
            $table->timestamps();

            $table->foreign('venta_id')->references('id')->on('ventas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('forma_pago_id')->references('id')->on('formas_pagos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_formas_pagos');
    }
}
