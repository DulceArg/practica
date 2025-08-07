<?php if($ordenes->count() > 0): ?>
    <ul class="product-list-c">
        <?php $__currentLoopData = $ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="product-item-c">
                <div class="product-card-c" tabindex="0">
                    <figure class="card-banner-c">
                        <img src="<?php echo e(asset('storage/' . $orden->imagen)); ?>" width="312" height="350" class="image-contain-c">

                        <ul class="card-action-list-c">
                            <li class="card-action-item-c">
                                <a href="<?php echo e(route('ordenes.edit', $orden)); ?>">
                                    <button class="card-action-btn-c" aria-labelledby="edit">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip-c" id="edit">Editar</div>
                                </a>
                            </li>
                            <li class="card-action-item-c">
                                <form action="<?php echo e(route('ordenes.destroy', $orden)); ?>" method="POST" onsubmit="return confirm('¿Deseas eliminar esta orden?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="card-action-btn-c" aria-labelledby="delete">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip-c" id="delete">Eliminar</div>
                                </form>
                            </li>
                            <li class="card-action-item-c">
                                <a href="<?php echo e(route('ordenes.show', $orden)); ?>">
                                    <button class="card-action-btn-c" aria-labelledby="view">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip-c" id="view">Ver más</div>
                                </a>
                            </li>
                        </ul>
                    </figure>

                    <div class="card-content-c">
                        <div class="card-cat-c">
                            <a href="#" class="card-cat-link-c"><?php echo e($orden->fecha_orden); ?></a>
                        </div>
                        <h3 class="h3-c card-title-c">
                            <a href="#"><?php echo e($orden->descripcion); ?></a>
                        </h3>
                        <data class="card-price-c">$<?php echo e(number_format($orden->total_orden, 2)); ?></data>
                    </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <p>No hay órdenes registradas.</p>
<?php endif; ?>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/partials/ordenes-cards.blade.php ENDPATH**/ ?>