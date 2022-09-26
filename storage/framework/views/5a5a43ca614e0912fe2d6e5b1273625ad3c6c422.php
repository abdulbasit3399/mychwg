<?php $__env->startSection('title','Event Management'); ?>

<?php $__env->startSection('heading','Event Management'); ?>



<?php $__env->startSection('content'); ?>

<div class="row">



    <div class="col-sm-12 events-management">



                <div class="card pl-2 py-1">

                    <h2 class=" mb-0 font-weight-bold">My Event(s) List</h2>

                </div>





            <div class="masonry">

                

                <div class="item p-0">

                    <div class="card text-center mb-0" style="min-height:200px;">

                        <div class="card-body mt-2">

                            <h3>Want to add/organize new event in upcoming days?</h3>

                            <a href="<?php echo e(route('advocate.events.create')); ?>" class="mt-1 btn btn-primary font-weight-bold">Click Here</a>

                        </div>

                    </div>

                </div>





            <?php $__empty_1 = true; $__currentLoopData = Auth::user()->events->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>          

                <div class="item p-0">

                    <div class="img-container">

                        <img src="<?php echo e(asset($item->thumbnail)); ?>" style="min-height:200px; object-fit: cover;">

                        <div class="bottom-left-text">

                            <h2><?php echo e($item->title); ?></h2>

                            <span>

                                    <?php echo e($item->eventTimings[0]->date ?? ''); ?>&nbsp;

                                    <?php echo e($item->eventTimings[0]->time ?? ''); ?>


                                     &nbsp; <i class="fas fa-arrows-alt-h"></i> &nbsp; 

                                    <?php echo e($item->type); ?>


                             </span>



                             

                        </div>

                        <div class="top-right-text">

                                <a href="<?php echo e(route('advocate.events.show', Crypt::encrypt($item->id))); ?>">View detail</a>

                        </div>

                    </div>

                </div>

                

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <div class="text-center">

                        <h3 class="alert alert-warning">You have not organized any events yet</h3>

                    </div>

                <?php endif; ?>

            </div>



                







    </div>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.advocate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/advocate/events/index.blade.php ENDPATH**/ ?>