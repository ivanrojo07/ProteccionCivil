<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_mascota');
            $table->string('edad')->nullable();
            $table->string('raza')->nullable();
            $table->string('numero_registro')->nullable();
            $table->string('aviso_emergencia')->nullable();
            $table->string('telefono_emergencia')->nullable();
            $table->text('foto_mascota')->nullable();
            $table->string('sexo_mascota')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('mascotas');
    }
}
