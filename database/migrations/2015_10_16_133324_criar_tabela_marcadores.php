<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CriarTabelaMarcadores extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('x');
            $table->string('y');
            $table->string('titulo');
            $table->string('descricao');
            $table->integer('tela_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tela_id')->references('id')->on('telas');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('marcadores');
    }
}
