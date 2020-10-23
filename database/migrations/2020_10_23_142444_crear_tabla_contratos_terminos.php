<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaContratosTerminos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_terminos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('mensualidad', 50);
            $table->integer('mes');
            $table->integer('anio');
            $table->text('motivo');
            $table->string('nota', 150);
            $table->integer('contrato_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('orden_trabajo_id')->unsigned();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('contratos_terminos');
    }
}
