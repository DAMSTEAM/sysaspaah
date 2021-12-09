<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = "tbl_provincias";

    protected $primaryKey = 'ID_PROVINCIA';

    public $incrementing = true;

    protected $guarded = ['ID_PROVINCIA'];

    public function departamento() {
        return $this->belongsTo('App\Models\sys\Departamento');
    }

    public function distritos() {
        return $this->hasMany('App\Models\sys\Distritos', 'FK_PROVINCIA', 'ID_DISTRITO');
    }
}
