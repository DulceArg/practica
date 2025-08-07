<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Agregar usuario'); ?></title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/add_users.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('media/Imagenes/logo-sinfondo.png')); ?>">
</head>
<body>

    
    <?php echo $__env->make('partials.admin-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <main>
        <?php echo $__env->yieldContent('content'); ?> 
    </main>

    
    <?php echo $__env->make('partials.admin-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <script src="<?php echo e(asset('js/admin-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('js/add-form-steps.js')); ?>"></script>
    <script src="<?php echo e(asset('js/validar_cupon.js')); ?>"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/layouts/cupones.blade.php ENDPATH**/ ?>