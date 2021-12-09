<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_egresos', function (Blueprint $table) {
            $table->id('ID_EGRESO');
            $table->string('NO_EGRESO', 150);
            $table->float('MO_DINERO');
            $table->unsignedBigInteger('FK_SOCIO');
            
            $table->foreign('FK_SOCIO', 'mae_socio_tbl_egresos_fk')->references('ID_SOCIO')->on('mae_socios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_egresos');
    }
}
