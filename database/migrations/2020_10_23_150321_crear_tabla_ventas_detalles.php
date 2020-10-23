<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaVentasDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('producto');
            $table->integer('valor_final');
            $table->string('descripcion', 150);
            $table->integer('venta_id')->unsigned();
            $table->timestamps();

            $table->foreign('venta_id')->references('id')->on('ventas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_detalles');
    }
}
