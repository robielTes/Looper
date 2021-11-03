


<?php $__env->startSection('content'); ?>
    <div style="padding: 10px">
        <p>
            <?php echo e($name); ?> is <?php echo e($age); ?> years old.
        </p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Robiel\Desktop\slime\Looper\resources\views/user/show.blade.php ENDPATH**/ ?>