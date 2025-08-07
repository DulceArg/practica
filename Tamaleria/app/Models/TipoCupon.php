<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCupon extends Model
{
    protected $table = 'tipo_cupon';
    protected $primaryKey = 'tipo_cupon_id';

    protected $fillable = [
        'descripcion',
        'porcentaje',
        'activo',
    ];
}
