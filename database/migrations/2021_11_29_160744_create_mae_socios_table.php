<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_socios', function (Blueprint $table) {
            $table->id('ID_SOCIO');
            $table->char('ES_SOCIO', 1);
            $table->char('TI_SOCIO', 1);
            $table->unsignedBigInteger('FK_COMUNIDAD');
            $table->unsignedBigInteger('FK_PERSONA')->unique();
            $table->timestamps();
            
            $table->foreign('FK_PERSONA', 'mae_persona_mae_socio_fk')->references('ID_PERSONA')->on('mae_personas');
            $table->foreign('FK_COMUNIDAD', 'tbl_comunidad_mae_socio_fk')->references('ID_COMUNIDAD')->on('tbl_comunidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_socios');
    }
}
