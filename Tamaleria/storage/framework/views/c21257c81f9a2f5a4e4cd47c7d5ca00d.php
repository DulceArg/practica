<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dulce Conexión'); ?></title>

    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('recursos/swiper-bundle.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/cupones.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('media/Imagenes/logo-sinfondo.png')); ?>">
</head>
<body>
    
    <?php echo $__env->yieldContent('content'); ?>

    
    <script src="<?php echo e(asset('js/menu2.js')); ?>"></script>
    <script src="<?php echo e(asset('js/login.js')); ?>"></script>
    <script src="<?php echo e(asset('js/modal-cupon.js')); ?>"></script>
    <script src="<?php echo e(asset('recursos/swiper-bundle.min.js')); ?>"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/layouts/cupones-layout2.blade.php ENDPATH**/ ?>