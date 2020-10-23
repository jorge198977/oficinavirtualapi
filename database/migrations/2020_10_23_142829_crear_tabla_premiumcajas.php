<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPremiumcajas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premiumcajas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('serie', 50);
            $table->integer('contrato_id')->unsigned();
            $table->integer('orden_trabajo_id')->unsigned();
            $table->integer('estado_stb_id')->unsigned();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('orden_trabajo_id')->references('id')->on('ordenes_trabajos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('estado_stb_id')->references('id')->on('estados_stbs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premiumcajas');
    }
}
