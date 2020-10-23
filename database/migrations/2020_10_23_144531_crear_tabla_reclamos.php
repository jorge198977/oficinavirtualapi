<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaReclamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->text('detalle');
            $table->integer('fono');
            $table->text('observacion');
            $table->integer('sucursal_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('contrato_id')->unsigned();
            $table->integer('tipo_reclamo_id')->unsigned();
            $table->integer('orden_trabajo_id')->unsigned();
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')->on('sucursales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_reclamo_id')->references('id')->on('tipos_reclamos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('reclamos');
    }
}
