<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProvinciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_provincias', function (Blueprint $table) {
            $table->id('ID_PROVINCIA');
            $table->string('NO_PROVINCIA', 100);
            $table->unsignedBigInteger('FK_DEPARTAMENTO');
            $table->timestamps();

            $table->foreign('FK_DEPARTAMENTO', 'tbl_departamento_tbl_provincia_fk')->references('ID_DEPARTAMENTO')->on('tbl_departamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_provincias');
    }
}
