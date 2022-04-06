<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido_p')->nullable();
            $table->string('apellido_m')->nullable();
            $table->date('f_nac')->nullable();
            $table->string('alergias')->nullable();
            $table->string('enfermedades')->nullable();
            $table->string('tipo_sanguineo')->nullable();
            $table->string('genero')->nullable();
            $table->string('nombre_emergencia')->nullable();
            $table->string('parentesco_emergencia')->nullable();
            $table->string('telefono_emergencia')->nullable();
            $table->string('numero_seguro')->nullable();
            $table->string('tipo_seguro')->nullable();
            $table->boolean('discapacidad')->default(false);
            $table->string('tipo_discapacidad')->nullable();
            $table->text('foto_perfil')->nullable();
            $table->boolean('responsable')->default(false);
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
        Schema::dropIfExists('familias');
    }
}
