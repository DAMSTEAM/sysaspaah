<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblComunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comunidades', function (Blueprint $table) {
            $table->id('ID_COMUNIDAD');
            $table->string('NO_COMUNIDAD', 100);
            $table->unsignedBigInteger('FK_DISTRITO');
            $table->timestamps();
            
            $table->foreign('FK_DISTRITO', 'tbl_distrito_tbl_comunidad_fk')->references('ID_DISTRITO')->on('tbl_distritos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_comunidades');
    }
}
