@extends('layouts.registro')

@section('title', 'Registro de Usuario')

@section('content')

<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="{{ url('/') }}">
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

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                {{-- Primer paso --}}
                <div class="form-one form-step active">
                    <h2>Información personal</h2>
                    <p>Ingresa tus datos para registrarte.</p>

                    {{-- SIN campo de rol --}}

                    <div>
                        <label>Nombre(s)</label>
                        <input id="nombre_usuario" name="nombre_usuario" type="text" placeholder="Tu nombre" required>
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
                        <input id="telefono" name="telefono" type="text" placeholder="Tu número" required>
                    </div>
                </div>

                {{-- Segundo paso --}}
                <div class="form-two form-step">
                    <h2>Dirección</h2>
                    <p>Completa tu dirección.</p>

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
                        <input id="numero_interior" name="numero_interior" type="number" placeholder="Número interior">
                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn-prev" disabled>Regresar</button>
                    <button type="button" class="btn-next">Siguiente</button>
                    <button type="submit" class="btn-submit">Registrarme</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
