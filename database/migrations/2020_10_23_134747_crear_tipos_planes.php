<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTiposPlanes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_planes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 185)->unique();
            $table->string('servicio_id', 50);
            $table->timestamps();

            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_planes');
    }
}
