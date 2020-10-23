<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaNotasCreditos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas_creditos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('observacion');
            $table->integer('venta_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();

            $table->foreign('venta_id')->references('id')->on('ventas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('notas_creditos');
    }
}
