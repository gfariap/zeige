<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CriarTabelaTelas extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('imagem');
            $table->integer('apresentacao_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('apresentacao_id')->references('id')->on('apresentacoes');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('telas');
    }
}
