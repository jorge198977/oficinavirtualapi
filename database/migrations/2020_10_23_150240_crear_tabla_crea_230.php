<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCrea230 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crea_230', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mes');
            $table->integer('anio');
            $table->integer('cable');
            $table->integer('internet');
            $table->integer('premium');
            $table->integer('boca');
            $table->integer('descuento');
            $table->integer('valor_230');
            $table->integer('contrato_id')->unsigned();
            $table->integer('carga_adicional_id')->unsigned();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('carga_adicional_id')->references('id')->on('cargas_adicionales')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crea_230');
    }
}
