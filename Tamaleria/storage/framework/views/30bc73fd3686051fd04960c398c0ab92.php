<?php $__env->startSection('title', 'Editar Cupón'); ?>

<?php $__env->startSection('content'); ?>
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="<?php echo e(route('cupones.index')); ?>">
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

            <form action="<?php echo e(route('cupones.update', $cupon->cupon_id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="form-one form-step active">
                    <h2>Editar Cupón</h2>
                    <p>Modifica los datos del cupón</p>

                    <div>
                        <label>Código del Cupón</label>
                        <input type="text" name="codigo" value="<?php echo e(old('codigo', $cupon->codigo)); ?>" required>
                    </div>

                    <div>
                        <label>Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" value="<?php echo e(old('fecha_inicio', $cupon->fecha_inicio)); ?>" required>
                    </div>

                    <div>
                        <label>Fecha de Expiración</label>
                        <input type="date" name="fecha_expiracion" value="<?php echo e(old('fecha_expiracion', $cupon->fecha_expiracion)); ?>" required>
                    </div>

                    <div>
                        <label>Stock Disponible</label>
                        <input type="number" name="stock" min="0" value="<?php echo e(old('stock', $cupon->stock)); ?>" required>
                    </div>

                    <div>
                        <label>Estatus</label>
                        <select name="estatus" required>
                            <option value="">Selecciona un estatus</option>
                            <option value="activo" <?php echo e(old('estatus', $cupon->estatus) === 'activo' ? 'selected' : ''); ?>>Activo</option>
                            <option value="inactivo" <?php echo e(old('estatus', $cupon->estatus) === 'inactivo' ? 'selected' : ''); ?>>Inactivo</option>
                            <option value="expirado" <?php echo e(old('estatus', $cupon->estatus) === 'expirado' ? 'selected' : ''); ?>>Expirado</option>
                        </select>
                    </div>

                    <div>
                        <label>Tipo de Cupón</label>
                        <select name="tipo_cupon_id" required>
                            <option value="">Seleccionar tipo</option>
                            <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tipo->tipo_cupon_id); ?>"
                                    <?php echo e(old('tipo_cupon_id', $cupon->tipo_cupon_id) == $tipo->tipo_cupon_id ? 'selected' : ''); ?>>
                                    <?php echo e($tipo->descripcion); ?> (<?php echo e($tipo->porcentaje); ?>%)
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Imagen del Cupón</label>
                        <input id="imagen" name="imagen" type="file" accept=".png,.jpeg,.jpg">
                        <label for="imagen" class="file-upload-label">Subir imagen</label>
                        <div id="file-name" class="file-name">
                            <?php echo e($cupon->imagen ? basename($cupon->imagen) : 'Nombre de la imagen'); ?>

                        </div>

                        <?php if($cupon->imagen): ?>
                            <div style="margin-top: 10px;">
                                <img src="<?php echo e(asset('storage/' . $cupon->imagen)); ?>" alt="Imagen actual" width="120">
                            </div>
                        <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cupones', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/cupones/edit.blade.php ENDPATH**/ ?>