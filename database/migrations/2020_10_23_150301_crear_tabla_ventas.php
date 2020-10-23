<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('documento');
            $table->date('fecha');
            $table->boolean('nula');
            $table->time('hora');
            $table->integer('movimiento_venta_id');
            $table->integer('usuario_id')->unsigned();
            $table->integer('contrato_id')->unsigned();
            $table->timestamps();

            $table->foreign('movimiento_venta_id')->references('id')->on('movimientos_ventas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ventas');
    }
}
