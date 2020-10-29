<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCmclientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmclientes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->integer('bpi');
            $table->string('email', 150);
            $table->string('clavewifi', 100);
            $table->date('primerpago');
            $table->integer('contrato_id')->unsigned();
            $table->string('cmmac_id', 12);
            $table->integer('orden_trabajo_id')->unsigned();
            $table->integer('estado_cm_id')->unsigned();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cmmac_id')->references('id')->on('cmmacs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('orden_trabajo_id')->references('id')->on('ordenes_trabajos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_cm_id')->references('id')->on('estados_cms')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cmmclientes');
    }
}
