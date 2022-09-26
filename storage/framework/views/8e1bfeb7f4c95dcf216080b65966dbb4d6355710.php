
<?php $__env->startSection('title','Product Management'); ?>
<?php $__env->startSection('heading','Product Management'); ?>
<?php $__env->startSection('css'); ?>
<style>

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">


        <div class="col-sm-12">
            <div class="card">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if((isset($product))): ?>
                                <form action="<?php echo e(route('admin.shop.product.edit',$product->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php else: ?>
                                <form action="<?php echo e(route('admin.shop.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php endif; ?>
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Title</label>
                                        <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo e($product->title ?? old('title')); ?>" required>
                                    </fieldset>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Slug" value="<?php echo e($product->slug ?? old('slug')); ?>" required>
                                    </fieldset>
                                </div>


                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Category</label>
                                        <select class="form-control" name="shop_category_id">
                                            <?php if(isset($product->shop_category_id)): ?>
                                                <option value="<?php echo e($product->shop_category_id); ?>" hidden><?php echo e(ucfirst($product->shopCategory->title)); ?></option>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = shopOptions()['shop_categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e(ucfirst($item->title)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Brand</label>
                                        <select class="form-control" name="shop_brand_id">
                                            <?php if(isset($product->shop_brand_id)): ?>
                                                <option value="<?php echo e($product->shop_brand_id); ?>" hidden><?php echo e(ucfirst($product->shopBrand->title)); ?></option>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = shopOptions()['shop_brands']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e(ucfirst($item->title)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </fieldset>
                                </div>
                                
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Variant</label>
                                        <select class="form-control" name="shop_variant_id">
                                            <?php if(isset($product->shop_variant_id)): ?>
                                                <option value="<?php echo e($product->shop_variant_id); ?>" hidden><?php echo e(ucfirst($product->shopVariant->title)); ?></option>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = shopOptions()['shop_variants']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e(ucfirst($item->title)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </fieldset>
                                </div>
                                
                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Color</label>
                                        <select class="form-control" name="shop_color_id">
                                            <?php if(isset($product->shop_color_id)): ?>
                                                <option value="<?php echo e($product->shop_color_id); ?>" hidden><?php echo e(ucfirst($product->shopColor->title)); ?></option>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = shopOptions()['shop_colors']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e(ucfirst($item->title)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </fieldset>
                                </div>
                                
                                
                                

                                
                                
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <label for="">Description</label>
                                        <textarea name="description" class="form-control" id="description"><?php echo $product->description ?? old('description'); ?></textarea>
                                </div>
                                <div class="col-xl-12 col-md-12 col-12 mb-1">
                                    <label for="basicInput">Thumbnail</label>
                                    <input type="file" class="dropify" name="thumbnail" data-default-file="<?php if(isset($product->thumbnail)): ?><?php echo e(asset($product->thumbnail) ?? ''); ?><?php endif; ?>">
                                </div>


                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Type</label>
                                        <select class="form-control" name="type" required>
                                            <?php if(isset($product->type)): ?>
                                            <option value="<?php echo e($product->type); ?>" hidden><?php echo e($product->type); ?></option>
                                            <?php endif; ?>
                                            <option value="New Arrival">New Arrival</option>
                                            <option value="Popular">Popular</option>
                                            <option value="Best Seller">Best Seller</option>
                                            <option value="Favorire">Favorire</option>
                                            <option value="Discounted">Discounted</option>
                                            <option value="Promoted">Promoted</option>
                                            <option value="Top Rated">Top Rated</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Tags (Comma separated)</label>
                                        <input type="text" class="form-control" placeholder="nature, wallpaper, health" name="tags" required value="<?php echo e($product->tags ?? old('tags')); ?> ">
                                    </fieldset>
                                </div>


                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Price</label>
                                        <input type="text" class="form-control" name="amount" placeholder="Price" value="<?php echo e($product->amount ?? old('amount')); ?>" required>
                                    </fieldset>
                                </div>



                                <div class="col-xl-6 col-md-6 col-12 mb-1">
                                    <fieldset class="form-group">
                                        <label for="basicInput">Stock Available Quantity</label>
                                        <input type="text" class="form-control" placeholder="10" name="stock_quantity" required value="<?php echo e($product->stock_quantity ?? old('stock_quantity')); ?> ">
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 col-md-2 col-12 mb-1">
                                    <fieldset class="form-group pull-right">
                                        <button class="btn btn-relief-primary" type="submit">Save Product</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<script>
    $('[name="title"]').keyup(function(){
        var str = $(this).val(); 
        $('[name="slug"]').val(str.replace(/\s+/g, '-').toLowerCase());    
    });
    
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/admin/shop/add-edit.blade.php ENDPATH**/ ?>