<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coupon extends Model
{
    use HasFactory;

    // Tabla asociada (opcional si se llama "coupons")
    protected $table = 'coupons';

    // Campos que se pueden llenar con asignación masiva
    protected $fillable = [
        'code',
        'discount',
        'expires_at',
    ];

    // Convertir automáticamente a tipo fecha
    protected $dates = ['expires_at'];

    // Método para verificar si el cupón está vencido
    public function isExpired()
    {
        return $this->expires_at < Carbon::now();
    }
}
