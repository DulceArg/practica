<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('usuario_id');
            $table->string('nombre_usuario', 50);
            $table->string('apellido_paterno_usuario', 50);
            $table->string('apellido_materno_usuario', 50);
            $table->string('correo_electronico', 100)->unique();
            $table->string('telefono', 20);
            $table->string('estado', 100)->default('Estado de México');
            $table->string('municipio', 100)->nullable();
            $table->string('colonia', 100)->nullable();
            $table->integer('codigo_postal')->checkBetween(1000, 99999);
            $table->string('calle', 100)->nullable();
            $table->integer('numero_interior')->nullable();
            $table->integer('numero_exterior')->nullable();
            $table->string('contrasena', 255);
            $table->unsignedBigInteger('rol_id');

            $table->foreign('rol_id')->references('rol_id')->on('rol')->onDelete('cascade');
            $table->timestamps();
        });

        // Insertar usuario administrador actualizado
        DB::table('usuario')->insert([
            'nombre_usuario' => 'Tamales',
            'apellido_paterno_usuario' => 'Del',
            'apellido_materno_usuario' => 'Sabor',
            'correo_electronico' => 'admin@gmail.com',
            'telefono' => '5551234567',
            'estado' => 'Estado de México',
            'municipio' => 'Acambay',
            'colonia' => 'CENTRO',
            'codigo_postal' => 50300,
            'calle' => 'Av. de los Tamales',
            'numero_interior' => 101,
            'numero_exterior' => 500,
            'contrasena' => bcrypt('Tamaleria123!'),
            'rol_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
