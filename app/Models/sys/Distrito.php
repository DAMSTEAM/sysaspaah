<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = "tbl_distritos";

    protected $primaryKey = 'ID_DISTRITO';

    public $incrementing = true;

    protected $guarded = ['ID_DISTRITO'];

    public function provincia() {
        return $this->belongsTo('App\Models\sys\Provincia', 'FK_DISTRITO', 'ID_DISTRITO');
    }

    public function comunidades() {
        return $this->hasMany('App\Models\sys\Comunidad', 'FK_DISTRITO', 'ID_COMUNIDAD');
    }
}
