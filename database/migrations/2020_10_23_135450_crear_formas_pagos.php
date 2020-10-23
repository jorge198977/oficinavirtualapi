<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearFormasPagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formas_pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', 100);
            $table->integer('tipo');
            $table->integer('operacion');
            $table->integer('codbanco');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formas_pagos');
    }
}
