
<?php $__env->startSection('title','Customer Management'); ?>
<?php $__env->startSection('heading','Customer Management'); ?>
<?php $__env->startSection('content'); ?>






    <div class="card mt-1">
        
        <h6 class="m-0"><span class="text-white bg-dark p-1">Customer Management</span></h6>
        <div class="card-content">
            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                
                                                <div class="card-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Phone #</th>
                                                                    <th>Patient Email</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody> 
                                                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                        <tr>
                                                                            <th>
                                                                                <h6><?php echo e($item->name ?? ''); ?></h6>
                                                                                <p class="my-0 py-0">Country: <?php echo e($item->country ?? 'N/A'); ?></p>
                                                                                <p class="my-0 py-0">Zip/Postal Code: <?php echo e($item->zip_code ?? 'N/A'); ?></p>
                                                                            </th>
                                                                            <th><?php echo e($item->phone ?? 'N/A'); ?></th>
                                                                            <td>
                                                                                <a href="mailto:<?php echo e($item->email); ?>">
                                                                                    <?php echo e($item->email); ?>

                                                                                </a> 
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/customers/index.blade.php ENDPATH**/ ?>