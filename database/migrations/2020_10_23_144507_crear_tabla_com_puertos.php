<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaComPuertos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('com_puertos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip', 20);
            $table->string('puerto', 5);
            $table->integer('caja');
            $table->integer('sucursal_id')->unsigned();
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')->on('sucursales')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('com_puertos');
    }
}
