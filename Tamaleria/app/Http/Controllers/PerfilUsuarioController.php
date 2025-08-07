<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class PerfilUsuarioController extends Controller
{
    public function edit()
    {
        $usuario = Usuario::findOrFail(session('usuario_id'));
        return view('usuario.editar-perfil', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = Usuario::findOrFail(session('usuario_id'));

        $request->validate([
            'nombre_usuario' => 'required|string|min:2',
            'apellido_paterno_usuario' => 'required|string|min:2',
            'apellido_materno_usuario' => 'required|string|min:2',
            'correo_electronico' => 'required|email|unique:usuario,correo_electronico,' . $usuario->usuario_id . ',usuario_id',
            'telefono' => 'required|string|min:10|max:20',
            'estado' => 'required|string',
            'municipio' => 'required|string',
            'colonia' => 'required|string',
            'codigo_postal' => 'required|integer',
            'calle' => 'nullable|string',
            'numero_exterior' => 'nullable|integer',
            'numero_interior' => 'nullable|integer',
            'contrasena' => [
                'nullable',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
        ]);

        $usuario->update([
            'nombre_usuario' => $request->nombre_usuario,
            'apellido_paterno_usuario' => $request->apellido_paterno_usuario,
            'apellido_materno_usuario' => $request->apellido_materno_usuario,
            'correo_electronico' => $request->correo_electronico,
            'telefono' => $request->telefono,
            'estado' => $request->estado,
            'municipio' => $request->municipio,
            'colonia' => $request->colonia,
            'codigo_postal' => $request->codigo_postal,
            'calle' => $request->calle,
            'numero_exterior' => $request->numero_exterior,
            'numero_interior' => $request->numero_interior,
            'contrasena' => $request->filled('contrasena') ? Hash::make($request->contrasena) : $usuario->contrasena,
        ]);

        return redirect('/cupones-sesion')->with('success', 'Perfil actualizado correctamente.');
    }
}
