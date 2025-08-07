<main class="main-c">
    <article class="article-c">
        <?php $__currentLoopData = $cupones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="section-c special-c">
                <div class="container-c">
                    <div class="special-banner-c" style="background-image: url('<?php echo e(asset('storage/' . $cupon->imagen)); ?>');">
                        <h2 class="h3-c banner-title-c">
                            <?php echo e($cupon->codigo); ?><br>
                            <small style="font-size: 0.8em;"><?php echo e($cupon->stock); ?> disponibles</small>
                        </h2>
                    </div>

                    <div class="special-product-c">
                        <h2 class="h2-c section-title-c">
                            <span class="text-c"><?php echo e($cupon->tipoCupon->descripcion); ?></span>
                            <span class="line-c"></span>
                        </h2>
                        <ul class="has-scrollbar-c product-list-c">
                            <?php $__empty_1 = true; $__currentLoopData = $cupon->ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="product-item-c">
                                    <div class="product-card-c" tabindex="0">
                                        <figure class="card-banner-c">
                                            <img src="<?php echo e(asset('storage/' . $orden->imagen)); ?>" width="312" height="350" class="image-contain-c">

                                            <ul class="card-action-list-c">
                                                <li class="card-action-item-c">
                                                    
                                                    <form action="<?php echo e(route('cupon.canjear')); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="cupon_id" value="<?php echo e($cupon->cupon_id); ?>">
                                                        <input type="hidden" name="tipo_cupon_id" value="<?php echo e($cupon->tipo_cupon_id); ?>">
                                                        <input type="hidden" name="total_orden" value="<?php echo e($orden->total_orden); ?>">

                                                        <button type="submit" class="card-action-btn-c">
                                                            <ion-icon name="checkmark-done-outline"></ion-icon>
                                                        </button>
                                                        <div class="card-action-tooltip-c">Canjear ahora</div>
                                                    </form>
                                                </li>
                                            </ul>
                                        </figure>

                                        <div class="card-content-c">
                                            <p class="card-cat-c">Este pedido aplica para canje del cupón.</p>
                                            <h3 class="h3-c card-title-c">
                                                <a href="#">Total: $<?php echo e(number_format($orden->total_orden, 2)); ?></a>
                                                <?php if(session('nuevo_total')): ?>
                                                    <br><small>Con cupón: $<?php echo e(session('nuevo_total')); ?></small>
                                                <?php endif; ?>
                                            </h3>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p>No hay órdenes asociadas a este cupón.</p>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </article>
</main>

<?php if(session('success')): ?>
    <div class="alert alert-success" style="text-align:center; margin-top: 1rem;">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger" style="text-align:center; margin-top: 1rem;">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/partials/cupones-sesion.blade.php ENDPATH**/ ?>