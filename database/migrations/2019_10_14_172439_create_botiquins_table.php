<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBotiquinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('botiquins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('medicamentos')->default(false);
            $table->boolean('guantes')->default(false);
            $table->boolean('algodon')->default(false);
            $table->boolean('cinta_adhesiva')->default(false);
            $table->boolean('termometro')->default(false);
            $table->boolean('antiseptico')->default(false);
            $table->boolean('gasas')->default(false);
            $table->boolean('tijeras')->default(false);
            $table->boolean('yodo')->default(false);
            $table->boolean('curitas')->default(false);
            $table->boolean('vendas')->default(false);
            $table->boolean('cubrebocas')->default(false);
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
        Schema::dropIfExists('botiquins');
    }
}
