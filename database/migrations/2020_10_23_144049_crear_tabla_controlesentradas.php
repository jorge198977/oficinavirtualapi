<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaControlesentradas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controlesentradas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('ip', 15);
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('controlesentradas');
    }
}
