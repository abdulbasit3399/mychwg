
<?php $__env->startSection('title','Orders Management'); ?>
<?php $__env->startSection('heading','Orders Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <?php $__currentLoopData = $orders_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3">
                <a href="?status=<?php echo e($count->status); ?>">
                    <div class="card text-center order-stats-link">
                        <h1 class="text-bold-700 mb-0 text-primary"><?php echo e($count->total ?? 0); ?></h1>
                        <p class="text-uppercase font-weight-bold"><span class="text-success"><?php echo e($count->status); ?></span></p>
                    </div>
                </a>
            </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0 table-hover-animation">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Ordered By</th>
                                        <th>Status</th>
                                        <th>Ordered</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-primary">#<?php echo e($item->id); ?></th>
                                            <td>
                                                <h6><?php echo e($item->user->name ?? 'N/A'); ?></h6>
                                                <a href="mailto:<?php echo e($item->user->email ?? 'N/A'); ?>"><?php echo e($item->user->email ?? 'N/A'); ?></a>
                                            </td>
                                            <td>
                                                <?php if($item->status == 'completed'): ?>
                                                    <span class="status-badge-order-green"><?php echo e($item->status); ?></span>
                                                <?php elseif($item->status == 'shipped'): ?>
                                                    <span class="status-badge-order-cyan"><?php echo e($item->status); ?></span>
                                                <?php elseif($item->status == 'pending'): ?>
                                                    <span class="status-badge-order-blue"><?php echo e($item->status); ?></span>
                                                <?php elseif($item->status == 'cancelled'): ?>
                                                    <span class="status-badge-order-red"><?php echo e($item->status); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                                            <td class="text-right"><a href="<?php echo e(route('admin.shop.order', $item->id)); ?>" class="text-primary" title="Order detail"><i class="feather icon-eye"></i></a></td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/shop/orders/orders.blade.php ENDPATH**/ ?>