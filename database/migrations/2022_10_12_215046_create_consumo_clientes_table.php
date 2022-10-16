<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumo_clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('valorTotal', 8, 2);
            $table->bigInteger('id_cliente')->unsigned()->nullable();
            $table->foreign('id_cliente')->references('id')->on('clientes');
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
        Schema::dropIfExists('consumo_clientes');
    }
}
