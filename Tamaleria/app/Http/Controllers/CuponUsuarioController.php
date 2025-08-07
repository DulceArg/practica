<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cupon;
use App\Models\ContadorCupon;

class CuponUsuarioController extends Controller
{
    // Mostrar cupones para usuarios no logueados
    public function index()
    {
        $cupones = Cupon::with(['tipoCupon', 'ordenes'])->get();
        return view('usuario.cupones', compact('cupones'));
    }

    // Mostrar cupones para usuarios con sesión activa
    public function cuponesConSesion()
    {
        if (!session()->has('usuario_id')) {
            return redirect('/');
        }

        $cupones = Cupon::with(['tipoCupon', 'ordenes'])->get();
        return view('usuario.cupones-sesion', compact('cupones'));
    }

    // ✅ Canjear cupón
    public function canjearCupon(Request $request)
    {
        $usuario_id = session('usuario_id');
        $cupon_id = $request->cupon_id;
        $tipo_cupon_id = $request->tipo_cupon_id;
        $orden_total = $request->total_orden;

        $cupon = Cupon::with('tipoCupon')->findOrFail($cupon_id);

        if ($cupon->stock <= 0) {
            return back()->with('error', 'El cupón ya no está disponible.');
        }

        DB::beginTransaction();

        try {
            // Registrar en contador_cupones
            ContadorCupon::create([
                'usuario_id' => $usuario_id,
                'tipo_cupon_id' => $tipo_cupon_id,
                'cupon_id' => $cupon_id,
                'total_cupones' => 1,
                'fecha_actualizacion' => now(),
            ]);

            // Reducir el stock
            $cupon->decrement('stock');

            DB::commit();

            // Calcular el precio con descuento
            $descuento = $cupon->tipoCupon->porcentaje;
            $precio_con_descuento = $orden_total - ($orden_total * ($descuento / 100));

            return back()->with([
                'success' => 'Cupón aplicado correctamente.',
                'nuevo_total' => number_format($precio_con_descuento, 2)
            ]);

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Ocurrió un error al canjear el cupón. Intenta más tarde.');
        }
    }
}
