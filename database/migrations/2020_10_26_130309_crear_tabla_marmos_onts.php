<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMarmosOnts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marmos_onts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca', 100);
            $table->string('modelo', 100);
            $table->integer('CATV');
            $table->integer('wireless');
            $table->integer('wireless5');
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
        Schema::dropIfExists('marmos_onts');
    }
}
