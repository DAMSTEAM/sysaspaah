<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RequisitoInscripcion extends Pivot
{
    use HasFactory;

    protected $table = "tbl_requisitos_inscripciones";

    protected $primaryKey = 'ID_REQUISITO_INSCRIPCION';

    public $incrementing = true;

    protected $guarded = ['ID_REQUISITO_INSCRIPCION'];
}
