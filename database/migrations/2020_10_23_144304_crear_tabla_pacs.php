<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPacs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('ncuenta', 50);
            $table->boolean('vigente');
            $table->integer('convenio');
            $table->integer('boleta');
            $table->boolean('finalizada');
            $table->integer('mes');
            $table->integer('anio');
            $table->boolean('aprobado');
            $table->integer('contrato_id')->unsigned();
            $table->integer('banco_id')->unsigned();
            $table->integer('tipo_cuenta_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('sucursal_id')->unsigned();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('banco_id')->references('id')->on('bancos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_cuenta_id')->references('id')->on('tipos_cuentas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sucursal_id')->references('id')->on('sucursales')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacs');
    }
}
