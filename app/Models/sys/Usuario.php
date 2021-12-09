<?php

namespace App\Models\sys;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "mae_usuarios";

    protected $primary_key = 'ID_USUARIO';

    public $incrementing = true;

    protected $guarded = [''];

    public function persona() {
        return $this->belongsTo('App\Models\sys\Persona');
    }
}
