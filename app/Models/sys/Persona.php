<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = "mae_personas";

    protected $primaryKey = 'ID_PERSONA';

    public $incrementing = true;

    protected $guarded = ['ID_PERSONA'];
    /* protected $fillable = ['NO_SOCIO', 'AP_PATERNO', 'AP_MATERNO', 'CO_DNI', 'NU_CELULAR', 'TI_SEXO', 'FE_NACIMIENTO']; */

    public function socio() {
        return $this->hasOne('App\Models\sys\Socio', 'FK_SOCIO', 'ID_SOCIO');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'FK_PERSONA', 'ID_PERSONA');
    }

    public function usuario() {
        return $this->hasOne('App\Models\sys\Usuario', 'FK_PERSONA', 'ID_USUARIO');
    }
}
