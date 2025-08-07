<?php if($usuarios->count() > 0): ?>
    <ul class="product-list-c">
        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="product-item-c">
                <div class="product-card-c" tabindex="0">
                    <figure class="card-banner-c">
                        <img src="<?php echo e(asset('media/Imagenes/persona.png')); ?>" width="312" height="350" class="image-contain-c">

                        <ul class="card-action-list-c">
                            <li class="card-action-item-c">
                                <a href="<?php echo e(route('usuarios.edit', $usuario)); ?>">
                                    <button class="card-action-btn-c" aria-labelledby="edit">
                                        <ion-icon name="create-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip-c" id="edit">Editar</div>
                                </a>
                            </li>
                            <li class="card-action-item-c">
                                <form action="<?php echo e(route('usuarios.destroy', $usuario)); ?>" method="POST" onsubmit="return confirm('¿Deseas eliminar este usuario?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="card-action-btn-c" aria-labelledby="delete">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip-c" id="delete">Eliminar</div>
                                </form>
                            </li>
                            <li class="card-action-item-c">
                                <a href="<?php echo e(route('usuarios.show', $usuario)); ?>">
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
                            <a href="#" class="card-cat-link-c"><?php echo e($usuario->telefono); ?></a>
                        </div>
                        <h3 class="h3-c card-title-c">
                            <a href="#"><?php echo e($usuario->nombre_usuario); ?> <?php echo e($usuario->apellido_paterno_usuario); ?> <?php echo e($usuario->apellido_materno_usuario); ?></a>
                        </h3>
                        <data value="100" class="card-price-c"><?php echo e($usuario->correo_electronico); ?></data>
                    </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php else: ?>
    <p>No hay usuarios registrados.</p>
<?php endif; ?>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/partials/cards.blade.php ENDPATH**/ ?>