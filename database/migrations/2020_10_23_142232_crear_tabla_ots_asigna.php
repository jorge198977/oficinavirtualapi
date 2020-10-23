<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOtsAsigna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ots_asignas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_trabajo_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();

            $table->foreign('orden_trabajo_id')->references('id')->on('ordenes_trabajos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ots_asignas');
    }
}
