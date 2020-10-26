<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaOntsSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onts_series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serie', '180')->unique();
            $table->string('nombre')->unique();
            $table->integer('estado')->default(0);
            $table->integer('marmo_ont_id')->unsigned();
            $table->timestamps();

            $table->foreign('marmo_ont_id')->references('id')->on('marmos_onts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('onts_series');
    }
}
