<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('usuario.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|string|min:2',
            'apellido_paterno_usuario' => 'required|string|min:2',
            'apellido_materno_usuario' => 'required|string|min:2',
            'correo_electronico' => 'required|email|unique:usuario,correo_electronico',
            'telefono' => 'required|string|min:10|max:20',
            'estado' => 'required|string',
            'municipio' => 'required|string',
            'colonia' => 'required|string',
            'codigo_postal' => 'required|integer',
            'calle' => 'nullable|string',
            'numero_exterior' => 'nullable|integer',
            'numero_interior' => 'nullable|integer',
            'contrasena' => [
                'required',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
        ]);

        $rolUsuario = Rol::where('nombre_rol', 'Usuario')->value('rol_id');

        Usuario::create([
            'rol_id' => $rolUsuario,
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
            'contrasena' => Hash::make($request->contrasena),
        ]);

        return redirect('/')->with('success', '¡Usuario registrado exitosamente!');
    }
}
