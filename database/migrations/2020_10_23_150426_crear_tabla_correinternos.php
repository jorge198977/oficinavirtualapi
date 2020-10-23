<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCorreinternos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correinternos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ndocumento');
            $table->boolean('nulo');
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
        Schema::dropIfExists('correinternos');
    }
}
