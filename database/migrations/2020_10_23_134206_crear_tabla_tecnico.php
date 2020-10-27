<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTecnico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 165);
            $table->boolean('externo');
            $table->string('usuario', 165);
            $table->string('clave', 165);
            $table->string('email', 165);
            $table->string('rut', 165);
            $table->integer('FTTH');
            $table->integer('estado_tecnico_id')->unsigned();
            $table->timestamps();

            $table->foreign('estado_tecnico_id')->references('id')->on('estados_tecnicos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecnicos');
    }
}
