@extends('layouts.usuario')

@section('title', 'Editar Usuario')

@section('content')
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="{{ route('usuarios.index') }}">
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

            <form action="{{ route('usuarios.update', $usuario->usuario_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Paso 1 --}}
                <div class="form-one form-step active">
                    <h2>Editar información del usuario.</h2>
                    <p>Modifica los datos del usuario.</p>

                    <div>
                        <label for="rol">Rol</label>
                        <select id="rol" name="rol_id" required>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->rol_id }}" {{ old('rol_id', $usuario->rol_id) == $rol->rol_id ? 'selected' : '' }}>
                                    {{ $rol->nombre_rol }}
                                </option>
                            @endforeach
                        </select>
                    </div>

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
                        <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña">
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
                    <h2>Dirección del usuario</h2>
                    <p>Modifica los datos correspondientes a la dirección.</p>

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


