<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $table = "mae_socios";

    protected $primaryKey = 'ID_SOCIO';

    public $incrementing = true;

    protected $guarded = ['ID_SOCIO'];

    public function comunidad() {
        return $this->belongsTo('App\Models\sys\Comunidad', 'FK_COMUNIDAD', 'ID_COMUNIDAD');
    }

    public function persona() {
        return $this->belongsTo('App\Models\sys\Persona', 'FK_PERSONA', 'ID_PERSONA');
    }
}
