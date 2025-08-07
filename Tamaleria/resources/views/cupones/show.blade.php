@extends('layouts.cupones')

@section('title', 'Ver Cupón')

@section('content')
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="{{ route('cupones.index') }}">
                        <span><i class="fa-solid fa-left-long"></i><br> REGRESAR</span>
                    </a>
                </div>
                <ul class="progress-steps">
                    <li class="step active">
                        <span>1</span>
                        <p>Visualización<br><span>Datos del cupón</span></p>
                    </li>
                </ul>
            </div>

            <form>
                <div class="form-one form-step active">
                    <h2>Detalle del Cupón</h2>
                    <p>Consulta los datos del cupón</p>

                    <div>
                        <label>Código del Cupón</label>
                        <input type="text" value="{{ $cupon->codigo }}" readonly>
                    </div>

                    <div>
                        <label>Fecha de Inicio</label>
                        <input type="date" value="{{ $cupon->fecha_inicio }}" readonly>
                    </div>

                    <div>
                        <label>Fecha de Expiración</label>
                        <input type="date" value="{{ $cupon->fecha_expiracion }}" readonly>
                    </div>

                    <div>
                        <label>Stock Disponible</label>
                        <input type="number" value="{{ $cupon->stock }}" readonly>
                    </div>

                    <div>
                        <label>Estatus</label>
                        <select disabled>
                            <option value="activo" {{ $cupon->estatus === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $cupon->estatus === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            <option value="expirado" {{ $cupon->estatus === 'expirado' ? 'selected' : '' }}>Expirado</option>
                        </select>
                    </div>

                    <div>
                        <label>Tipo de Cupón</label>
                        <select disabled>
                            <option>{{ $cupon->tipoCupon->descripcion ?? 'Sin tipo' }} ({{ $cupon->tipoCupon->porcentaje ?? 0 }}%)</option>
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Imagen del Cupón</label>
                        <div class="file-name">{{ $cupon->imagen ? basename($cupon->imagen) : 'Sin imagen' }}</div>

                        @if ($cupon->imagen)
                            <div style="margin-top: 10px;">
                                <img src="{{ asset('storage/' . $cupon->imagen) }}" alt="Imagen del cupón" width="120">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="btn-group">
                    <a href="{{ route('cupones.index') }}" class="btn-submit">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
