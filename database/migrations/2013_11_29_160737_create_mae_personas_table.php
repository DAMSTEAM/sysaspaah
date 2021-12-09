<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_personas', function (Blueprint $table) {
            $table->id('ID_PERSONA');
            $table->string('NO_SOCIO', 100);
            $table->string('AP_PATERNO', 80);
            $table->string('AP_MATERNO', 80);
            $table->integer('CO_DNI');
            $table->integer('NU_CELULAR');
            $table->string('FI_DNI', 200);
            $table->char('TI_SEXO', 1);
            $table->date('FE_NACIMIENTO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_personas');
    }
}
