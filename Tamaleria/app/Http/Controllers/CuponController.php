<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\TipoCupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CuponController extends Controller
{
    public function index()
    {
        $cupones = Cupon::with('tipoCupon')->get();
        return view('cupones.index', compact('cupones'));
    }
    public function buscar(Request $request)
    {
        $campo = $request->input('campo', 'codigo');
        $query = $request->input('q', '');

        // Campos válidos permitidos en el filtro
        $camposValidos = ['codigo', 'estatus', 'tipo'];
        if (!in_array($campo, $camposValidos)) {
            return response('Campo de búsqueda no válido.', 400);
        }

        // Búsqueda por tipo de cupón (descripción de la relación)
        if ($campo === 'tipo') {
            $cupones = Cupon::with('tipoCupon')
                ->whereHas('tipoCupon', function ($q) use ($query) {
                    $q->where('descripcion', 'ILIKE', "%{$query}%");
                })
                ->get();
        } else {
            // Búsqueda normal directa en el modelo Cupon
            $cupones = Cupon::with('tipoCupon')
                ->where($campo, 'ILIKE', "%{$query}%")
                ->get();
        }

        return view('partials.cupones-cards', compact('cupones'));
    }

    public function create()
    {
        $tipos = TipoCupon::all();
        return view('cupones.create', compact('tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:cupon,codigo',
            'fecha_inicio' => 'required|date',
            'fecha_expiracion' => 'required|date|after_or_equal:fecha_inicio',
            'stock' => 'required|integer|min:0',
            'estatus' => 'required|string|max:50',
            'tipo_cupon_id' => 'required|exists:tipo_cupon,tipo_cupon_id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('cupones', 'public');
        }

        Cupon::create([
            'codigo' => $request->codigo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_expiracion' => $request->fecha_expiracion,
            'stock' => $request->stock,
            'estatus' => $request->estatus,
            'tipo_cupon_id' => $request->tipo_cupon_id,
            'imagen' => $rutaImagen,
        ]);

        return redirect()->route('cupones.index')->with('success', 'Cupón registrado correctamente.');
    }
    public function show(Cupon $cupon)
    {
        $cupon->load('tipoCupon'); 
        return view('cupones.show', compact('cupon'));
    }
    public function edit(Cupon $cupon)
    {
        $tipos = TipoCupon::all();
        return view('cupones.edit', compact('cupon', 'tipos'));
    }

    public function update(Request $request, Cupon $cupon)
    {
        $request->validate([
            'codigo' => 'required|string|max:50|unique:cupon,codigo,' . $cupon->cupon_id . ',cupon_id',
            'fecha_inicio' => 'required|date',
            'fecha_expiracion' => 'required|date|after_or_equal:fecha_inicio',
            'stock' => 'required|integer|min:0',
            'estatus' => 'required|string|max:50',
            'tipo_cupon_id' => 'required|exists:tipo_cupon,tipo_cupon_id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($cupon->imagen) {
                Storage::disk('public')->delete($cupon->imagen);
            }
            $cupon->imagen = $request->file('imagen')->store('cupones', 'public');
        }

        $cupon->update([
            'codigo' => $request->codigo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_expiracion' => $request->fecha_expiracion,
            'stock' => $request->stock,
            'estatus' => $request->estatus,
            'tipo_cupon_id' => $request->tipo_cupon_id,
            'imagen' => $cupon->imagen,
        ]);

        return redirect()->route('cupones.index')->with('success', 'Cupón actualizado correctamente.');
    }

    public function destroy(Cupon $cupon)
    {
        if ($cupon->imagen) {
            Storage::disk('public')->delete($cupon->imagen);
        }
        $cupon->delete();
        return redirect()->route('cupones.index')->with('success', 'Cupón eliminado correctamente.');
    }
}
