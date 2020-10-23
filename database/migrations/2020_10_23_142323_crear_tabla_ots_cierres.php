<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOtsCierres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ots_cierres', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->boolean('firma');
            $table->integer('orden_trabajo_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('ots_cierres');
    }
}
