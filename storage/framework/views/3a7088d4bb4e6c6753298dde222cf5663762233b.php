
<?php $__env->startSection('title','Service Booking Payments'); ?>
<?php $__env->startSection('heading','Service Booking Payments'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">

        
            <div class="card">
                
                <div class="card-content">
                    

                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0 table-hover-animation">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>User Role</th>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <!--<th>Time</th>-->
                                        <th>Payment Method</th>
                                        <th>Price</th>
                                        <th>Created</th>
                                        <th>Status</th>

                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($item->payment_method=='paypal' ||$item->payment_method=='stripe'): ?>
                                            <tr>
                                                <td>
                                                    <h6><?php echo e($item->user->name ?? 'N/A'); ?></h6>
                                                    <a href="<?php echo e(route('admin.member.detail', encrypt($item->user->id))); ?>"><?php echo e($item->user->email ?? 'N/A'); ?></a>
                                                </td>
                                                
                                                <td class="text-success"><?php echo e($item->user->role); ?></td>
                                                <th><?php echo e($item->HomeopathService->title??' '); ?></th>
                                                <td><?php echo e($item->date??''); ?></td>
                                                <!--<td><?php echo e($item->time_slot??''); ?></td>-->
                                                <th><span class="badge badge-primary"><?php echo e($item->payment_method ?? ''); ?></span></th>
                                                <th><h3 class="text-success m-0">CAD <?php echo e($item->price?? ''); ?></h3></th>
                                                <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                                                <th>
                                                    
                                                    <?php if($item->status=='active'): ?>
                                                    <span class=" badge badge-success"><?php echo e($item->status?? ''); ?></span>
                                                    <?php else: ?>
                                                    <span class="badge badge-danger"><?php echo e($item->status?? ''); ?></span>
                                                    <?php endif; ?>

                                                </th>
                                                <th class="text-right">
                                                    <form method="post" action="<?php echo e(route('admin.refund.amount')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="transaction_id" value="<?php echo e($item->transaction_id); ?>">
                                                        <input type="hidden" name="payment_method" value="<?php echo e($item->payment_method); ?>">
                                                        <input type="hidden" name="amount" value="<?php echo e($item->price); ?>">
                                                        <input type="hidden" name="id" value="<?php echo e(encrypt($item->id)); ?>">
                                                        <?php if($item->status!='refund'): ?>
                                                        <button type="submit" class="btn btn-dark btn-block btn-sm" onclick="return confirm('Do you want to refund it ?')"> Refund Pay</button>
                                                        <?php endif; ?>
                                                    </form>
                                                </th>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/payment_refund/index.blade.php ENDPATH**/ ?>