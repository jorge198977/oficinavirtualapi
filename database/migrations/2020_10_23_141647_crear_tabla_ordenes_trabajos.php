<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOrdenesTrabajos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes_trabajos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_recepcion');
            $table->integer('nula');
            $table->integer('tipo_ot_id')->unsigned();
            $table->integer('contrato_id')->unsigned();
            $table->integer('tipo_reclamo_id')->unsigned();
            $table->integer('estado_ot_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_ot_id')->references('id')->on('tipos_ots')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_reclamo_id')->references('id')->on('tipos_reclamos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_ot_id')->references('id')->on('estados_ots')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_trabajos');
    }
}
