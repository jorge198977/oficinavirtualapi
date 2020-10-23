<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTiposOts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_ots', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->integer('servdist_id')->unsigned();
            $table->boolean('revisa');
            $table->timestamps();

            $table->foreign('servdist_id')->references('id')->on('servdists')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_ots');
    }
}
