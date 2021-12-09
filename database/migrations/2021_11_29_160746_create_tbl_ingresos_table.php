<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ingresos', function (Blueprint $table) {
            $table->id('ID_INGRESO');
            $table->char('TI_PAGO', 1);
            $table->char('TI_INGRESO', 1);
            $table->string('NO_INGRESO', 100);
            $table->float('CA_PAGO');
            $table->float('CA_DESCUENTO');
            $table->float('MO_TOTAL_PAGO');
            $table->unsignedBigInteger('FK_SOCIO');
            $table->timestamps();
            
            $table->foreign('FK_SOCIO', 'mae_socio_tbl_ingresos_fk')->references('ID_SOCIO')->on('mae_socios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_ingresos');
    }
}
