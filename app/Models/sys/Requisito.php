<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;

    protected $table = "tbl_requisitos";

    protected $primaryKey = 'ID_REQUISITO';

    public $incrementing = true;

    protected $guarded = ['ID_REQUISITO'];

    public function requisitos_inscripciones() {
        return $this->hasMany('App\Models\sys\RequisitoInscripcion', 'FK_REQUISITO', 'ID_REQUISITO');
    }
}
