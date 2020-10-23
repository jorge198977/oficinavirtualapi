<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCmmacs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmmacs', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('cm', 20);
            $table->string('servinet_id', 50);
            $table->integer('marmocm_id')->unsigned();
            $table->timestamps();

            $table->foreign('servinet_id')->references('id')->on('servinets')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('marmocm_id')->references('id')->on('marmocms')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('cmmacs');
    }
}
