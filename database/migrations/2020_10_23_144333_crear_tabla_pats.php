<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pats', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('n1', 50);
            $table->integer('v1');
            $table->integer('v2');
            $table->boolean('vigente');
            $table->integer('contrato_id')->unsigned();
            $table->integer('tarjeta_id')->unsigned();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tarjeta_id')->references('id')->on('tarjetas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pats');
    }
}
