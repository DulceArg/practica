<?php $__env->startSection('title', 'Ver Orden'); ?>

<?php $__env->startSection('content'); ?>
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="<?php echo e(route('ordenes.index')); ?>">
                        <span><i class="fa-solid fa-left-long"></i><br> REGRESAR</span>
                    </a>
                </div>
                <ul class="progress-steps">
                    <li class="step active">
                        <span>1</span>
                        <p>Visualización<br><span>Datos de la orden</span></p>
                    </li>
                </ul>
            </div>

            <form>
                <div class="form-one form-step active">
                    <h2>Detalle de la Orden</h2>
                    <p>Consulta los datos de la orden</p>

                    <div>
                        <label>Fecha de Orden</label>
                        <input type="date" value="<?php echo e($orden->fecha_orden); ?>" readonly>
                    </div>

                    <div>
                        <label>Total de la Orden</label>
                        <input type="number" value="<?php echo e($orden->total_orden); ?>" readonly>
                    </div>

                    <div>
                        <label>Descripción</label>
                        <input type="text" value="<?php echo e($orden->descripcion); ?>" readonly>
                    </div>

                    <div>
                        <label>Cupón Aplicado</label>
                        <select disabled>
                            <option><?php echo e($orden->cupon?->codigo ?? 'Sin cupón'); ?></option>
                        </select>
                    </div>

                    <div class="file-upload">
                        <label>Comprobante / Imagen</label>
                        <div class="file-name"><?php echo e($orden->imagen ? basename($orden->imagen) : 'Sin imagen'); ?></div>

                        <?php if($orden->imagen): ?>
                            <div style="margin-top: 10px;">
                                <img src="<?php echo e(asset('storage/' . $orden->imagen)); ?>" alt="Comprobante de la orden" width="120">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="btn-group">
                    <a href="<?php echo e(route('ordenes.index')); ?>" class="btn-submit">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.ordenes', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/ordenes/show.blade.php ENDPATH**/ ?>