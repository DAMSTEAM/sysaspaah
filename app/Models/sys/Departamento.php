<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = "tbl_departamentos";

    protected $primaryKey = 'ID_DEPARTAMENTO';

    public $incrementing = true;

    protected $guarded = ['ID_DEPARTAMENTO'];

    public function provincias() {
        return $this->hasMany('App\Models\sys\Provincia', 'FK_DEPARTAMENTO', 'ID_PROVINCIA');
    }
}
