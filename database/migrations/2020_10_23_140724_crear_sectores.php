<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearSectores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sector',100);
            $table->integer('comuna_id')->unsigned();
            $table->timestamps();

            $table->foreign('comuna_id')->references('id')->on('comunas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectores');
    }
}
