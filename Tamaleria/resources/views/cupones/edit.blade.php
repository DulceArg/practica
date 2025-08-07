@extends('layouts.cupones')

@section('title', 'Editar Cupón')

@section('content')
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="{{ route('cupones.index') }}">
                        <span><i class="fa-solid fa-left-long"></i><br> CANCELAR</span>
                    </a>
                </div>
                <ul class="progress-steps">
                    <li class="step active">
                        <span>1</span>
                        <p>Edición<br><span>Modifica los datos</span></p>
                    </li>
                </ul>
            </div>

            <form action="{{ route('cupones.update', $cupon->cupon_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-one form-step active">
                    <h2>Editar Cupón</h2>
                    <p>Modifica los datos del cupón</p>

                    <div>
                        <label>Código del Cupón</label>
                        <input type="text" name="codigo" value="{{ old('codigo', $cupon->codigo) }}" required>
                    </div>

                    <div>
                        <label>Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" value="{{ old('fecha_inicio', $cupon->fecha_inicio) }}" required>
                    </div>

                    <div>
                        <label>Fecha de Expiración</label>
                        <input type="date" name="fecha_expiracion" value="{{ old('fecha_expiracion', $cupon->fecha_expiracion) }}" required>
                    </div>

                    <div>
                        <label>Stock Disponible</label>
                        <input type="number" name="stock" min="0" value="{{ old('stock', $cupon->stock) }}" required>
                    </div>

                    <div>
                        <label>Estatus</label>
                        <select name="estatus" required>
                            <option value="">Selecciona un estatus</option>
                            <option value="activo" {{ old('estatus', $cupon->estatus) === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estatus', $cupon->estatus) === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            <option value="expirado" {{ old('estatus', $cupon->estatus) === 'expirado' ? 'selected' : '' }}>Expirado</option>
                        </select>
                    </div>

                    <div>
                        <label>Tipo de Cupón</label>
                        <select name="tipo_cupon_id" required>
                            <option value="">Seleccionar tipo</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->tipo_cupon_id }}"
                                    {{ old('tipo_cupon_id', $cupon->tipo_cupon_id) == $tipo->tipo_cupon_id ? 'selected' : '' }}>
                                    {{ $tipo->descripcion }} ({{ $tipo->porcentaje }}%)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Imagen del Cupón</label>
                        <input id="imagen" name="imagen" type="file" accept=".png,.jpeg,.jpg">
                        <label for="imagen" class="file-upload-label">Subir imagen</label>
                        <div id="file-name" class="file-name">
                            {{ $cupon->imagen ? basename($cupon->imagen) : 'Nombre de la imagen' }}
                        </div>

                        @if ($cupon->imagen)
                            <div style="margin-top: 10px;">
                                <img src="{{ asset('storage/' . $cupon->imagen) }}" alt="Imagen actual" width="120">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn-prev" disabled>Regresar</button>
                    <button type="button" class="btn-next">Siguiente</button>
                    <button type="submit" class="btn-submit">Actualizar</button>
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
