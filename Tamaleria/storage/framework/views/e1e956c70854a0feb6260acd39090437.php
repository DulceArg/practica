<?php $__env->startSection('title', 'Ver Cupón'); ?>

<?php $__env->startSection('content'); ?>
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="<?php echo e(route('cupones.index')); ?>">
                        <span><i class="fa-solid fa-left-long"></i><br> REGRESAR</span>
                    </a>
                </div>
                <ul class="progress-steps">
                    <li class="step active">
                        <span>1</span>
                        <p>Visualización<br><span>Datos del cupón</span></p>
                    </li>
                </ul>
            </div>

            <form>
                <div class="form-one form-step active">
                    <h2>Detalle del Cupón</h2>
                    <p>Consulta los datos del cupón</p>

                    <div>
                        <label>Código del Cupón</label>
                        <input type="text" value="<?php echo e($cupon->codigo); ?>" readonly>
                    </div>

                    <div>
                        <label>Fecha de Inicio</label>
                        <input type="date" value="<?php echo e($cupon->fecha_inicio); ?>" readonly>
                    </div>

                    <div>
                        <label>Fecha de Expiración</label>
                        <input type="date" value="<?php echo e($cupon->fecha_expiracion); ?>" readonly>
                    </div>

                    <div>
                        <label>Stock Disponible</label>
                        <input type="number" value="<?php echo e($cupon->stock); ?>" readonly>
                    </div>

                    <div>
                        <label>Estatus</label>
                        <select disabled>
                            <option value="activo" <?php echo e($cupon->estatus === 'activo' ? 'selected' : ''); ?>>Activo</option>
                            <option value="inactivo" <?php echo e($cupon->estatus === 'inactivo' ? 'selected' : ''); ?>>Inactivo</option>
                            <option value="expirado" <?php echo e($cupon->estatus === 'expirado' ? 'selected' : ''); ?>>Expirado</option>
                        </select>
                    </div>

                    <div>
                        <label>Tipo de Cupón</label>
                        <select disabled>
                            <option><?php echo e($cupon->tipoCupon->descripcion ?? 'Sin tipo'); ?> (<?php echo e($cupon->tipoCupon->porcentaje ?? 0); ?>%)</option>
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Imagen del Cupón</label>
                        <div class="file-name"><?php echo e($cupon->imagen ? basename($cupon->imagen) : 'Sin imagen'); ?></div>

                        <?php if($cupon->imagen): ?>
                            <div style="margin-top: 10px;">
                                <img src="<?php echo e(asset('storage/' . $cupon->imagen)); ?>" alt="Imagen del cupón" width="120">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="btn-group">
                    <a href="<?php echo e(route('cupones.index')); ?>" class="btn-submit">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cupones', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/cupones/show.blade.php ENDPATH**/ ?>