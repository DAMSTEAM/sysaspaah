<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_maquinarias', function (Blueprint $table) {
            $table->id('ID_MAQUINARIA');
            $table->char('TI_MAQUINARIA', 1);
            $table->char('ES_MAQUINARIA', 1);
            $table->string('CO_MARCA', 15);
            $table->string('NO_MODELO', 50);
            $table->string('DE_MAQUINARIA', 200);
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
        Schema::dropIfExists('mae_maquinarias');
    }
}
