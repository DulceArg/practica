@extends('layouts.editar')

@section('title', 'Editar Perfil')

@section('content')
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="{{ url('/cupones-sesion') }}">
                        <span><i class="fa-solid fa-left-long"></i><br> CANCELAR</span>
                    </a>
                </div>
                <ul class="progress-steps">
                    <li class="step active">
                        <span>1</span>
                        <p>Información<br><span>Completa las 7 secciones</span></p>
                    </li>
                    <li class="step">
                        <span>2</span>
                        <p>Contacto<br><span>Completa las 7 secciones</span></p>
                    </li>
                </ul>
            </div>

            <form action="{{ route('usuario.perfil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Paso 1 --}}
                <div class="form-one form-step active">
                    <h2>Editar perfil</h2>
                    <p>Modifica tus datos personales.</p>

                    <div>
                        <label>Nombre(s)</label>
                        <input id="nombre_usuario" name="nombre_usuario" type="text" value="{{ old('nombre_usuario', $usuario->nombre_usuario) }}" required>
                    </div>

                    <div>
                        <label>Apellido Paterno</label>
                        <input id="apellido_paterno_usuario" name="apellido_paterno_usuario" type="text" value="{{ old('apellido_paterno_usuario', $usuario->apellido_paterno_usuario) }}" required>
                    </div>

                    <div>
                        <label>Apellido Materno</label>
                        <input id="apellido_materno_usuario" name="apellido_materno_usuario" type="text" value="{{ old('apellido_materno_usuario', $usuario->apellido_materno_usuario) }}" required>
                    </div>

                    <div>
                        <label>Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" placeholder="Deja en blanco si no deseas cambiarla">
                    </div>

                    <div>
                        <label>Correo Electrónico</label>
                        <input id="correo_electronico" name="correo_electronico" type="email" value="{{ old('correo_electronico', $usuario->correo_electronico) }}" required>
                    </div>

                    <div>
                        <label>Teléfono</label>
                        <input id="telefono" name="telefono" type="text" value="{{ old('telefono', $usuario->telefono) }}" required>
                    </div>
                </div>

                {{-- Paso 2 --}}
                <div class="form-two form-step">
                    <h2>Dirección</h2>
                    <p>Modifica tu dirección personal.</p>

                    <div>
                        <label>Estado</label>
                        <select id="estado" name="estado" data-estado="{{ old('estado', $usuario->estado) }}"></select>
                    </div>

                    <div>
                        <label>Alcaldía / Municipio</label>
                        <select id="municipio" name="municipio" data-municipio="{{ old('municipio', $usuario->municipio) }}" disabled></select>
                    </div>

                    <div>
                        <label>Colonia</label>
                        <select id="colonia" name="colonia" data-colonia="{{ old('colonia', $usuario->colonia) }}" disabled></select>
                    </div>

                    <div>
                        <label>Código Postal</label>
                        <select id="codigo_postal" name="codigo_postal" data-cp="{{ old('codigo_postal', $usuario->codigo_postal) }}" disabled></select>
                    </div>

                    <div>
                        <label>Calle</label>
                        <input id="calle" name="calle" type="text" value="{{ old('calle', $usuario->calle) }}">
                    </div>

                    <div>
                        <label>Número Exterior</label>
                        <input id="numero_exterior" name="numero_exterior" type="number" value="{{ old('numero_exterior', $usuario->numero_exterior) }}">
                    </div>

                    <div>
                        <label>Número Interior</label>
                        <p style="margin-bottom: 5px; font-size: 15px;">Si no tienes número interior, por favor ingresa el mismo que el exterior.</p>
                        <input id="numero_interior" name="numero_interior" type="number" value="{{ old('numero_interior', $usuario->numero_interior) }}">
                    </div>
                </div>

                {{-- Botones --}}
                <div class="btn-group">
                    <button type="button" class="btn-prev" disabled>Regresar</button>
                    <button type="button" class="btn-next">Siguiente</button>
                    <button type="submit" class="btn-submit">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/validacion-usuario.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const estadoSelect = document.getElementById('estado');
    const municipioSelect = document.getElementById('municipio');
    const coloniaSelect = document.getElementById('colonia');
    const cpSelect = document.getElementById('codigo_postal');

    const estadoGuardado = estadoSelect.getAttribute('data-estado');
    const municipioGuardado = municipioSelect.getAttribute('data-municipio');
    const coloniaGuardada = coloniaSelect.getAttribute('data-colonia');
    const cpGuardado = cpSelect.getAttribute('data-cp');

    const estados = ['Estado de México', 'CDMX'];
    estados.forEach(e => {
        const opt = document.createElement('option');
        opt.value = e;
        opt.text = e;
        estadoSelect.appendChild(opt);
    });
    estadoSelect.value = estadoGuardado;

    // Aquí deberías cargar municipios, colonias y CPs si usas AJAX o listas precargadas
});
</script>
@endsection
