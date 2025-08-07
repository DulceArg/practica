<div class="form-group">
    <label for="rol_id">Rol</label>
    <select name="rol_id" id="rol_id" {{ $modo === 'ver' ? 'disabled' : '' }}>
        @foreach($roles ?? [] as $rol)
            <option value="{{ $rol->rol_id }}" {{ (old('rol_id', $usuario->rol_id ?? '') == $rol->rol_id) ? 'selected' : '' }}>
                {{ $rol->nombre_rol }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="nombre_usuario">Nombre</label>
    <input type="text" name="nombre_usuario" id="nombre_usuario" value="{{ old('nombre_usuario', $usuario->nombre_usuario ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="apellido_paterno_usuario">Apellido Paterno</label>
    <input type="text" name="apellido_paterno_usuario" id="apellido_paterno_usuario" value="{{ old('apellido_paterno_usuario', $usuario->apellido_paterno_usuario ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="apellido_materno_usuario">Apellido Materno</label>
    <input type="text" name="apellido_materno_usuario" id="apellido_materno_usuario" value="{{ old('apellido_materno_usuario', $usuario->apellido_materno_usuario ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="correo_electronico">Correo Electrónico</label>
    <input type="email" name="correo_electronico" id="correo_electronico" value="{{ old('correo_electronico', $usuario->correo_electronico ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="telefono">Teléfono</label>
    <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $usuario->telefono ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" name="estado" id="estado" value="{{ old('estado', $usuario->estado ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="municipio">Municipio</label>
    <input type="text" name="municipio" id="municipio" value="{{ old('municipio', $usuario->municipio ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="colonia">Colonia</label>
    <input type="text" name="colonia" id="colonia" value="{{ old('colonia', $usuario->colonia ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="codigo_postal">Código Postal</label>
    <input type="text" name="codigo_postal" id="codigo_postal" value="{{ old('codigo_postal', $usuario->codigo_postal ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="calle">Calle</label>
    <input type="text" name="calle" id="calle" value="{{ old('calle', $usuario->calle ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="numero_exterior">Número Exterior</label>
    <input type="text" name="numero_exterior" id="numero_exterior" value="{{ old('numero_exterior', $usuario->numero_exterior ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>

<div class="form-group">
    <label for="numero_interior">Número Interior</label>
    <input type="text" name="numero_interior" id="numero_interior" value="{{ old('numero_interior', $usuario->numero_interior ?? '') }}" {{ $modo === 'ver' ? 'disabled' : '' }}>
</div>
