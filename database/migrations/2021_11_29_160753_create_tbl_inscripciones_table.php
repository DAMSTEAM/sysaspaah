<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_inscripciones', function (Blueprint $table) {
            $table->id('ID_INSCRIPCION');
            $table->char('ES_INSCRIPCION', 1);
            $table->unsignedBigInteger('FK_INGRESO');
            $table->unsignedBigInteger('FK_SOLICITADO');
            $table->unsignedBigInteger('FK_APROBADO');
            $table->timestamps();
            
            $table->foreign('FK_SOLICITADO', 'mae_persona_tbl_inscripcion_fk')->references('ID_PERSONA')->on('mae_personas');
            $table->foreign('FK_APROBADO', 'mae_socios_tbl_inscripciones_fk')->references('ID_SOCIO')->on('mae_socios');
            $table->foreign('FK_INGRESO', 'tbl_ingresos_tbl_inscripcion_fk')->references('ID_INGRESO')->on('tbl_ingresos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_inscripciones');
    }
}
