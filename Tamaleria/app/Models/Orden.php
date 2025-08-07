<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $primaryKey = 'orden_id';

    protected $fillable = [
        'fecha_orden',
        'total_orden',
        'descripcion',
        'imagen',
        'cupon_id',
    ];

    public function cupon()
    {
        return $this->belongsTo(Cupon::class, 'cupon_id', 'cupon_id');
    }

    public function getRouteKeyName()
    {
        return 'orden_id'; 
    }
}
