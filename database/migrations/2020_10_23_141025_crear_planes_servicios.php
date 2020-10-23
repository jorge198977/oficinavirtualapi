<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPlanesServicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_servicios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('valor');
            $table->integer('plan_id')->unsigned();
            $table->string('servicio_id', 50);
            $table->timestamps();

            $table->foreign('plan_id')->references('id')->on('planes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('planes_servicios');
    }
}
