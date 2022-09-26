
<?php $__env->startSection('title','Financial Statement'); ?>
<?php $__env->startSection('heading','Financial Statement'); ?>
<?php $__env->startSection('content'); ?>






    <div class="card mt-1">
        
        <h6 class="m-0"><span class="text-white bg-dark p-1">Financial Statement</span></h6>
        <div class="card-content">
            <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                
                                                <div class="card-content">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Service</th>
                                                                    <th>Patient</th>
                                                                    <th>Booking Date</th>
                                                                    <th width="12%">Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Payment Method</th>
                                                                    <th>Transaction ID</tcancelledh>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $__empty_1 = true; $__currentLoopData = Auth::user()->HomeopathServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                    
                                                                    <?php $__currentLoopData = $service->ServiceBookings->sortByDesc("id"); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($item->status != 'cancelled'): ?>
                                                                        <tr>
                                                                            <th><?php echo e($service->title); ?></th>
                                                                        <td>
                                                                        <strong class="d-block"><?php echo e($item->user->name); ?></strong>
                                                                        <a href="mailto:<?php echo e($item->user->email); ?>">
                                                                                    <?php echo e($item->user->email); ?>

                                                                                </a> 
                                                                        </td>
                                                                        <td><?php echo e($item->created_at->format('d F Y')); ?></td>
                                                                        <td class="text-danger font-weight-bold"><em><u>CAD $<?php echo e(number_format($item->price, 2)); ?></u></em></td>
                                                                        <td><span class="badge badge-warning text-uppercase"><?php echo e($item->status); ?></span></td>
                                                                        <th class="text-uppercase text-center">
                                                                            <?php echo e($item->payment_method); ?>

                                                                            
                                                                            <?php if($item->payment_method == 'pay-later'): ?>
                                                                                <span class="badge badge-success d-block"><strong>Via: </strong> <?php echo e($item->later_pay_method ?? 'N/A'); ?></span>
                                                                            <?php endif; ?>

                                                                        </th>
                                                                        <th><span class="badge badge-dark"><?php echo e($item->transaction_id); ?></span></th>
                                                                        </tr>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                    
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                        <tr>
                                                                            <td colspan="6" class="text-center">
                                                                                <h5 class="alert alert-warning">No appontment(s) were found right now</h5>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endif; ?>
                                                                    

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
<?php echo $__env->make('layouts.homeopath', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/homeopath/finance/index.blade.php ENDPATH**/ ?>