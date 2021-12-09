<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    use HasFactory;

    protected $table = "tbl_comunidades";

    protected $primaryKey = 'ID_COMUNIDAD'; //id

    public $incrementing = true;

    protected $guarded = ['ID_COMUNIDAD'];

    public function distrito() {
        return $this->belongsTo('App\Models\sys\Distrito', 'FK_DISTRITO', 'ID_COMUNIDAD');
    }

    public function socios() {
        return $this->hasMany('App\Models\sys\Socio', '', 'ID_SOCIO');
    }
}
