<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMovimientosVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 100);
            $table->integer('operacion');
            $table->integer('signo');
            $table->integer('ingreso_manual');
            $table->boolean('usa_iva');
            $table->boolean('imprime');
            $table->integer('tipo_movimiento');
            $table->integer('tipo_documento_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_documento_id')->references('id')->on('tipos_documentos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos_ventas');
    }
}
