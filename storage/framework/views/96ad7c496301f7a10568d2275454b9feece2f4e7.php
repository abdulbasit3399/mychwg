<?php if(count($products)>0): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xs-12 col-sm-12 col-md-4 grid-view">

            <div class="hover-product">
                <div class="hover">
                    <img  class="product-img"  src="<?php echo e(asset($item->thumbnail)); ?>" alt="<?php echo e($item->title); ?>" />

                    <div class="overlay">
                        <button type="button" class="info quick-view-popup product-details-view" data-id="<?php echo e($item->uuid); ?>" data-toggle="modal" data-target=".quick-show-modal">Quick View</button>
                    </div>
                </div>
                <div class="single-product-bottom-section">
                    <a style="text-decoration:none;color: black;" href="<?php echo e(route('shop.product.detail',['id' => $item->uuid, 'slug' => $item->slug])); ?>"><h3 class="product-title mt-2 font-weight-bold"><?php echo e($item->title); ?></h3></a>
                    <h3 class="product-price font-weight-bold text-success">&#36;<?php echo e($item->amount); ?></h3>
                    <input type="hidden" class="product-detail" value="<?php echo e($item->description); ?>">
                    

                    <div class="title-divider"></div>
                    <div class="single-product-add-to-cart">
                        <button type="submit" data-id="<?php echo e($item->uuid); ?>" class="btn btn-sm btn-style bg-success add-to-cart" data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
                        <?php if(Auth::id() && count($item->wishlist)>0): ?>
                            <?php $__currentLoopData = $item->wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($list->shop_product_id==$item->id): ?>
                                    <button type="button" class="btn btn-sm btn-style cart-product-wishlist text-danger" data-id="<?php echo e($item->uuid); ?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fa fa-heart "></i></button>
                                <?php endif; ?>
                                <?php break; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <button type="button" class="btn btn-sm btn-style cart-product-wishlist text-white" data-id="<?php echo e($item->uuid); ?>" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fa fa-heart"></i></button>

                        <?php endif; ?>
                        <a href="#" class="btn btn-sm btn-style product-compare bg-warning" data-toggle="modal" data-id="<?php echo e($item->uuid); ?>" data-img="<?php echo e(asset($item->thumbnail)); ?>" data-title="<?php echo e($item->title); ?>" data-price="<?php echo e($item->amount); ?>" data-target=".bd-compare-product-modal-lg" data-placement="top" title="Add to Compare List"><i class="fa fa-exchange"></i></a>
                        <a href="<?php echo e(route('shop.product.detail',['id' => $item->uuid, 'slug' => $item->slug])); ?>"  class="btn btn-sm btn-style bg-info" data-placement="top" title="Product Details"  data-id="<?php echo e($item->id); ?>"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <h4 class="ml-5">No Product Found</h4>
<?php endif; ?>



<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/shop/ajax/products.blade.php ENDPATH**/ ?>