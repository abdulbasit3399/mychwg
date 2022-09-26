        <div class="container">
            <div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted"><?php echo e(count(Cart::instance('shopping')->content())); ?> item(s)</div>
                </div>
            </div>



            <div class="table-responsive">
                <table class="table">
                <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <td><img class="img-fluid" src="<?php echo e(asset($item->options->image)); ?>"></td>
                              <th><?php echo e($item->name); ?></th>
                              <td><input type="number" min="1" class="quantity-input" data-id="<?php echo e($item->rowId); ?>" name="" value="<?php echo e($item->qty); ?>" class="quantity-input"></td>
                              <th class="text-success">$<?php echo e($item->price); ?></th>
                              <th class="text-success">$<?php echo e($item->price * $item->qty); ?></th>
                              <td><strong class="close" data-id="<?php echo e($item->rowId); ?>" title="remove item">&#10005;</strong></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <?php endif; ?>
                </tbody>
            </table>
            </div>
            <hr>




            <div class="mt-4"><a href="<?php echo e(route('shop.index')); ?>" class="btn btn-dark">&leftarrow; Back to shop</a></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>

            <div class="row mb-2" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col m-auto">QUANTITY</div>
                <div class="col text-right font-weight-bold" style="font-size:1.9rem"><?php echo e(Cart::instance('shopping')->count()); ?></div>
            </div>

            <div class="row mb-2" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">SUBTOTAL</div>
                <div class="col text-right font-weight-bold">$<?php echo e(Cart::instance('shopping')->total()); ?></div>
            </div>
             
            <div class="row mb-2" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TAX PRICE</div>
                <div class="col text-right font-weight-bold text-danger">$0</div>
            </div> 

            <div class="row mb-2" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">DISCOUNT PRICE</div>
                <div class="col text-right font-weight-bold text-success">$0</div>
            </div> 

            <div class="row mb-2 text-primary" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0; font-size: 30px;">
                <div class="col font-weight-bold">TOTAL</div>
                <div class="col text-right font-weight-bold total-amount" data-amount="<?php echo e(Cart::total()); ?>">$<?php echo e(Cart::instance('shopping')->total()); ?></div>
            </div> 
            
        </div>
    </div>
</div>
        </div><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/shop/ajax/checkout_page.blade.php ENDPATH**/ ?>