<!-- SLIDER GALERÍA / INGREDIENTES -->
<section class="section_s home section" id="home">
    <div class="home__container container grid">
        <div class="home__data">
            <div class="home-text2">
                <h1>Ingredientes Saludables</h1>
            </div>
            <p class="home__description">
                Descubre los ingredientes tradicionales que usamos en nuestros tamales: maíz nixtamalizado, hojas frescas de maíz, especias naturales y rellenos caseros con recetas auténticas. 
                
            </p>
        </div>
        <div class="home__images">
            <div class="home__swiper swiper">
                <div class="swiper-wrapper">
                    <?php for($i = 1; $i <= 4; $i++): ?>
                        <article class="home__article swiper-slide">
                            <img src="<?php echo e(asset('media/Imagenes/mexico-' . $i . '.jpg')); ?>" class="home__img">
                        </article>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/partials/ingredientes.blade.php ENDPATH**/ ?>