<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearCalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calles', function (Blueprint $table) {
            $table->increments('id');
            $table->String('calle',150);
            $table->integer('poblacion_id')->unsigned();
            $table->timestamps();

            $table->foreign('poblacion_id')->references('id')->on('poblaciones')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calles');
    }
}
