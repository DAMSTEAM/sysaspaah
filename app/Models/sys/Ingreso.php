<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $table = "tbl_ingresos";

    protected $primaryKey = 'ID_INGRESO';

    public $incrementing = true;

    protected $guarded = ['ID_INGRESO'];

    public function inscripcion() {
        return $this->hasOne('App\Models\sys\Inscripcion', 'FK_INGRESO', 'ID_INSCRIPCION');
    }
}
