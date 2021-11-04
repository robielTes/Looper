


<?php $__env->startSection('content'); ?>

    <div class="flex px-12 sm:px-24 md:px-40 <?php echo e($color); ?>">
        <div>
            <a href="\">
                <img class="w-14" src="/assets/logo.png"/>
            </a>
        </div>
        <div class="py-4">
            <p class="pl-8 text-white text-xl" href="\"><?php echo e($title); ?></p>
        </div>
    </div>
    <div class="px-12 sm:px-24 md:px-40">

        <div class="grid grid-cols-3 shadow-lg bg-gray-200 bg-opacity-75">
            <div class="col-start-2 text-center py-3">Ceci est un questionnaire</div>
            <div class="col-start-2 align-baseline">
                <button class="bg-purple-500 w-full text-white font-bold py-2 px-4 rounded">Button</button>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Looper\resources\views/main/take.blade.php ENDPATH**/ ?>