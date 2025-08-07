<?php $__env->startSection('title', 'Página principal'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('partials.modal-login', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('partials.cupones-sesion', ['cupones' => $cupones], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cupones-layout2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/usuario/cupones-sesion.blade.php ENDPATH**/ ?>