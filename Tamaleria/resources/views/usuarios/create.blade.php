@extends('layouts.usuario')

@section('title', 'Agregar usuario')

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

            <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Primer paso --}}
                <div class="form-one form-step active">
                    <h2>Información personal del usuario.</h2>
                    <p>Ingresa los datos del nuevo usuario.</p>

                    <div>
                        <label for="rol">Rol</label>
                        <select id="rol" name="rol_id" required>
                            <option value="">Seleccionar rol</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->rol_id }}">{{ $rol->nombre_rol }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Nombre(s)</label>
                        <input id="nombre_usuario" name="nombre_usuario" type="text" placeholder="Nombre(s) del usuario" required>
                    </div>

                    <div>
                        <label>Apellido Paterno</label>
                        <input id="apellido_paterno_usuario" name="apellido_paterno_usuario" type="text" placeholder="Apellido paterno" required>
                    </div>

                    <div>
                        <label>Apellido Materno</label>
                        <input id="apellido_materno_usuario" name="apellido_materno_usuario" type="text" placeholder="Apellido materno" required>
                    </div>

                    <div>
                        <label>Contraseña</label>
                        <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                    </div>

                    <div>
                        <label>Correo Electrónico</label>
                        <input id="correo_electronico" name="correo_electronico" type="email" placeholder="Correo" required>
                    </div>

                    <div>
                        <label>Teléfono</label>
                        <input id="telefono" name="telefono" type="text" placeholder="Número de teléfono" required>
                    </div>
                </div>

                {{-- Segundo paso --}}
                <div class="form-two form-step">
                    <h2>Dirección del usuario</h2>
                    <p>Ingresa los datos correspondientes con la dirección del usuario.</p>

                    <div>
                        <label>Estado</label>
                        <select id="estado" name="estado"></select>
                    </div>

                    <div>
                        <label>Alcaldía / Municipio</label>
                        <select id="municipio" name="municipio" disabled></select>
                    </div>

                    <div>
                        <label>Colonia</label>
                        <select id="colonia" name="colonia" disabled></select>
                    </div>

                    <div>
                        <label>Código Postal</label>
                        <select id="codigo_postal" name="codigo_postal" disabled></select>
                    </div>

                    <div>
                        <label>Calle</label>
                        <input id="calle" name="calle" type="text" placeholder="Nombre de la calle">
                    </div>

                    <div>
                        <label>Número Exterior</label>
                        <input id="numero_exterior" name="numero_exterior" type="number" placeholder="Número exterior">
                    </div>

                    <div>
                        <label>Número Interior</label>
                        <p style="margin-bottom: 5px; font-size: 15px;">Si no tienes número interior, por favor ingresa el mismo que el exterior.</p>
                        <input id="numero_interior" name="numero_interior" type="number" placeholder="Número interior">
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



@endsection
