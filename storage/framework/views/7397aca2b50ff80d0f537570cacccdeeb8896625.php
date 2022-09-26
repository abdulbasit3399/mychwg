
<?php $__env->startSection('title','Badges'); ?>
<?php $__env->startSection('heading','Badges'); ?>


<?php $__env->startSection('content'); ?>

<section>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table p-0">
                                <thead>
                                    <tr>
                                        <th>Sr. </th>
                                        <th>Title</th>
                                        <th class="text-right">Badge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = badges(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th><?php echo e($loop->iteration); ?></th>
                                        <th><h2 class="text-success"><?php echo e($item->title); ?></h2></th>
                                        <td class="text-right"><img src="<?php echo e(asset($item->path)); ?>" style="width:60px"></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/setting/pages/badges.blade.php ENDPATH**/ ?>