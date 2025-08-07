<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'usuario_id';

    protected $fillable = [
        'nombre_usuario',
        'apellido_paterno_usuario',
        'apellido_materno_usuario',
        'correo_electronico',
        'telefono',
        'estado',
        'municipio',
        'colonia',
        'codigo_postal',
        'calle',
        'numero_interior',
        'numero_exterior',
        'contrasena',
        'rol_id',
    ];

    public function getRouteKeyName()
    {
        return 'usuario_id';
    }

    // Relaciones
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
