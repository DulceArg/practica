@extends('layouts.ordenes')

@section('title', 'Agregar Orden')

@section('content')
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="{{ route('ordenes.index') }}">
                        <span><i class="fa-solid fa-left-long"></i><br> CANCELAR</span>
                    </a>
                </div>
                <ul class="progress-steps">
                    <li class="step active">
                        <span>1</span>
                        <p>Información<br><span>Completa el formulario</span></p>
                    </li>
                </ul>
            </div>

            <form action="{{ route('ordenes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-one form-step active">
                    <h2>Registro de Orden</h2>
                    <p>Llena los datos de la nueva orden</p>

                    <div>
                        <label>Fecha de Orden</label>
                        <input type="date" name="fecha_orden" id="fecha_orden" required>
                    </div>

                    <div>
                        <label>Total de la Orden</label>
                        <input type="number" name="total_orden" id="total_orden" step="0.01" min="0" required>
                    </div>

                    <div>
                        <label>Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" maxlength="255" required>
                    </div>

                    <div>
                        <label>Cupón aplicado (opcional)</label>
                        <select name="cupon_id" id="cupon_id">
                            <option value="">Sin cupón</option>
                            @foreach ($cupones as $cupon)
                                <option value="{{ $cupon->cupon_id }}">{{ $cupon->codigo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Comprobante / Imagen de la orden</label>
                        <input id="imagen" name="imagen" type="file" accept=".png,.jpeg,.jpg">
                        <label for="imagen" class="file-upload-label">Subir imagen</label>
                        <div id="file-name" class="file-name">Nombre de la imagen</div>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn-prev" disabled>Regresar</button>
                    <button type="button" class="btn-next">Siguiente</button>
                    <button type="submit" class="btn-submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('imagen').addEventListener('change', function(event) {
    var fileName = event.target.files[0]?.name || 'Nombre de la imagen';
    document.getElementById('file-name').textContent = fileName;
});
</script>
@endsection
