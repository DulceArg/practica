<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContadorCupon extends Model
{
    use HasFactory;

    protected $table = 'contador_cupones';
    protected $primaryKey = 'contador_id';

    protected $fillable = [
        'usuario_id',
        'tipo_cupon_id',
        'cupon_id',
        'orden_id',
        'total_cupones',
        'fecha_actualizacion',
    ];

    // Relaciones (opcional si luego quieres consultar detalles relacionados)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'usuario_id');
    }

    public function tipoCupon()
    {
        return $this->belongsTo(TipoCupon::class, 'tipo_cupon_id', 'tipo_cupon_id');
    }

    public function cupon()
    {
        return $this->belongsTo(Cupon::class, 'cupon_id', 'cupon_id');
    }

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'orden_id', 'orden_id');
    }
}
