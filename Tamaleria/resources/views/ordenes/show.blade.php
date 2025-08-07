@extends('layouts.ordenes')

@section('title', 'Ver Orden')

@section('content')
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="{{ route('ordenes.index') }}">
                        <span><i class="fa-solid fa-left-long"></i><br> REGRESAR</span>
                    </a>
                </div>
                <ul class="progress-steps">
                    <li class="step active">
                        <span>1</span>
                        <p>Visualización<br><span>Datos de la orden</span></p>
                    </li>
                </ul>
            </div>

            <form>
                <div class="form-one form-step active">
                    <h2>Detalle de la Orden</h2>
                    <p>Consulta los datos de la orden</p>

                    <div>
                        <label>Fecha de Orden</label>
                        <input type="date" value="{{ $orden->fecha_orden }}" readonly>
                    </div>

                    <div>
                        <label>Total de la Orden</label>
                        <input type="number" value="{{ $orden->total_orden }}" readonly>
                    </div>

                    <div>
                        <label>Descripción</label>
                        <input type="text" value="{{ $orden->descripcion }}" readonly>
                    </div>

                    <div>
                        <label>Cupón Aplicado</label>
                        <select disabled>
                            <option>{{ $orden->cupon?->codigo ?? 'Sin cupón' }}</option>
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Comprobante / Imagen</label>
                        <div class="file-name">{{ $orden->imagen ? basename($orden->imagen) : 'Sin imagen' }}</div>

                        @if ($orden->imagen)
                            <div style="margin-top: 10px;">
                                <img src="{{ asset('storage/' . $orden->imagen) }}" alt="Comprobante de la orden" width="120">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="btn-group">
                    <a href="{{ route('ordenes.index') }}" class="btn-submit">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
