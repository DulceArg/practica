<?php $__env->startSection('title', 'Gestión de Usuarios'); ?>

<?php $__env->startSection('content'); ?>
<main class="main-c">
    <article class="article-c">
        <section class="section-c product-c">
            <div class="container-c">

                
                <form class="search-gestion" action="#">
                    <input type="search" id="searchInput" placeholder="Buscar aquí ...">
                    <i class="fa fa-search"></i>
                </form>

                
                <ul class="filter-list-c">
                    <li><button class="filter-btn-c" id="showAllBtn">Todos</button></li>
                    <li><button class="filter-btn-c" id="searchByName">Nombre</button></li>
                    <li><button class="filter-btn-c" id="searchByEmail">Correo</button></li>
                    <li><button class="filter-btn-c" id="searchByPhone">Teléfono</button></li>
                    <li>
                        <a href="<?php echo e(route('usuarios.create')); ?>">
                            <button class="filter-btn-c active">Agregar +</button>
                        </a>
                    </li>
                </ul>

                
                <div id="userList">
                    <?php echo $__env->make('partials.cards', ['usuarios' => $usuarios], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

            </div>
        </section>
    </article>
</main>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.gestion-usuario', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/usuarios/index.blade.php ENDPATH**/ ?>