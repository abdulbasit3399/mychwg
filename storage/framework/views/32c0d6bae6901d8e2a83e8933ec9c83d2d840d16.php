<div class="row">
                        <!-- account start -->
                        <div class="col-12">
                            <div class="card">
      
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-lg-6">
                                            <ul class="list-group">
                                              
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">Customer Name</strong>
                                                <span><?php echo e($order->name ?? $order->user->name); ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">Email address</strong>
                                                <span><?php echo e($order->email); ?></span>
                                              </li>
                                              </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="list-group">
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">Shipping address</strong>
                                                <span><?php echo e($order->address_1); ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">Shipping address 2</strong>
                                                <span><?php echo e($order->address_2); ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">Country</strong>
                                                <span><?php echo e($order->country); ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">State</strong>
                                                <span><?php echo e($order->state); ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">City</strong>
                                                <span><?php echo e($order->city); ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">Zip</strong>
                                                <span><?php echo e($order->zip); ?></span>
                                              </li>
                                              <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <strong class="text-success">Phone</strong>
                                                <span><?php echo e($order->phone); ?></span>
                                              </li>
                                              </ul>
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
                                    <div class="card-title mb-2">Products</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                      <thead>
                                        <tr>
                                          <th scope="col">Item</th>
                                          <th scope="col">Cost</th>
                                          <th scope="col">Order Qty</th>
                                          <th scope="col">Total</th>
                                        </tr>
                                      </thead>
                                      <tbody>

                                        <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                              <th>
                                                <a href="<?php echo e(route('admin.shop.product.detail', $product->shopOrderProduct->id)); ?>" target="_blank">
                                                    <?php echo e($product->shopOrderProduct->title); ?>

                                                </a>
                                            </th>
                                              <td>$<?php echo e($product->price); ?></td>
                                              <td>x <?php echo e($product->quantity); ?></td>
                                              <td class="font-weight-bold">$<?php echo e($product->price * $product->quantity); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- information start -->

                       


                    </div><?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/shop/order/detail.blade.php ENDPATH**/ ?>