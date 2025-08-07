<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'correo_electronico' => 'required|email',
            'contrasena' => 'required'
        ]);

        $usuario = Usuario::where('correo_electronico', $request->correo_electronico)->first();

        if ($usuario && Hash::check($request->contrasena, $usuario->contrasena)) {
            Session::put('usuario_id', $usuario->usuario_id);
            Session::put('nombre_usuario', $usuario->nombre_usuario);
            Session::put('rol_id', $usuario->rol_id);

            // Redirigir según rol
            return ($usuario->rol_id == 1)
                ? redirect()->route('admin.inicio')          // Panel administrador
                : redirect()->route('usuario.cupones.sesion'); // Vista con sesión de usuario
        }

        return back()->withErrors(['mensaje' => 'Credenciales incorrectas.'])->withInput();
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
