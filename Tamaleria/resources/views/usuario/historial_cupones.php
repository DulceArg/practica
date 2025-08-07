@extends('layouts.cupones-layout')

@section('title', 'Página principal')

@section('content')

@include('partials.navbar')

@include('partials.modal-login')

<main class="main-c" style="padding: 2rem;">
    <h2 style="color: #ff6b6b; font-size: 2rem; margin-bottom: 2rem;">
        Historial de Cupones Canjeados
    </h2>

    <div class="historial-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
        @forelse($historial as $item)
            <div class="historial-card" style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 1rem; text-align: center;">
                
                {{-- Imagen del cupón --}}
                <img src="{{ asset('storage/' . $item->cupon->imagen) }}" alt="Cupón Imagen" style="width: 100%; height: 180px; object-fit: cover; border-radius: 6px; margin-bottom: 1rem;">

                {{-- Datos del cupón --}}
                <p style="margin: 0.3rem 0;">Cupón: <strong>{{ $item->cupon->codigo }}</strong></p>
                <p style="margin: 0.3rem 0;">Descuento: {{ $item->cupon->tipoCupon->porcentaje }}%</p>

                <p style="margin: 0.3rem 0; font-style: italic;">{{ $item->orden->descripcion }}</p>


                {{-- Totales --}}
                <p style="margin: 1rem 0 0; font-weight: bold;">Total original:</p>
                <p style="font-size: 1.2rem; font-weight: bold;">${{ number_format($item->orden->total_orden, 2) }}</p>

                @php
                    $descuento = $item->cupon->tipoCupon->porcentaje;
                    $total_descuento = $item->orden->total_orden - ($item->orden->total_orden * ($descuento / 100));
                @endphp

                <p style="margin-top: 0.5rem;">Con descuento:</p>
                <p style="font-size: 1.1rem; font-weight: bold;">${{ number_format($total_descuento, 2) }}</p>
            </div>
        @empty
            <p>No has canjeado ningún cupón aún.</p>
        @endforelse
    </div>
</main>



@include('partials.footer')

@endsection
