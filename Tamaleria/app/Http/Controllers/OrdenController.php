<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrdenController extends Controller
{
    public function index()
    {
        $ordenes = Orden::with('cupon')->get();
        return view('ordenes.index', compact('ordenes'));
    }

    public function buscar(Request $request)
    {
        $campo = $request->input('campo', 'descripcion');
        $query = $request->input('q', '');

        $camposValidos = ['descripcion', 'cupon', 'fecha'];
        if (!in_array($campo, $camposValidos)) {
            return response('Campo de búsqueda no válido.', 400);
        }

        if ($campo === 'cupon') {
            $ordenes = Orden::with('cupon')
                ->whereHas('cupon', function ($q) use ($query) {
                    $q->where('codigo', 'ILIKE', "%{$query}%");
                })
                ->get();
        } elseif ($campo === 'fecha') {
            $ordenes = Orden::with('cupon')
                ->where('fecha_orden', 'ILIKE', "%{$query}%")
                ->get();
        } else {
            $ordenes = Orden::with('cupon')
                ->where('descripcion', 'ILIKE', "%{$query}%")
                ->get();
        }

        return view('partials.ordenes-cards', compact('ordenes'));
    }

    public function create()
    {
        $cupones = Cupon::all();
        return view('ordenes.create', compact('cupones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_orden' => 'required|date',
            'total_orden' => 'required|numeric|min:0',
            'descripcion' => 'required|string|min:5|max:255',
            'cupon_id' => 'nullable|exists:cupon,cupon_id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $rutaImagen = $request->file('imagen')->store('ordenes', 'public');
        }

        Orden::create([
            'fecha_orden' => $request->fecha_orden,
            'total_orden' => $request->total_orden,
            'descripcion' => $request->descripcion,
            'cupon_id' => $request->cupon_id,
            'imagen' => $rutaImagen,
        ]);

        return redirect()->route('ordenes.index')->with('success', 'Orden registrada correctamente.');
    }

    public function show(Orden $orden)
    {
        $orden->load('cupon');
        return view('ordenes.show', compact('orden'));
    }

    public function edit(Orden $orden)
    {
        $cupones = Cupon::all();
        return view('ordenes.edit', compact('orden', 'cupones'));
    }

    public function update(Request $request, Orden $orden)
    {
        $request->validate([
            'fecha_orden' => 'required|date',
            'total_orden' => 'required|numeric|min:0',
            'descripcion' => 'required|string|min:5|max:255',
            'cupon_id' => 'nullable|exists:cupon,cupon_id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($orden->imagen) {
                Storage::disk('public')->delete($orden->imagen);
            }
            $orden->imagen = $request->file('imagen')->store('ordenes', 'public');
        }

        $orden->update([
            'fecha_orden' => $request->fecha_orden,
            'total_orden' => $request->total_orden,
            'descripcion' => $request->descripcion,
            'cupon_id' => $request->cupon_id,
            'imagen' => $orden->imagen,
        ]);

        return redirect()->route('ordenes.index')->with('success', 'Orden actualizada correctamente.');
    }

    public function destroy(Orden $orden)
    {
        if ($orden->imagen) {
            Storage::disk('public')->delete($orden->imagen);
        }
        $orden->delete();
        return redirect()->route('ordenes.index')->with('success', 'Orden eliminada correctamente.');
    }
}
