
                        <div class="tab-content " id="pills-tabContent">
<!--================================-->
                            <!-- 1 of 4 STEP -->
                    <!--================================-->
                    <form id="payment-form" method="POST" action="<?php echo e(route('make.checkout')); ?>">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <?php echo $__env->make('front.services.appointment-booking.slide_1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <!--================================-->
                                <!-- 2 of 4 STEP -->
                        <!--================================-->
                        <div class="tab-pane d-none" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                            <?php echo $__env->make('front.services.appointment-booking.slide_2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <!--================================-->
                                <!-- 3 of 4 STEP -->
                        <!--================================-->
                        <div class="tab-pane d-none" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
                            <?php echo $__env->make('front.services.appointment-booking.slide_3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </form>
                </div>




<?php /**PATH /home/u431718007/domains/mychwg.com/public_html/resources/views/front/homeopath/includes/booking_prompts.blade.php ENDPATH**/ ?>