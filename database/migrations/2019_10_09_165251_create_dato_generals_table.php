<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatoGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dato_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('calle');
            $table->string('numero_interior')->nullable();
            $table->string('numero_exterior')->nullable();
            $table->string('codigo_postal');
            $table->string('colonia');
            $table->string('alcaldia');
            $table->string('estado');
            $table->string('pisos_hogar')->nullable();
            $table->string('zona_riesgo')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('dato_generals');
    }
}
