<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CuponUsuarioController;
use App\Http\Controllers\LoginController;
use App\Models\Cupon;
use App\Http\Controllers\PerfilUsuarioController;

// =======================
// RUTAS DEL ADMINISTRADOR
// =======================

// Dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.inicio');

// Usuarios (Admin)
Route::get('/usuarios/buscar', [UsuarioController::class, 'buscar'])->name('usuarios.buscar');
Route::resource('usuarios', UsuarioController::class);

// Cupones (Admin)
Route::get('/cupones/buscar', [CuponController::class, 'buscar'])->name('cupones.buscar');
Route::resource('cupones', CuponController::class)->parameters(['cupones' => 'cupon']); // <- ESTA CREA cupones.index

// Órdenes (Admin)
Route::get('/ordenes/buscar', [OrdenController::class, 'buscar'])->name('ordenes.buscar');
Route::resource('ordenes', OrdenController::class)->parameters(['ordenes' => 'orden']);


// ========================
// RUTAS PÚBLICAS (usuario)
// ========================

// Página principal
Route::get('/', function () {
    return view('usuario.inicio');
})->name('usuario.inicio');

// Página de presentación de cupones (pública con datos reales)
Route::get('/cupones-publico', function () {
    $cupones = Cupon::all();
    return view('usuario.cupones', compact('cupones'));
})->name('cupones.publico');

// Página de cupones dinámica para usuarios logueados
Route::get('/ver-cupones', [CuponUsuarioController::class, 'index'])->name('usuario.cupones');

// Página protegida con sesión (usuario logueado)
Route::get('/cupones-sesion', [CuponUsuarioController::class, 'cuponesConSesion'])->name('usuario.cupones.sesion');

// Página para ver el historial de cupones
Route::get('/historial-cupones', [CuponUsuarioController::class, 'historial'])->name('historial.cupones');




// =======================
// REGISTRO DE USUARIOS
// =======================
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


// =======================
// INICIAR / CERRAR SESIÓN
// =======================

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/login', function () {
    if (session()->has('usuario_id')) {
        return redirect(session('rol_id') == 1 ? route('admin.inicio') : route('usuario.cupones.sesion'));
    }
    return redirect('/');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// =======================
// ACTUALIZAR PERFIL
// =======================

Route::get('/usuario/editar-perfil', [PerfilUsuarioController::class, 'edit'])->name('usuario.perfil.edit');
Route::put('/usuario/editar-perfil', [PerfilUsuarioController::class, 'update'])->name('usuario.perfil.update');

// =======================
// CANJEAR CUPONES
// =======================
Route::post('/cupon/canjear', [CuponUsuarioController::class, 'canjearCupon'])->name('cupon.canjear');


