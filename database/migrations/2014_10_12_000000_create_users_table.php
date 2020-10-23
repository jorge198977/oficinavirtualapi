<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario',100)->unique();
            $table->string('password');
            $table->string('rut');
            $table->string('nombre');
            $table->integer('administrador')->default(0);
            $table->integer('boleta')->default(0);
            $table->boolean('vigente')->default(true);
            $table->integer('boleta1')->default(0);
            $table->integer('boleta2')->default(0);
            $table->integer('boleta3')->default(0);
            $table->integer('root')->default(0);
            $table->integer('externo');
            $table->integer('caja')->default(1);
            $table->integer('boleta4')->default(0);
            $table->string('email', 180)->unique();
            $table->integer('tipo_usuario_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tipo_usuario_id')->references('id')->on('tipos_usuarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
