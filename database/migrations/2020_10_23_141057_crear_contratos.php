<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearContratos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('correlativo_manual');
            $table->date('fecha');
            $table->integer('cliente_id')->unsigned();
            $table->integer('plan_id')->unsigned();
            $table->date('fecha_inicio_pago');
            $table->integer('dia_pago');
            $table->date('fecha_conexion');
            $table->integer('estado_conexion_id')->unsigned();
            $table->date('fecha_estado_conexion');
            $table->text('observacion');
            $table->integer('motivo_desconexion');
            $table->integer('direccion_id')->unsigned();
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('planes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('estado_conexion_id')->references('id')->on('estados_conexiones')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
