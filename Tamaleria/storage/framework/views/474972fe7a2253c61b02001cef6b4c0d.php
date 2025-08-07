<?php $__env->startSection('title', 'Inicio - Panel Admin'); ?>

<?php $__env->startSection('content'); ?>
<article class="container-l article">
    <h2 class="article-title">¡Hola Administrador!</h2>
    <p class="article-subtitle">¡Bienvenido al panel principal!</p>            

    
    <section class="home">
        <div class="card profile-card">
            <div class="profile-card-wrapper">
                <figure class="card-avatar">
                    <img src="<?php echo e(asset('media/Imagenes/u2.jpg')); ?>" width="48" height="48">
                </figure>
                <div>
                    <p class="card-title">Administrador de tamalería</p>
                    <p class="card-subtitle">Gestión de usuarios, cupones y tamales</p>
                </div>
            </div>
            <ul class="contact-list">
                <li>
                    <a href="mailto:dulce.conexion@gmail.com" class="contact-link icon-box">
                        <span class="material-symbols-rounded icon">mail</span>
                        <p class="text">tamales@gmail.com</p>
                    </a>
                </li>
                <li>
                    <a href="tel:+5571732332" class="contact-link icon-box">
                        <span class="material-symbols-rounded icon">call</span>
                        <p class="text">5571732332</p>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    
    <section class="projects">
        <div class="section-title-wrapper">
            <h2 class="section-title">Administrar datos</h2>
        </div>

<ul class="project-list">
    <li class="project-item">
        <?php echo $__env->make('components.card', [
            'title' => 'Gestionar usuarios',
            'badge' => 'Usuarios',
            'color' => 'blue',
            'text' => 'En este apartado podrás administrar de forma completa a los clientes de la tamalería. Podrás registrar nuevos usuarios, actualizar su información de contacto, revisar sus historiales de pedidos y aplicar acciones personalizadas como asignar descuentos, bloquear usuarios inactivos o dar seguimiento a sus compras.',
            'link' => route('usuarios.index'),
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </li>

    <li class="project-item">
        <?php echo $__env->make('components.card', [
            'title' => 'Gestionar cupones',
            'badge' => 'Cupones',
            'color' => 'cyan',
            'text' => 'Este módulo te permite gestionar los cupones promocionales de tu tamalería. Puedes crear nuevos cupones con condiciones específicas (por ejemplo: 2x1, descuento por primera compra, etc.), modificarlos según campañas especiales o eliminar los que ya no estén vigentes. Ideal para impulsar ventas en fechas clave como el Día de la Candelaria.',
            'link' => route('cupones.index'),
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </li>

    <li class="project-item">
        <?php echo $__env->make('components.card', [
            'title' => 'Gestionar pedidos',
            'badge' => 'Tamales',
            'color' => 'orange',
            'text' => 'Desde aquí tendrás control total sobre los pedidos de tamales realizados. Puedes visualizar el estado de cada orden (pendiente, en preparación, entregada), editar detalles como cantidades, sabores y precios, así como consultar el historial completo de ventas. Todo organizado para que nunca falten tamales en la entrega.',
            'link' => route('ordenes.index'),
        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </li>
</ul>

    </section>

</article>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>