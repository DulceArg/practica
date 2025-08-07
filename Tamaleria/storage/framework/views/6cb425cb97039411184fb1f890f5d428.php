<div class="form-group">
    <label for="rol_id">Rol</label>
    <select name="rol_id" id="rol_id" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
        <?php $__currentLoopData = $roles ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($rol->rol_id); ?>" <?php echo e((old('rol_id', $usuario->rol_id ?? '') == $rol->rol_id) ? 'selected' : ''); ?>>
                <?php echo e($rol->nombre_rol); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="form-group">
    <label for="nombre_usuario">Nombre</label>
    <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php echo e(old('nombre_usuario', $usuario->nombre_usuario ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="apellido_paterno_usuario">Apellido Paterno</label>
    <input type="text" name="apellido_paterno_usuario" id="apellido_paterno_usuario" value="<?php echo e(old('apellido_paterno_usuario', $usuario->apellido_paterno_usuario ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="apellido_materno_usuario">Apellido Materno</label>
    <input type="text" name="apellido_materno_usuario" id="apellido_materno_usuario" value="<?php echo e(old('apellido_materno_usuario', $usuario->apellido_materno_usuario ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="correo_electronico">Correo Electrónico</label>
    <input type="email" name="correo_electronico" id="correo_electronico" value="<?php echo e(old('correo_electronico', $usuario->correo_electronico ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="telefono">Teléfono</label>
    <input type="text" name="telefono" id="telefono" value="<?php echo e(old('telefono', $usuario->telefono ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" name="estado" id="estado" value="<?php echo e(old('estado', $usuario->estado ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="municipio">Municipio</label>
    <input type="text" name="municipio" id="municipio" value="<?php echo e(old('municipio', $usuario->municipio ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="colonia">Colonia</label>
    <input type="text" name="colonia" id="colonia" value="<?php echo e(old('colonia', $usuario->colonia ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="codigo_postal">Código Postal</label>
    <input type="text" name="codigo_postal" id="codigo_postal" value="<?php echo e(old('codigo_postal', $usuario->codigo_postal ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="calle">Calle</label>
    <input type="text" name="calle" id="calle" value="<?php echo e(old('calle', $usuario->calle ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="numero_exterior">Número Exterior</label>
    <input type="text" name="numero_exterior" id="numero_exterior" value="<?php echo e(old('numero_exterior', $usuario->numero_exterior ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>

<div class="form-group">
    <label for="numero_interior">Número Interior</label>
    <input type="text" name="numero_interior" id="numero_interior" value="<?php echo e(old('numero_interior', $usuario->numero_interior ?? '')); ?>" <?php echo e($modo === 'ver' ? 'disabled' : ''); ?>>
</div>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/partials/form.blade.php ENDPATH**/ ?>