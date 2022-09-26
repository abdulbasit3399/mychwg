
<?php $__env->startSection('title', 'Payment Succeed'); ?>


<?php $__env->startSection('content'); ?>

<?php echo $__env->make('front.components.pages_banner', ['heading' => '', 'description' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--MAIN CONTENT SECTION-->

<section class="content">
    <div class="container text-center py-3">
        <i class="fas fa-check-circle fa-5x text-success"></i>
        <h1>Thanks for subscribing</h1>
        <h4 class="text-secondary">A payment regarding subscription will appear on your statement.</h4>
        <a href="<?php echo e(route('redirect.dashboard')); ?>"><i class="fas fa-thumbs-up fa-3x"></i></a>
    </div>
</section>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/payment_succeed.blade.php ENDPATH**/ ?>