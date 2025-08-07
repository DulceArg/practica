<?php $__env->startSection('title', 'Gestión de Órdenes'); ?>

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
                    <li><button type="button" class="filter-btn-c" id="showAllBtn">Todos</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByDescripcion">Descripción</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByFecha">Fecha</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByCupon">Cupón</button></li>
                    <li>
                        <a href="<?php echo e(route('ordenes.create')); ?>">
                            <button type="button" class="filter-btn-c active" id="addBtn">Agregar +</button>
                        </a>
                    </li>
                </ul>

                
                <div id="ordenList">
                    <?php echo $__env->make('partials.ordenes-cards', ['ordenes' => $ordenes], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

            </div>
        </section>
    </article>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestion-orden', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/ordenes/index.blade.php ENDPATH**/ ?>