<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function buscar(Request $request)
    {
        $campo = $request->input('campo', 'nombre_usuario');
        $query = $request->input('q', '');

        // Validar que el campo sea uno permitido
        $camposValidos = ['nombre_usuario', 'correo_electronico', 'telefono'];
        if (!in_array($campo, $camposValidos)) {
            return response('Campo de búsqueda no válido.', 400);
        }

        $usuarios = Usuario::where($campo, 'ILIKE', "%{$query}%")->get();

        return view('partials.cards', compact('usuarios'));
    }


    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rol_id' => 'required|exists:rol,rol_id',
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
                'regex:/[a-z]/', // minúscula
                'regex:/[A-Z]/', // mayúscula
                'regex:/[0-9]/', // número
                'regex:/[@$!%*#?&]/' // símbolo
            ],
        ]);

        Usuario::create([
            'rol_id' => $request->rol_id,
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

        return redirect()->route('usuarios.index')->with('success', 'Usuario registrado correctamente.');
    }
    public function show(Usuario $usuario)
{
    return view('usuarios.show', compact('usuario'));
}

public function edit(Usuario $usuario)
{
    $roles = Rol::all();
    return view('usuarios.edit', compact('usuario', 'roles'));
}

public function update(Request $request, Usuario $usuario)
{
    $request->validate([
        'rol_id' => 'required|exists:rol,rol_id',
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
        'rol_id' => $request->rol_id,
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

    return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
}

    public function destroy(Usuario $usuario)
        {
        $usuario->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }

}
