<!-- GALERÍA FINAL -->
<div id="gallery" class="acontainer">
    <div class="home-text2" style="text-align: center;">
        <h5>¡Pasión por cada detalle y sabor!</h5>
        <h1>Nuestra galería</h1>
    </div>
    <div class="abox">
        <?php for($j = 0; $j < 3; $j++): ?>
            <div class="adream">
                <?php for($k = 1; $k <= 3; $k++): ?>
                    <?php $num = $j * 3 + $k; ?>
                    <img src="<?php echo e(asset('media/Imagenes/galeria-1-' . $num . '.jpg')); ?>" alt="Tamal imagen <?php echo e($num); ?>">
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
</div>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/partials/galeria.blade.php ENDPATH**/ ?>