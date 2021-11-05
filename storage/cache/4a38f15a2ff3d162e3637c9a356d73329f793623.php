


<?php $__env->startSection('content'); ?>

    <div class="flex flex-col justify-center bg-purple-500">
        <div class="m-auto py-4">
            <img src="/assets/logo.png"/>
        </div>
        <div class="py-8">
            <h1 class="text-center text-white text-6xl tracking-widest">Exercise<br>Looper</h1>
        </div>
    </div>
    <div class="flex justify-center py-8">
        <a href="/exercises/answering" class="purple text-white font-bold rounded mx-8 py-4 px-32">
            <p>TAKE AN EXERCISE</p>
        </a>
        <a href="/exercises/new" class="yellow text-white font-bold rounded mx-8 py-4 px-32">
            <p>CREATE AN EXERCISE</p>
        </a>
        <a href="/exercises" class="green text-white font-bold rounded mx-8 py-4 px-32">
            <p>MANAGE AN EXERCISE</p>
        </a>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Filipe-Alexandre.MOI\Documents\Modules\MAW1.1\Looper\resources\views/main/home.blade.php ENDPATH**/ ?>