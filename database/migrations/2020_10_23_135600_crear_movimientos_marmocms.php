<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearMovimientosMarmocms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marmocms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca', 100);
            $table->string('modelo', 100);
            $table->boolean('tipo');
            $table->string('docsis', 10);
            $table->string('url', 100);
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
        Schema::dropIfExists('marmocms');
    }
}
