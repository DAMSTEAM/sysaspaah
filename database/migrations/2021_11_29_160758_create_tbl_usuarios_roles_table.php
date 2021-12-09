<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUsuariosRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_usuarios_roles', function (Blueprint $table) {
            $table->id('ID_USUARIO_ROL');
            $table->unsignedBigInteger('FK_ROL');
            $table->unsignedBigInteger('FK_USUARIO');
            
            $table->foreign('FK_USUARIO', 'mae_usuario_tbl_usuario_role_fk')->references('ID_USUARIO')->on('mae_usuarios');
            $table->foreign('FK_ROL', 'tbl_role_tbl_usuario_role_fk')->references('ID_ROL')->on('tbl_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_usuarios_roles');
    }
}
