@extends('layouts.ordenes')

@section('title', 'Editar Orden')

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
                        <p>Edición<br><span>Modifica los datos</span></p>
                    </li>
                </ul>
            </div>

            <form action="{{ route('ordenes.update', $orden->orden_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-one form-step active">
                    <h2>Editar Orden</h2>
                    <p>Modifica los datos de la orden</p>

                    <div>
                        <label>Fecha de Orden</label>
                        <input type="date" name="fecha_orden" id="fecha_orden" value="{{ old('fecha_orden', $orden->fecha_orden) }}" required>
                    </div>

                    <div>
                        <label>Total de la Orden</label>
                        <input type="number" name="total_orden" id="total_orden" step="0.01" min="0" value="{{ old('total_orden', $orden->total_orden) }}" required>
                    </div>

                    <div>
                        <label>Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" maxlength="255" value="{{ old('descripcion', $orden->descripcion) }}" required>
                    </div>

                    <div>
                        <label>Cupón aplicado (opcional)</label>
                        <select name="cupon_id">
                            <option value="">Sin cupón</option>
                            @foreach ($cupones as $cupon)
                                <option value="{{ $cupon->cupon_id }}" {{ old('cupon_id', $orden->cupon_id) == $cupon->cupon_id ? 'selected' : '' }}>
                                    {{ $cupon->codigo }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Comprobante / Imagen de la orden</label>
                        <input id="imagen" name="imagen" type="file" accept=".png,.jpeg,.jpg">
                        <label for="imagen" class="file-upload-label">Subir nueva imagen (opcional)</label>
                        <div id="file-name" class="file-name">
                            {{ $orden->imagen ? basename($orden->imagen) : 'Nombre de la imagen' }}
                        </div>

                        @if ($orden->imagen)
                            <div style="margin-top: 10px;">
                                <img src="{{ asset('storage/' . $orden->imagen) }}" alt="Comprobante" width="150">
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

document.addEventListener('DOMContentLoaded', function () {
    function crearMensajeError(mensaje, idElemento) {
        const mensajeError = document.createElement('div');
        mensajeError.style.color = 'red';
        mensajeError.style.fontSize = '0.8em';
        mensajeError.style.display = 'none';
        mensajeError.textContent = mensaje;
        document.getElementById(idElemento).parentElement.appendChild(mensajeError);
        return mensajeError;
    }

    const errores = {
        fecha: crearMensajeError('Por favor, seleccione una fecha válida.', 'fecha_orden'),
        total: crearMensajeError('Ingrese un total válido (mayor a 0).', 'total_orden'),
        descripcion: crearMensajeError('La descripción debe tener al menos 5 caracteres.', 'descripcion'),
    };

    const campoFecha = document.getElementById('fecha_orden');
    const campoTotal = document.getElementById('total_orden');
    const campoDescripcion = document.getElementById('descripcion');

    function validarFormulario() {
        const fechaValida = campoFecha.value !== '';
        const totalValido = parseFloat(campoTotal.value) > 0;
        const descripcionValida = campoDescripcion.value.trim().length >= 5;

        errores.fecha.style.display = fechaValida ? 'none' : 'block';
        errores.total.style.display = totalValido ? 'none' : 'block';
        errores.descripcion.style.display = descripcionValida ? 'none' : 'block';

        const valido = fechaValida && totalValido && descripcionValida;

        btnSubmit.disabled = !valido;
        return valido;
    }

    const formSteps = document.querySelectorAll('.form-step');
    const btnPrev = document.querySelector('.btn-prev');
    const btnNext = document.querySelector('.btn-next');
    const btnSubmit = document.querySelector('.btn-submit');
    let currentStep = 0;

    function updateFormStep() {
        formSteps.forEach((step, index) => {
            step.classList.toggle('active', index === currentStep);
        });

        btnPrev.disabled = currentStep === 0;
        btnNext.style.display = currentStep === formSteps.length - 1 ? 'none' : 'inline-block';
        btnSubmit.style.display = currentStep === formSteps.length - 1 ? 'inline-block' : 'none';

        validarFormulario();
    }

    btnNext.addEventListener('click', function () {
        currentStep++;
        updateFormStep();
    });

    btnPrev.addEventListener('click', function () {
        currentStep--;
        updateFormStep();
    });

    btnSubmit.addEventListener('click', function (event) {
        if (!validarFormulario()) {
            event.preventDefault();
        }
    });

    const inputs = document.querySelectorAll('input, select');
    inputs.forEach(input => input.addEventListener('input', validarFormulario));

    updateFormStep();
});
</script>
@endsection
