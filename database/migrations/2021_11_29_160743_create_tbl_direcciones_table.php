<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_direcciones', function (Blueprint $table) {
            $table->id('ID_DIRECCION');
            $table->string('NO_REFERENCIA', 200);
            $table->timestamps();
            $table->unsignedBigInteger('FK_COMUNIDAD');
            
            $table->foreign('FK_COMUNIDAD', 'tbl_comunidad_tbl_direccion_fk')->references('ID_COMUNIDAD')->on('tbl_comunidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_direcciones');
    }
}
