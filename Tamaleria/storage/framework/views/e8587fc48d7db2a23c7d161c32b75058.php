<?php $__env->startSection('title', 'Agregar Orden'); ?>

<?php $__env->startSection('content'); ?>
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="<?php echo e(route('ordenes.index')); ?>">
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

            <form action="<?php echo e(route('ordenes.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-one form-step active">
                    <h2>Registro de Orden</h2>
                    <p>Llena los datos de la nueva orden</p>

                    <div>
                        <label>Fecha de Orden</label>
                        <input type="date" name="fecha_orden" id="fecha_orden" required>
                    </div>

                    <div>
                        <label>Total de la Orden</label>
                        <input type="number" name="total_orden" id="total_orden" step="0.01" min="0" required>
                    </div>

                    <div>
                        <label>Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" maxlength="255" required>
                    </div>

                    <div>
                        <label>Cupón aplicado (opcional)</label>
                        <select name="cupon_id" id="cupon_id">
                            <option value="">Sin cupón</option>
                            <?php $__currentLoopData = $cupones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cupon->cupon_id); ?>"><?php echo e($cupon->codigo); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Comprobante / Imagen de la orden</label>
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

<?php echo $__env->make('layouts.ordenes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/ordenes/create.blade.php ENDPATH**/ ?>