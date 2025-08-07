<!-- VALORES -->
<div class="gwrapper section-4">
    <div class="home-text2" style="text-align: center;">
        <h5>¡Comprometidos con la excelencia en cada tamal!</h5>
        <h1>Nuestros valores</h1>
    </div>
    <div class="gmain-content">
        <?php
            $valores = [
                ['productos13.jpg', 'Calidad', 'Seleccionamos los mejores ingredientes y seguimos procesos cuidadosos para lograr tamales sabrosos, saludables y consistentes.'],
                ['valores2.jpg', 'Compromiso', 'Nos dedicamos a brindarte un servicio excepcional y productos que representen el verdadero sabor mexicano.'],
                ['valores3.jpg', 'Tradición', 'Mantenemos vivas las recetas familiares que han pasado de generación en generación, respetando las raíces de nuestra cultura.'],
                ['blog3.jpg', 'Confianza', 'Nuestros clientes confían en la autenticidad y frescura de cada tamal que entregamos, y eso nos impulsa a mejorar día a día.'],
                ['valores1.jpg', 'Responsabilidad', 'Nos preocupamos por nuestro entorno y comunidad, utilizando prácticas responsables y sostenibles en cada paso.'],
                ['valores4.jpg', 'Pasión', 'Disfrutamos cada etapa del proceso: desde amasar la masa hasta envolver cada tamal con esmero y dedicación.'],
            ];
        ?>

        <?php $__currentLoopData = $valores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="gbox">
                <img src="<?php echo e(asset('media/Imagenes/' . $valor[0])); ?>" alt="<?php echo e($valor[1]); ?>">
                <div class="gimg-text">
                    <div class="gcontent">
                        <h2><?php echo e($valor[1]); ?></h2>
                        <p><?php echo e($valor[2]); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/partials/valores.blade.php ENDPATH**/ ?>