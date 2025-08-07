<?php $__env->startSection('title', 'Gestión de Cupones'); ?>

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
                    <li><button type="button" class="filter-btn-c" id="searchByCode">Código</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByStatus">Estatus</button></li>
                    <li><button type="button" class="filter-btn-c" id="searchByType">Tipo</button></li>
                    <li>
                        <a href="<?php echo e(route('cupones.create')); ?>">
                            <button type="button" class="filter-btn-c active" id="addBtn">Agregar +</button>
                        </a>
                    </li>
                </ul>

                
                <div id="cuponList">
                    <?php echo $__env->make('partials.cupones-cards', ['cupones' => $cupones], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

            </div>
        </section>
    </article>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.gestion-cupon', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/cupones/index.blade.php ENDPATH**/ ?>