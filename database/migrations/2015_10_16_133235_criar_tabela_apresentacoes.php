<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CriarTabelaApresentacoes extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apresentacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('versao');
            $table->string('dispositivo');
            $table->integer('projeto_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('projeto_id')->references('id')->on('projetos');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('apresentacoes');
    }
}
