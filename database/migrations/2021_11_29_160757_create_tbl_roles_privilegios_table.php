<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRolesPrivilegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_roles_privilegios', function (Blueprint $table) {
            $table->id('ID_ROL_PRIVILEGIO');
            $table->unsignedBigInteger('FK_PRIVILEGIO');
            $table->unsignedBigInteger('FK_ROL');
            
            $table->foreign('FK_PRIVILEGIO', 'tbl_privilegio_tbl_usuario_privilegio_fk')->references('ID_PRIVILEGIO')->on('tbl_privilegios');
            $table->foreign('FK_ROL', 'tbl_role_tbl_usuario_privilegio_fk')->references('ID_ROL')->on('tbl_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_roles_privilegios');
    }
}
