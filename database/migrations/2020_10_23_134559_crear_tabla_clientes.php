<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut',12)->unique();
            $table->string('nombres',50);
            $table->string('paterno',50);
            $table->string('materno',50);
            $table->string('nacionalidad',40);
            $table->string('telefono1',12);
            $table->string('telefono2',12);
            $table->string('email',100);
            $table->string('empresa',50)->default('');
            $table->string('direccion_comercial',100);
            $table->string('telefono_comercial1',12);
            $table->string('telefono_comercial2',12);
            $table->string('email_comercial',100);
            $table->date('fecha_nacimiento');
            $table->integer('sexo');
            $table->integer('banco');
            $table->string('ctacte_banco',20);
            $table->integer('tipo_tarjeta');
            $table->string('numero_tarjeta',20);
            $table->string('tipo_cliente',1);
            $table->string('giro',50);
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
        Schema::dropIfExists('clientes');
    }
}
