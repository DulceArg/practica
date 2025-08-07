<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $table = 'cupon';
    protected $primaryKey = 'cupon_id';

    protected $fillable = [
        'codigo',
        'fecha_inicio',
        'fecha_expiracion',
        'stock',
        'estatus',
        'imagen',
        'tipo_cupon_id',
    ];

    public function tipoCupon()
    {
        return $this->belongsTo(TipoCupon::class, 'tipo_cupon_id', 'tipo_cupon_id');
    }

    public function ordenes()
    {
        return $this->hasMany(Orden::class, 'cupon_id', 'cupon_id');
    }

    public function getRouteKeyName()
    {
        return 'cupon_id';
    }
}
