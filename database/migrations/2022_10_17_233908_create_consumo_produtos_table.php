<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumo_produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantidade');
            $table->bigInteger('id_produto')->unsigned()->nullable();
            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->bigInteger('id_consumo')->unsigned()->nullable();
            $table->foreign('id_consumo')->references('id')->on('consumo_clientes');
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
        Schema::dropIfExists('consumo_produtos');
    }
}
