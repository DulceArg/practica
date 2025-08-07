<header class="header">
    <div class="n-container">
        <div class="logo">
            <img src="<?php echo e(asset('media/Imagenes/logo.png')); ?>" alt="logo">
        </div>
        <nav class="menu">
            <ul>
                <li><a href="<?php echo e(url('/')); ?>">Sobre nosotros</a></li>
                <li><a href="<?php echo e(url('/cupones-publico')); ?>">Cupones</a></li>
            </ul>
        </nav>

        <div class="header-right">
            <?php if(session()->has('usuario_id')): ?>
                
                <?php $rol = session('rol_id'); ?>

                
                <?php if($rol == 1): ?>
                    <a href="<?php echo e(route('admin.inicio')); ?>" class="btn-admin">Ir a Panel Admin</a>
                <?php endif; ?>

                
                <a href="<?php echo e(route('usuario.perfil.edit')); ?>" class="btn-perfil">
                    <i class="fa fa-user"></i>
                </a>

                
                <a href="<?php echo e(route('logout')); ?>" class="btn-cerrar-sesion" title="Cerrar sesión">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>

            <?php else: ?>
                
                <button type="button" class="btnLogin-popup user-btn icon-btn">
                    <i class="fa-solid fa-user"></i>
                </button>
            <?php endif; ?>
        </div>
    </div>
</header>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/partials/navbar.blade.php ENDPATH**/ ?>