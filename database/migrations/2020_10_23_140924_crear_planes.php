<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearPlanes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion', '180')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->boolean('vigente')->default(true);
            $table->integer('meses')->default(0);
            $table->integer('tipo_plan_id')->unsigned();
            $table->timestamps();

            $table->foreign('tipo_plan_id')->references('id')->on('tipos_planes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planes');
    }
}
