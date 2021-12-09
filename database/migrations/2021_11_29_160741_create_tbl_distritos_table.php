<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_distritos', function (Blueprint $table) {
            $table->id('ID_DISTRITO');
            $table->string('NO_DISTRITO', 100);
            $table->unsignedBigInteger('FK_PROVINCIA');
            $table->timestamps();
            
            $table->foreign('FK_PROVINCIA', 'tbl_provincia_tbl_distrito_fk')->references('ID_PROVINCIA')->on('tbl_provincias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_distritos');
    }
}
