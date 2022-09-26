
<?php $__env->startSection('title','Donations Statistics'); ?>
<?php $__env->startSection('heading','Donations Statistics'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0 text-primary">CAD <?php echo e($total ?? 0); ?></h2>
                                        <p>Total donations so far</p>
                                    </div>
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-dollar-sign text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

    <div class="col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex align-items-start pb-0">
                                    <div>
                                        <h2 class="text-bold-700 mb-0 text-success">CAD <?php echo e($this_month_donation ?? 0); ?></h2>
                                        <p>This Month donations so far</p>
                                    </div>
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-dollar-sign text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        


    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0">
                                <thead>
                                    <tr>
                                        <th>Donator</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Donated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <h6><?php echo e($item->user->name ?? 'N/A'); ?></h6>
                                            <a href="mailto:<?php echo e($item->user->email ?? 'N/A'); ?>"><?php echo e($item->user->email ?? 'N/A'); ?></a>
                                            <small class="text-success d-block"><?php echo e($item->user->role ?? 'N/A'); ?></small>
                                        </td>
                                        <td><span class="badge badge-info">CAD <?php echo e($item->price ?? 'N/A'); ?></span></td>
                                        <th><?php echo e($item->payment_type ?? 'N/A'); ?></th>
                                        <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/donations/donations.blade.php ENDPATH**/ ?>