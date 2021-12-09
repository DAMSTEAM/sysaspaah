<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAlquileresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_alquileres', function (Blueprint $table) {
            $table->id('ID_ALQUILER');
            $table->date('FE_INICIO');
            $table->date('FE_FIN');
            $table->string('DE_OBSERVACION', 200);
            $table->char('ES_ALQUILER', 1);
            $table->integer('CO_ALQUILER');
            $table->unsignedBigInteger('FK_SOLICITUD');
            $table->unsignedBigInteger('FK_MAQUINARIA');
            $table->unsignedBigInteger('FK_DIRECCION');
            $table->unsignedBigInteger('FK_INGRESO');
            
            $table->foreign('FK_DIRECCION', 'tbl_direccion_tbl_alquiler_fk')->references('ID_DIRECCION')->on('tbl_direcciones');
            $table->foreign('FK_INGRESO', 'tbl_ingresos_tbl_alquiler_fk')->references('ID_INGRESO')->on('tbl_ingresos');
            $table->foreign('FK_MAQUINARIA', 'tbl_maquinaria_tbl_alquiler_fk')->references('ID_MAQUINARIA')->on('tbl_maquinarias');
            $table->foreign('FK_SOLICITUD', 'tbl_solicitud_tbl_alquiler_fk')->references('ID_SOLICITUD')->on('tbl_solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_alquileres');
    }
}
