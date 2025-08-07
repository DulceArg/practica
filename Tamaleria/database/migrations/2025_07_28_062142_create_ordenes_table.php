<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id('orden_id');
            $table->date('fecha_orden');
            $table->decimal('total_orden', 10, 2)->default(0);
            $table->string('descripcion'); 
            $table->string('imagen')->nullable();

            // Relaciones
            $table->unsignedBigInteger('cupon_id')->nullable();
            $table->foreign('cupon_id')->references('cupon_id')->on('cupon')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};
