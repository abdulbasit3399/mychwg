
<?php $__env->startSection('title','Shop Management'); ?>
<?php $__env->startSection('heading','Shop Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">

    <div class="col-sm-12">
        <div class="card">
            <div class="card">
                <div class="card-header ml-auto">
                    <a href="<?php echo e(route('admin.shop.create')); ?>" class="btn btn-primary">+ Add new product</a>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table datatable p-0 table-hover-animation">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Variant</th>
                                        <th>Stock Quantity</th>
                                        <th>Created</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th><?php echo e($item->title); ?></th>
                                            <th><?php echo e(ucfirst($item->shopCategory->title) ?? 'N/A'); ?></th>
                                            <td><?php echo e(ucfirst($item->shopBrand->title) ?? 'N/A'); ?></td>
                                            <td><?php echo e(ucfirst($item->shopVariant->title) ?? 'N/A'); ?></td>
                                            <th><h3 class="text-success m-0"><?php echo e($item->stock_quantity); ?></h3></th>
                                            <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                                            <th class="text-right">
                                                <a href="<?php echo e(route('admin.shop.product.detail', $item->id)); ?>" class="btn btn-dark btn-block btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                            </th>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/shop/index.blade.php ENDPATH**/ ?>