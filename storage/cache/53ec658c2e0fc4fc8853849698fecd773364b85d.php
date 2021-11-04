



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


        <div class="flex flex-row">
            <div class="flex-1 px-2">
                <h1 class="text-4xl font-semibold">Building</h1>
                <h5 class="pt-5 border-b-2">Title</h5>
                <div class="flex flex-row">
                    <div>
                        <p>Lorem, ipsum dolor sit amet </p>
                    </div>
                    <div class="flex-grow"></div>
                    <div class="flex flex-row">
                        <img src="/assets/edit.png" alt="edit">
                        <img src="/assets/trash.png" alt="trash">
                        <img src="/assets/stop.png" alt="stop" >
                    </div>
                </div>
            </div>
            <div class="flex-1 px-2">
                <h1 class="text-4xl font-semibold">Answering</h1>
                <h5 class="pt-5 border-b-2">Title</h5>
                <div class="flex flex-row">
                    <div>
                        <p>Lorem, ipsum dolor sit amet </p>
                    </div>
                    <div class="flex-grow"></div>
                    <div class="flex flex-row">
                        <img src="/assets/edit.png" alt="edit">
                        <img src="/assets/stop.png" alt="stop" >
                    </div>
                </div>
            </div>
            <div class="flex-1 px-2">
                <h1 class="text-4xl font-semibold">Closed</h1>
                <h5 class="pt-5 border-b-2">Title</h5>
                <div class="flex flex-row">
                    <div>
                        <p>Lorem, ipsum dolor sit amet </p>
                    </div>
                    <div class="flex-grow"></div>
                    <div class="flex flex-row">
                        <img src="/assets/edit.png" alt="edit">
                        <img src="/assets/trash.png" alt="trash">
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Looper\resources\views/main/manage.blade.php ENDPATH**/ ?>