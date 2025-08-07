<?php $__env->startSection('title', 'Ver Usuario'); ?>

<?php $__env->startSection('content'); ?>
<div id="page" class="site">
    <div class="ccontainer">
        <div class="form-box">
            <div class="progress">
                <div class="logo-form">
                    <a href="<?php echo e(route('usuarios.index')); ?>">
                        <span><i class="fa-solid fa-left-long"></i><br> REGRESAR</span>
                    </a>
                </div>
                <ul class="progress-steps">
                    <li class="step active">
                        <span>1</span>
                        <p>Información<br><span>Visualización</span></p>
                    </li>
                    <li class="step">
                        <span>2</span>
                        <p>Contacto<br><span>Visualización</span></p>
                    </li>
                </ul>
            </div>

            <form>
                
                <div class="form-one form-step active">
                    <h2>Datos personales del usuario</h2>
                    <p>Consulta la información general del usuario.</p>

                    <div>
                        <label for="rol">Rol</label>
                        <input type="text" id="rol" value="<?php echo e($usuario->rol->nombre_rol ?? 'N/A'); ?>" disabled>
                    </div>

                    <div>
                        <label>Nombre(s)</label>
                        <input type="text" value="<?php echo e($usuario->nombre_usuario); ?>" disabled>
                    </div>

                    <div>
                        <label>Apellido Paterno</label>
                        <input type="text" value="<?php echo e($usuario->apellido_paterno_usuario); ?>" disabled>
                    </div>

                    <div>
                        <label>Apellido Materno</label>
                        <input type="text" value="<?php echo e($usuario->apellido_materno_usuario); ?>" disabled>
                    </div>

                    <div>
                        <label>Correo Electrónico</label>
                        <input type="email" value="<?php echo e($usuario->correo_electronico); ?>" disabled>
                    </div>

                    <div>
                        <label>Teléfono</label>
                        <input type="text" value="<?php echo e($usuario->telefono); ?>" disabled>
                    </div>
                </div>

                
                <div class="form-two form-step">
                    <h2>Dirección del usuario</h2>
                    <p>Consulta la dirección registrada del usuario.</p>

                    <div>
                        <label>Estado</label>
                        <input type="text" value="<?php echo e($usuario->estado); ?>" disabled>
                    </div>

                    <div>
                        <label>Alcaldía / Municipio</label>
                        <input type="text" value="<?php echo e($usuario->municipio); ?>" disabled>
                    </div>

                    <div>
                        <label>Colonia</label>
                        <input type="text" value="<?php echo e($usuario->colonia); ?>" disabled>
                    </div>

                    <div>
                        <label>Código Postal</label>
                        <input type="text" value="<?php echo e($usuario->codigo_postal); ?>" disabled>
                    </div>

                    <div>
                        <label>Calle</label>
                        <input type="text" value="<?php echo e($usuario->calle); ?>" disabled>
                    </div>

                    <div>
                        <label>Número Exterior</label>
                        <input type="text" value="<?php echo e($usuario->numero_exterior); ?>" disabled>
                    </div>

                    <div>
                        <label>Número Interior</label>
                        <input type="text" value="<?php echo e($usuario->numero_interior); ?>" disabled>
                    </div>
                </div>

                
                <div class="btn-group">
                    <button type="button" class="btn-prev" disabled>Regresar</button>
                    <button type="button" class="btn-next">Siguiente</button>
                    <a href="<?php echo e(route('usuarios.index')); ?>" class="btn-submit" style="display: none;">Finalizar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.usuario', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/usuarios/show.blade.php ENDPATH**/ ?>