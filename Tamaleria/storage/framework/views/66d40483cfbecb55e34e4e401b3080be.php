<?php $__env->startSection('title', 'Agregar Cupón'); ?>

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
                        <p>Información<br><span>Completa el formulario</span></p>
                    </li>
                </ul>
            </div>

            <form action="<?php echo e(route('cupones.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-one form-step active">
                    <h2>Registro de Cupón</h2>
                    <p>Llena los datos del nuevo cupón</p>

                    <div>
                        <label>Código del Cupón</label>
                        <input type="text" name="codigo" required>
                    </div>

                    <div>
                        <label>Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" required>
                    </div>

                    <div>
                        <label>Fecha de Expiración</label>
                        <input type="date" name="fecha_expiracion" required>
                    </div>

                    <div>
                        <label>Stock Disponible</label>
                        <input type="number" name="stock" min="0" required>
                    </div>

                    <div>
                        <label>Estatus</label>
                        <select name="estatus" required>
                            <option value="">Selecciona un estatus</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="expirado">Expirado</option>
                        </select>
                    </div>

                    <div>
                        <label>Tipo de Cupón</label>
                        <select name="tipo_cupon_id" required>
                            <option value="">Seleccionar tipo</option>
                            <?php $__currentLoopData = $tipos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tipo->tipo_cupon_id); ?>"><?php echo e($tipo->descripcion); ?> (<?php echo e($tipo->porcentaje); ?>%)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Imagen del Cupón</label>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cupones', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/cupones/create.blade.php ENDPATH**/ ?>