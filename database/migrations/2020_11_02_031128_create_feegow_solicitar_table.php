<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeegowSolicitarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feegow_solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->char('CPF');
            $table->date('nascimento');
            $table->bigInteger('id_profissinal');
            $table->bigInteger('id_especialidade');
            $table->bigInteger('id_origem');
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
        Schema::dropIfExists('feegow_solicitacoes');
    }
}
