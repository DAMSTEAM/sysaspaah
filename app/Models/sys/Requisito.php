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

    public function inscripciones() {
        return $this->belongsToMany('App\Models\sys\Inscripcion', 'tbl_requisitos_inscripciones', 'FK_REQUISITO', 'FK_INSCRIPCION')
        ->withTimestamps();
    }
}
