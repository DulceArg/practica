

<div class="card project-card">
    <time class="card-date"><?php echo e(now()->format('Y-m-d')); ?></time>

    <h3 class="card-title">
        <a href="<?php echo e($link); ?>"><?php echo e($title); ?></a>
    </h3>

    <div class="card-badge <?php echo e($color); ?>"><?php echo e($badge); ?></div>

    <p class="card-text">
        <?php echo e($text); ?>

    </p>

    <div class="card-progress-box">
        <div class="progress-label">
            <span class="progress-title"></span>
            <data class="progress-data"></data>
        </div>
    </div>

    <a href="<?php echo e($link); ?>" class="dbutton">Gestionar</a>
</div>
<?php /**PATH C:\Users\luis moguel\Desktop\tamaleria\resources\views/components/card.blade.php ENDPATH**/ ?>