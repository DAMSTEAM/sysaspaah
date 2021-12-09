<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_solicitudes', function (Blueprint $table) {
            $table->id('ID_SOLICITUD');
            $table->string('DE_ASUNTO', 100);
            $table->integer('CO_SOLICITUD');
            $table->integer('NU_SOLICITUD');
            $table->char('ES_SOLICITUD', 1);
            $table->unsignedBigInteger('FK_TIPO_SOLICITUD');
            $table->unsignedBigInteger('FK_SOCIO');
            
            $table->foreign('FK_SOCIO', 'mae_socio_tbl_solicitud_fk')->references('ID_SOCIO')->on('mae_socios');
            $table->foreign('FK_TIPO_SOLICITUD', 'tbl_tipo_solicitud_tbl_solicitud_fk')->references('ID_TIPO_SOLICITUD')->on('tbl_tipos_solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_solicitudes');
    }
}
