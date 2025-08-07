<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipo_cupon', function (Blueprint $table) {
            $table->id('tipo_cupon_id');
            $table->string('descripcion', 100);
            $table->decimal('porcentaje', 5, 2);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        // Tipos de cupones simples y sin restricciones
        DB::table('tipo_cupon')->insert([
            [
                'descripcion' => 'Descuento general del 10%',
                'porcentaje' => 10.00,
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'descripcion' => 'Descuento del 15% en cualquier pedido',
                'porcentaje' => 15.00,
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'descripcion' => 'Descuento automático del 5%',
                'porcentaje' => 5.00,
                'activo' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('tipo_cupon');
    }
};
