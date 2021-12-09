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
}
