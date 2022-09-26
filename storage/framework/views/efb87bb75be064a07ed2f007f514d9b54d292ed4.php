<?php $__env->startSection('title','Product Detail'); ?>
<?php $__env->startSection('heading','Product Detail'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
                        <!-- account start -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title"><?php echo e($product->title); ?></div>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="users-view-image">
                                            <img src="<?php echo e(asset($product->thumbnail)); ?>" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1">
                                        </div>
                                        <div class="col-lg-5">
                                            <table >
                                                <tr>
                                                    <td class="font-weight-bold pr-3">Category: </td>
                                                    <td><?php echo e(ucfirst($product->shopCategory->title) ?? 'N/A'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold pr-3">Brand: </td>
                                                    <td><?php echo e(ucfirst($product->shopBrand->title) ?? 'N/A'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold pr-3">Variant: </td>
                                                    <td><?php echo e(ucfirst($product->shopVariant->title) ?? 'N/A'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold pr-3">Color: </td>
                                                    <td class="text-center"><div class="color_code" style="background-color:<?php echo e($product->shopColor->color_code); ?>"><?php echo e(ucfirst($product->shopColor->title) ?? 'N/A'); ?></div></td>
                                                </tr>
                                                
                                            </table>
                                        </div>

                                        <div class="col-lg-5">
                                            <table >
                                                <tr>
                                                    <td class="font-weight-bold pr-3">Product ID: </td>
                                                    <td class="text-center"><span class="badge badge-dark"><?php echo e($product->uuid); ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold pr-3"> Price: </td>
                                                    <td class="text-center"><h3 class="font-weight-bold text-success"><?php echo e($product->amount); ?></h3></td>
                                                </tr>

                                                <tr>
                                                    <td class="font-weight-bold pr-3"> Stock Quantity: </td>
                                                    <td class="text-center"><h4 class="font-weight-bold text-info"><?php echo e($product->stock_quantity); ?></h4></td>
                                                </tr>
                                                

                                                <tr>
                                                    <td colspan="2"><hr></td>
                                                </tr>

                                                <tr>
                                                    <td class="font-weight-bold pr-3">Type: </td>
                                                    <td><?php echo e(ucfirst($product->type) ?? 'N/A'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold pr-3">Tags: </td>
                                                    <td>
                                                        <?php $__currentLoopData = commaSeparatedString($product->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span class="badge badge-info"><?php echo e($tag); ?></span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                </tr>
                                                
                                            </table>
                                        </div>
                                        
                                        <div class="col-lg-2">
                                            <a href="<?php echo e(route('admin.shop.product.update', $product->id)); ?>" class="btn btn-primary btn-block"><i class="feather icon-edit-1"></i> Update</a>
                                            <a href="<?php echo e(route('admin.shop.product.remove', $product->id)); ?>" class="btn btn-danger btn-block alert-confirm"><i class="feather icon-trash-2"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- account end -->
                        <!-- information start -->
                        <div class="col-md-12 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">Description</div>
                                </div>
                                <div class="card-body">
                                    <?php echo $product->description; ?>

                                </div>
                            </div>
                        </div>
                        <!-- information start -->
                    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/shop/product_detail.blade.php ENDPATH**/ ?>