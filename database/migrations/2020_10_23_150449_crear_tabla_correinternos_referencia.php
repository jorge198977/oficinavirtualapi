<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCorreinternosReferencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correinternos_referencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('correinterno_id')->unsigned();
            $table->integer('contrato_id')->unsigned();
            $table->timestamps();

            $table->foreign('correinterno_id')->references('id')->on('correinternos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('correinternos_referencia');
    }
}
