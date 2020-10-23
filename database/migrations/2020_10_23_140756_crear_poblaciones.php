<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPoblaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poblaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('poblacion',150);
            $table->integer('sector_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('sector_id')->references('id')->on('sectores')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poblaciones');
    }
}
