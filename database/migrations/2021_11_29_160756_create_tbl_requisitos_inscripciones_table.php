<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRequisitosInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_requisitos_inscripciones', function (Blueprint $table) {
            $table->id('ID_REQUISITO_INSCRIPCION');
            $table->string('DE_URL', 200);
            $table->unsignedBigInteger('FK_INSCRIPCION');
            $table->unsignedBigInteger('FK_REQUISITO');
            $table->timestamps();
            
            $table->foreign('FK_INSCRIPCION', 'tbl_inscripcion_tbl_req_ins_fk')->references('ID_INSCRIPCION')->on('tbl_inscripciones');
            $table->foreign('FK_REQUISITO', 'tbl_requisito_tbl_req_ins_fk')->references('ID_REQUISITO')->on('tbl_requisitos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('tbl_requisitos_inscripciones');
    }
}
