<!-- Shopping cart table -->
    <a href="#" class="close-cart"><i class="fa fa-close"></i></a>
<div class="append-cart-data" style="max-height:400px;overflow: auto;">
    <?php if(count(Cart::instance('shopping')->content())>0): ?>
                
                <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                          <th scope="col">Product</th>
                          <th scope="col">Price</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Total</th>
                          <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <input type="hidden"  class="row-id" value="<?php echo e($item->rowId); ?>">
                                <td class="p-4">
                                    <div class="media align-items-center">
                                        <img src="<?php echo e(asset($item->options->image)); ?>" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                        <div class="media-body">
                                            <h5><?php echo e($item->name); ?></h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right font-weight-semibold align-middle p-4">$<?php echo e($item->price); ?></td>
                                <td class="align-middle p-4"><input type="number" class="form-control text-center item-qty" min="0" value="<?php echo e($item->qty); ?>"></td>
                                <td class="text-right font-weight-semibold align-middle p-4">$<?php echo e($item->subtotal); ?></td>
                                <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger delete-cart-item" title="" data-original-title="Remove" data-id="<?php echo e($item->id); ?>" data-rowId="<?php echo e($item->rowId); ?>">×</a></td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>

                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">

                    </div>
                    <div class="d-flex">
                        <div class="text-right mt-4">
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large">$<strong id="total_price"><?php echo e(Cart::instance('shopping')->total()); ?></strong></div>
                        </div>
                    </div>
                </div>

    <?php else: ?>
        <h4 class="text-center">Cart is Empty</h4>
    <?php endif; ?>



</div>

                <div class="float-right mt-3">
                    <a onclick="checkout()" class="btn border-3 checkout-cart-btn btn-outline-success" data-target="_blank">Checkout</a>
                </div>
<style>

    .ui-w-40 {
        width: 40px !important;
        height: auto;
    }

    .card-cart{
        box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);
    }
    .card-cart{
        height: 350px;
        overflow-x: hidden;
    }

    .ui-product-color {
        display: inline-block;
        overflow: hidden;
        margin: .144em;
        width: .875rem;
        height: .875rem;
        border-radius: 10rem;
        -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
        box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
        vertical-align: middle;
    }
</style>




<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/shop/ajax/cart.blade.php ENDPATH**/ ?>