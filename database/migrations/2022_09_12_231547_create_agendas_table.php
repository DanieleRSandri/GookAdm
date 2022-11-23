<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('horario_inicio');
            $table->time('horario_final');
            $table->string('status',50);
            $table->date('data');
            $table->bigInteger('id_cliente')->unsigned()->nullable();
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->bigInteger('id_quadra')->unsigned()->nullable();
            $table->foreign('id_quadra')->references('id')->on('quadras');
            $table->bigInteger('id_users')->unsigned()->nullable();
            $table->foreign('id_users')->references('id')->on('users');
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
        Schema::dropIfExists('agendas');
    }
}
