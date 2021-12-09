<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_eventos', function (Blueprint $table) {
            $table->id('ID_EVENTO');
            $table->string('CO_EVENTO', 10);
            $table->string('NO_EVENTO', 100);
            $table->string('DE_EVENTO', 200);
            $table->char('ES_EVENTO', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_eventos');
    }
}
