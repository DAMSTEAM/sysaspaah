<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = "tbl_inscripciones";

    protected $primaryKey = 'ID_INSCRIPCION';

    public $incrementing = true;

    protected $guarded = ['ID_INSCRIPCION'];

    public function socio() {
        return $this->belongsTo('App\Models\sys\Socio', 'FK_APROBADO', 'ID_SOCIO');
    }

    public function persona() {
        return $this->belongsTo('App\Models\sys\Persona', 'FK_SOLICITADO', 'ID_PERSONA');
    }

    public function ingreso() {
        return $this->belongsTo('App\Models\sys\Ingreso', 'FK_INGRESO', 'ID_INSCRIPCION');
    }

    public function requisitos_inscripciones() {
        return $this->hasMany('App\Models\sys\RequisitoInscripcion', 'FK_INSCRIPCION', 'ID_INSCRIPCION');
    }
}
