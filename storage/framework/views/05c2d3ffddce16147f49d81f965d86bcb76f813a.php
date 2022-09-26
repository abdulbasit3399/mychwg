<?php $__env->startSection('title', 'Faqs'); ?>



<?php $__env->startSection('meta'); ?>

    <meta name="keywords" content="Faqs">

    <meta name="description" content="Go below if you have any query or an issues with CHWG.">

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>





<?php echo $__env->make('front.components.pages_banner', ['heading' => 'FAQ', 'description' => 'Frequently Asked Questions'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>







<section class="section-padding">

    <div class="container">

        <div id="accordion">

            <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="card card-site mb-3 mt-3">

                <div class="card-header bg-dark" id="headingTwo">

                    <h5 class="mb-0 text-white" data-toggle="collapse" data-target="#collapse-<?php echo e($loop->iteration); ?>" aria-expanded="true" aria-controls="collapseOne">

                        <?php echo e($faq->question); ?>


                    </h5>

                </div>



                <div id="collapse-<?php echo e($loop->iteration); ?>" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">

                    <div class="card-body">

                       <?php echo $faq->answer; ?>


                   </div>

               </div>

           </div>

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

   </div>

</div>

</section>







<?php $__env->stopSection(); ?>







<?php $__env->startSection('js'); ?>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/faqs.blade.php ENDPATH**/ ?>