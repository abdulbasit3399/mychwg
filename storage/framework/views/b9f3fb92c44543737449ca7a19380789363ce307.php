 
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
                                        <th>Order</th>
                                        <th>Ordered By</th>
                                        <th>Status</th>
                                        <th>Ordered</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = orders(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th class="text-primary">#<?php echo e($item->id); ?></th>
                                            <td>
                                                <h6><?php echo e($item->user->name ?? 'N/A'); ?></h6>
                                                <a href="#"><?php echo e($item->user->email ?? 'N/A'); ?></a>
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
                                            <td class="text-right"><a href="<?php echo e(route('shop.order.detail', $item->id)); ?>" class="text-primary detail_order_btn" title="Order detail"><i class="feather icon-eye"></i></a></td>
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



<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/shop/order/list.blade.php ENDPATH**/ ?>