<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_asistencias', function (Blueprint $table) {
            $table->id('ID_ASISTENCIA');
            $table->char('ES_SOCIO', 1);
            $table->date('FE_LLEGADA_SOCIO');
            $table->unsignedBigInteger('FK_EVENTO');
            $table->unsignedBigInteger('FK_SOCIO');
            
            $table->foreign('FK_EVENTO', 'tbl_evento_tbl_asistencia_fk')->references('ID_EVENTO')->on('tbl_eventos');
            $table->foreign('FK_SOCIO', 'mae_socio_tbl_asistencia_fk')->references('ID_SOCIO')->on('mae_socios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_asistencias');
    }
}
