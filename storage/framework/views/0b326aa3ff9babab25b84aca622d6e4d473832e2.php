
<?php $__env->startSection('title','Revenue Report'); ?>
<?php $__env->startSection('heading','Revenue Report'); ?>


<?php $__env->startSection('content'); ?>

<h3 class="text-center text-muted">Minimum transfer of payout amount must be greater than <span class="text-danger"> CAD 99 and account (Stripe/Paypal)</span> of homeopath must connected.</h3>

<section>
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">

                                <table class="table datatable p-0 table-hover-animation">
                                    <thead>
                                    <tr>
                                        <th>Homeopath</th>
                                        <th>Account Attached</th>
                                        <th>Total Revenue (Balance)</th>
                                        <th class="text-right">----------</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="tr">

                                            <td class="font-weight-bold">
                                                <?php echo e($item->name ?? ''); ?><br>
                                                <a href="mailto:<?php echo e($item->email); ?>"><?php echo e($item->email); ?></a>
                                            </td>
                                            <td>
                                                <?php if($item->connect_type != ""): ?>
                                                <span class="badge badge-success text-uppercase font-weight-bold"><?php echo e($item->connect_type); ?></span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger text-uppercase font-weight-bold">Not connected yet</span>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td><h2 class=" text-success"><em style="font-size: 14px">CAD</em> <strong><?php echo e(number_format($item->balance, 2)); ?></strong></h2></td>
                                            <td class="text-right">
                                                <?php if($item->balance > 99 && $item->connect_type != ""): ?>
                                                    <a href="<?php echo e(route('admin.transfer.amount', $item->id)); ?>" class="font-weight-bold btn btn-primary alert-confirm">Transfer amount</a>
                                                <?php else: ?>
                                                    <small class="text-danger">Not eligible yet to transfer</small>
                                                <?php endif; ?>
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
</section>








<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/finance/revenue.blade.php ENDPATH**/ ?>