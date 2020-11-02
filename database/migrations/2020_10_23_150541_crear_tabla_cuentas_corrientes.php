<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCuentasCorrientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_corrientes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_documento');
            $table->date('fecha_vencimiento');
            $table->integer('valor');
            $table->integer('signo');
            $table->integer('movimiento_ctacte_id');
            $table->integer('venta_id')->unsigned();
            $table->integer('contrato_id')->unsigned();
            $table->timestamps();

            $table->foreign('movimiento_ctacte_id')->references('id')->on('movimientos_ctactes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('venta_id')->references('id')->on('ventas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas_corrientes');
    }
}
