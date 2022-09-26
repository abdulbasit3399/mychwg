<?php $__env->startSection('title', 'Payments Error'); ?>


<?php $__env->startSection('content'); ?>

<div class="container text-center">
    <div class="row">
        <div class="col-lg-12 my-4">
            <div class="card card-help">
                <div class="card-body">
                    <img src="<?php echo e(asset('front/assets/error.png')); ?>" class="img-fluid" alt="">
                    <h2 class="text-danger p-3"><?php echo e($error ?? 'Whoops! Something went wrong with payments.'); ?></h2>
                    <a class="btn btn-dark" href="<?php echo e(route('index')); ?>">Try Again Later!</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/errors/payments_error.blade.php ENDPATH**/ ?>