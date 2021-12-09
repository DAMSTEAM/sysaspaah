<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoInscripcion extends Model
{
    use HasFactory;

    protected $table = "tbl_requisitos_inscripciones";

    protected $primaryKey = 'ID_REQUISITO_INSCRIPCION';

    public $incrementing = true;

    protected $guarded = ['ID_REQUISITO_INSCRIPCION'];

    public function requisito() {
        return $this->belongsTo('App\Models\sys\Requisito', 'FK_REQUISITO', 'ID_REQUISITO');
    }

    public function inscripcion() {
        return $this->belongsTo('App\Models\sys\Inscripcion', 'FK_INSCRIPCION', 'ID_REQUISITO_INSCRIPCION');
    }
}
